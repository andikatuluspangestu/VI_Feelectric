<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Display a listing of the notifications.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user(); // Make sure $user is defined by getting the authenticated user

        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to view notifications.');
        }

        // Get the notifications for the authenticated user
        $notifications = $user->notifications()->get();

        return view('v_notif.index', compact('user', 'notifications'));
    }

    /**
     * Display the specified notification.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user(); // Again, make sure $user is defined

        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to view this notification.');
        }

        $notification = $user->notifications()->findOrFail($id);

        // Mark notification as read
        $notification->markAsRead();

        return view('v_notif.show', compact('user', 'notification'));
    }
}
