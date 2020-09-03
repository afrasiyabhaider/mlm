<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Notifications\UserNotification;
use App\SupportTicket;
use App\SupportTicketComment;
use App\User;
use Illuminate\Http\Request;

class SupportTicketController extends Controller
{
    public function index()
    {
        $users = User::orderBy('username','ASC')->get();
        $page_title = 'Support Tickets';
        $empty_message = 'No support ticket';
        $tickets = SupportTicket::orderByDesc('status')->latest()->paginate(config('constants.table.default'));
        return view('admin.ticket.index', compact('page_title', 'empty_message', 'tickets','users'));
    }

    public function reply($id)
    {
        $ticket = SupportTicket::with(['comments'])->findOrFail($id);
        $page_title = 'Ticket #' . $ticket->ticket;
        $empty_message = 'No ticket message';

        return view('admin.ticket.detail', compact('page_title', 'empty_message', 'ticket'));
    }

    public function comment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|max:500'
        ]);
        $ticket = SupportTicket::findOrFail($id);
        $ticket->comments()->save(new SupportTicketComment([
            'comment' => $request->comment,
            'type' => 1
        ]));

        if ($ticket->status == 0) {
            $ticket->update([
                'status' => 1
            ]);
        }

        $message = 'Your ticket having ID: ['.$ticket->ticket.'] got reply from Admin';
        $user = User::find($ticket->user_id);
        $user->notify(new UserNotification($message));

        $notify[] = ['success', 'Ticket has replied.'];
        return back()->withNotify($notify);
    }

    /**
     * Save new Tickets
     *
     **/
    public function new(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $user = User::find($request->input('user_id'));
        $ticket = $user->tickets()->save(new SupportTicket([
            'ticket' => getTrx(),
            'subject' => $request->subject,
        ]));

        $ticket->comments()->save(new SupportTicketComment([
            'comment' => $request->message,
        ]));

        return redirect()->back();
    }

    public function close($id)
    {
        // $ticket = auth()->user()->tickets()->findOrFail($id);
        $ticket = SupportTicket::findOrFail($id);
        // dd($ticket);
        $ticket->update([
            'status' => 0
        ]);

        $message = 'Your ticket having ID: ['.$ticket->ticket.'] is closed by Admin';
        $user = User::find($ticket->user_id);
        $user->notify(new UserNotification($message));

        $notify[] = ['success', 'Ticket has been closed.'];
        return back()->withNotify($notify);
    }
}
