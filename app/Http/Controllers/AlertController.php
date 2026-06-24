<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    public function index()
    {
        $alerts = Alert::latest()->paginate(15);
        $unreadCount = Alert::unread()->count();

        return view('alerts.index', compact('alerts', 'unreadCount'));
    }

    public function markAsRead(Alert $alert)
    {
        $alert->update(['is_read' => true]);

        return back();
    }

    public function markAllAsRead()
    {
        Alert::unread()->update(['is_read' => true]);

        return back();
    }
}
