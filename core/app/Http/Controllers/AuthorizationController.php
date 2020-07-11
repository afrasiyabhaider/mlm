<?php

namespace App\Http\Controllers;

use App\Admin;
use App\GeneralSetting;
use App\Lib\GoogleAuthenticator;
use App\MonthlySubscription;
use App\Notifications\AdminNotifications;
use App\Notifications\UserNotification;
use App\Trx;
use App\Withdrawal;
use App\WithdrawMethod;
use Auth;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class AuthorizationController extends Controller
{
    public function checkValidCode($user, $code, $add_min = 10000)
    {
        if (!$code) return false;
        if (!$user->ver_code_send_at) return false;
        if ($user->ver_code_send_at->addMinutes($add_min) < Carbon::now()) return false;
        if ($user->ver_code !== $code) return false;
        return true;
    }
    public function subsAuth()
    {
        $notify[] = ['error', 'Your account is suspended. Pay monthly subscription by depositing EUR 10'];

        return redirect(url('user/deposit'))->withNotify($notify);
    }
    public function authorizeForm()
    {
        $view = activeTemplate() . 'user.auth.authorize';
        if (auth()->check()) {
            $user = auth()->user();
            if (!$user->status) {

                $notify[] = ['error', 'Your account is suspended. Pay monthly subscription by depositing EUR 10'];

                return redirect(url('user/deposit'))->withNotify($notify);


                // return view($view, compact('user', 'page_title'))->withNotify($notify);
            } elseif (!$user->ev) {
            // if (!$user->ev) {
                if (!$this->checkValidCode($user, $user->ver_code)) {
                    $user->ver_code = verification_code(6);
                    $user->ver_code_send_at = Carbon::now();
                    $user->save();
                    send_email($user, 'EVER_CODE', [
                        'code' => $user->ver_code
                    ]);
                }
                $page_title = 'Email verification form';
                return view($view, compact('user', 'page_title'));
            } elseif (!$user->sv) {
                if (!$this->checkValidCode($user, $user->ver_code)) {
                    $user->ver_code = verification_code(6);
                    $user->ver_code_send_at = Carbon::now();
                    $user->save();
                    send_sms($user, 'SVER_CODE', [
                        'code' => $user->ver_code
                    ]);
                }
                $page_title = 'SMS verification form';
                return view($view, compact('user', 'page_title'));
            } elseif (!$user->tv) {
                $page_title = 'Google Authenticator';
                return view($view, compact('user', 'page_title'));
            }
        }
        return redirect()->route('user.login');
    }

    public function sendVerifyCode(Request $request)
    {
        $user = Auth::user();
        if ($this->checkValidCode($user, $user->ver_code, 2)) {
            $target_time = $user->ver_code_send_at->addMinutes(2)->timestamp;
            $delay = $target_time - time();
            throw ValidationException::withMessages(['resend' => 'Please Try after ' . $delay . ' Seconds']);
        }
        if (!$this->checkValidCode($user, $user->ver_code)) {
            $user->ver_code = verification_code(6);
            $user->ver_code_send_at = Carbon::now();
            $user->save();
        } else {
            $user->ver_code = $user->ver_code;
            $user->ver_code_send_at = Carbon::now();
            $user->save();
        }

        if ($request->type === 'email') {
            send_email($user, 'EVER_CODE', [
                'code' => $user->ver_code
            ]);
            $notify[] = ['success', 'Email verification code sent successfully'];
            return back()->withNotify($notify);
        } elseif ($request->type === 'phone') {
            send_sms($user, 'SVER_CODE', [
                'code' => $user->ver_code
            ]);
            return back()->with('success', 'SMS verification code sent successfully');
        } else {
            throw ValidationException::withMessages(['resend' => 'Sending Failed']);
        }
    }

    public function emailVerification(Request $request)
    {

        $request->validate([
            'email_verified_code' => 'required',
        ], [
            'email_verified_code.required' => 'Email verification code is required',
        ]);

        $user = Auth::user();
        if ($this->checkValidCode($user, $request->email_verified_code)) {
            $user->ev = 1;
            $user->ver_code = null;
            $user->ver_code_send_at = null;
            $user->save();
            return redirect()->intended(route('user.home'));
        }
        throw ValidationException::withMessages(['email_verified_code' => 'Verification code didn\'t match!']);
    }

    public function smsVerification(Request $request)
    {
        $request->validate([
            'sms_verified_code' => 'required',
        ], [
            'sms_verified_code.required' => 'SMS verification code is required',
        ]);
        $user = Auth::user();
        if ($this->checkValidCode($user, $request->sms_verified_code)) {
            $user->sv = 1;
            $user->ver_code = null;
            $user->ver_code_send_at = null;
            $user->save();
            return redirect()->intended(route('user.home'));
        }
        throw ValidationException::withMessages(['sms_verified_code' => 'Verification code didn\'t match!']);
    }

    public function g2faVerification(Request $request)
    {
        $user = auth()->user();

        $this->validate(
            $request,
            [
                'code' => 'required',
            ]
        );
        $ga = new GoogleAuthenticator();

        $secret = $user->tsc;
        $oneCode = $ga->getCode($secret);
        $userCode = $request->code;
        if ($oneCode == $userCode) {
            $user->tv = 1;
            $user->save();
            return redirect()->route('user.home');
        } else {


            throw ValidationException::withMessages(['code' => 'Wrong Verification Code']);


        }
    }

    /**
     * Monthly Subscription
     *
     **/
    public function monthly_subscription()
    {
        $user_id = auth()->user()->id;
        $monthly_subscription = MonthlySubscription::where('user_id',$user_id)
                                                    ->latest()
                                                    ->first();
        $current_month = Carbon::now()->format('m-Y');
        $general = GeneralSetting::first();

        // dd($monthly_subscription);

         if ($current_month != $current_month || !$monthly_subscription) {
            try {
                if (auth()->user()->balance < 10.00) {
                    auth()->user()->update([
                        'status' => 0,
                    ]);
                    $notify[] = ['error', 'Your account is suspended. Pay monthly subscription by depositing'.$general->cur_sym.'10'];

                    return redirect()->route('user.deposit')->withNotify($notify);
                }else{

                    DB::beginTransaction();
                    $balance = auth()->user()->balance - 10;
                    auth()->user()->update([
                        'balance' => formatter_money($balance),
                        'status' => 1,
                    ]);

                    $trxes = new Trx();
                    $trxes->user_id = $user_id;
                    $trxes->amount = '10';
                    $trxes->main_amo = '10';
                    $trxes->charge = '0';
                    $trxes->balance = $balance;
                    $trxes->type = 'Monthly Subscription';
                    $trxes->save();

                    $subscription = new MonthlySubscription();
                    $subscription->user_id = $user_id;
                    $subscription->trxes_id = $trxes->id;
                    $subscription->month = Carbon::now()->format('m-Y');
                    $subscription->save();


                    send_email(auth()->user(), 'WITHDRAW_PENDING', [
                        'trx' => '',
                        'amount' => $general->cur_sym . ' ' . formatter_money(10),
                        'method' => 'Monthly Subscription',
                        'charge' => $general->cur_sym . ' ' . 0,
                    ]);

                    send_sms(auth()->user(), 'WITHDRAW_PENDING', [
                        'trx' => '',
                        'amount' => $general->cur_sym . ' ' . formatter_money(10),
                        'method' => 'Monthly Subscription',
                        'charge' => $general->cur_sym . ' ' . 0,
                    ]);

                    $message = Auth::user()->username.' is deposited amount of '.$general->cur_sym.formatter_money(10).' for Monthly Subscription';
                    Admin::first()->notify(new AdminNotifications($message));

                    $user_msg = $general->cur_sym.'10 is deducted from your account for monthly subscription';
                    auth()->user()->notify(new UserNotification($user_msg));

                    $notify[] = ['success', $user_msg];

                    DB::commit();
                    // return redirect()->route('user.home')->withNotify($notify);
                }

            } catch (\Exception $ex) {
                DB::rollBack();
                $notify[] = ['error', $ex->getMessage()];
                // return redirect()->route('user.home')->withNotify($notify);
            }
        }
    }
}
