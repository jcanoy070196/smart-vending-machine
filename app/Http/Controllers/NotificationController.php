<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'technician']);
        
        
        $notifications = Notification::all();

        return view('notifications', compact('notifications'));
    }
}
