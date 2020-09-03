<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Notifications\AdminNotifications;
use App\Notifications\UserNotification;
use App\SupportTicket;
use App\SupportTicketComment;
use App\User;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $page_title = 'Support Ticket';
        $empty_message = 'No support ticket';
        $tickets = auth()->user()->tickets()->orderByDesc('status')->latest()->paginate(config('constants.table.default'));
        return view(activeTemplate() . 'user.support.ticket', compact('page_title', 'empty_message', 'tickets'));
    }

    public function new(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
        ]);

        $ticket = auth()->user()->tickets()->save(new SupportTicket([
            'ticket' => getTrx(),
            'subject' => $request->subject,
        ]));

        $ticket->comments()->save(new SupportTicketComment([
            'comment' => $request->message,
        ]));

        $message = 'New ticket having ID: ['.$ticket->ticket.'] is opened';

        Admin::first()->notify(new AdminNotifications($message));

        return redirect()->route('user.ticket.detail', [$ticket->id, slug($ticket->ticket)]);
    }

    public function detail($id, $slug)
    {

        $empty_message = 'No ticket message';
        $ticket = auth()->user()->tickets()->with(['comments'])->findOrFail($id);
        $page_title = 'Ticket #' . $ticket->ticket;

        return view(activeTemplate() . 'user.support.ticket_detail', compact('page_title', 'empty_message', 'ticket'));
    }

    public function comment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|max:500'
        ]);
        $ticket = auth()->user()->tickets()->findOrFail($id);
        $ticket->comments()->save(new SupportTicketComment([
            'comment' => $request->comment
        ]));

        if ($ticket->status == 0) {
            $ticket->update([
                'status' => 1
            ]);
        }

        $message = 'Ticket having ID: ['.$ticket->ticket.'] is got reply from '.auth()->user()->username;
        Admin::first()->notify(new AdminNotifications($message));

        $notify[] = ['success', 'Please wait patiently for the reply'];
        return back()->withNotify($notify);
    }

    public function close($id)
    {
        // $ticket = auth()->user()->tickets()->findOrFail($id);
        $ticket = SupportTicket::findOrFail($id);
        // dd($ticket);
        $ticket->update([
            'status' => 0
        ]);

        $user = User::find($ticket->user_id);
        $message = 'Ticket having ID: ['.$ticket->ticket.'] is closed by '.$user->username;
        Admin::first()->notify(new AdminNotifications($message));

        $notify[] = ['success', 'Ticket has been closed.'];
        return back()->withNotify($notify);
    }
}
