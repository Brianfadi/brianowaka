<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $query = Message::latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('subject', 'like', '%' . $request->search . '%');
            });
        }

        $messages = $query->paginate(15)->withQueryString();
        $counts = [
            'all'     => Message::count(),
            'unread'  => Message::unread()->count(),
            'read'    => Message::read()->count(),
            'replied' => Message::replied()->count(),
        ];

        return view('admin.messages.index', compact('messages', 'counts'));
    }

    public function show(Message $message)
    {
        if ($message->status === 'unread') {
            $message->markAsRead();
        }
        return view('admin.messages.show', compact('message'));
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('admin.messages.index')->with('success', 'Message deleted.');
    }

    public function markRead(Message $message)
    {
        $message->markAsRead();
        return back()->with('success', 'Marked as read.');
    }

    public function markReplied(Message $message)
    {
        $message->markAsReplied();
        return back()->with('success', 'Marked as replied.');
    }
}
