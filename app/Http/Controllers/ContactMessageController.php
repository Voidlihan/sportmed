<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactMessage;

class ContactMessageController extends Controller
{
    public function create()
    {
        return view('contact-form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'message' => 'required|string|max:2000',
        ]);

        ContactMessage::create($validated);

        return redirect()->back()->with('success', 'Ваше сообщение отправлено.');
    }
    public function index()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->paginate(10);

        return view('contact-messages.index', compact('messages'));
    }
    public function destroy($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();

        return redirect()->back()->with('success', 'Сообщение удалено.');
    }
}