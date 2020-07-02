<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\GeneralSetting;
use App\User;
use App\Http\Controllers\Controller;
use App\Notifications\NewRefferalNotifications;
use App\Notifications\NewUserNotifications;
use App\WithdrawMethod;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use response;
use Input;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware(['guest']);
        $this->middleware('regStatus')->except('registrationNotAllowed');
    }

    public function showRegistrationForm($ref = null)
    {
        $page_title = "Sign Up";
        return view(activeTemplate() . 'user.auth.register', compact('page_title'));
    }

    public function showRegistrationFormRef($username){


        $ref_user = User::where('username', $username)->first();
        if (isset($ref_user)){
            $page_title = "Sign Up";
            if ($ref_user->plan_id == 0){

                $notify[] = ['error', $ref_user->username.' did not in subscribed in any plan'];
                return redirect()->route('user.register')->withNotify($notify);


            }
            return view(activeTemplate().'.user.auth.register',compact('page_title', 'ref_user'));
        }else{
            return redirect()->route('user.register');
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|string|max:60',
            'country' => 'required|string|max:80',
            'email' => 'required|string|email|max:160|unique:users',
            'mobile' => 'required|string|max:30|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'username' => 'required|string|unique:users|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $mm= "";
        $gnl = GeneralSetting::first();
        if(empty($data['ref_id'])){
            $f_user = User::where('plan_id','!=',0)->orderBy('id','ASC')->first()->id;
            $l_user = User::where('plan_id','!=',0)->orderBy('id','DESC')->first()->id;
            $data['ref_id'] = (int)(($l_user+$f_user)/2);
            $user = User::find($data['ref_id']);
            if(!$user->plan_id){
                $data['ref_id'] = User::where('plan_id','!=',0)->orderBy('id','ASC')->first()->id;
            }
        }
        // dd($data);
        $user = User::create([
                'ref_id' => ($data['ref_id']) ? $data['ref_id'] :0,
                'firstname' => $data['firstname'],
                'lastname' => $mm,
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'username' => $data['username'],
                'mobile' => $data['mobile'],
                'address' => [
                    'address' => '',
                    'state' => '',
                    'zip' => '',
                    'country' => 'Spain',
                    'city' => '',
                ],
                'status' => 1,
                'ev' =>  $gnl->ev ? 0 : 1,
                'sv' =>  $gnl->sv ? 0 : 1,
                'ts' => 0,
                'tv' => 1,
            ]);
        $notify_user = User::find($data['ref_id']);
        $notify_user->notify(new NewRefferalNotifications($data['username']));

        $admin = Admin::first();
        $admin->notify(new NewUserNotifications($data['username']));
        // Notification::send($notify_user,NewRefferalNotifications);

        return $user;
    }

     public function search_ref(Request $request)
    {

          $search = $request->input('term');

          $results = User::where('status',1)->where('plan_id','!=',0)->where('email', 'LIKE', '%'. $search. '%')->limit(5)->get(['id','email']);

          $response = array();
          foreach($results as $result){
             $response[] = array("value"=>$result->id,"label"=>$result->email);
          }

          return response()->json($response);

    }

    public function registered()
    {
        return redirect()->route('user.home');
    }
}
