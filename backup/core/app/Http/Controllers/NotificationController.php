<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            if(Auth::guard('admin')->user()->unreadNotifications->first() == null){
                return null;
            }else{
                return json_encode(Auth::guard('admin')->user()->unreadNotifications);
            }
        }else{
            if(Auth::user()->unreadNotifications->first() == null){
                return null;
            }else{
                return json_encode(Auth::user()->unreadNotifications);
            }
        }

    }

    public function markRead($id)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->user()->unreadNotifications->where('id',$id)->first()->markAsRead;
        }else{
            Auth::user()->unreadNotifications->where('id',$id)->first()->markAsRead;
        }
    }
}
