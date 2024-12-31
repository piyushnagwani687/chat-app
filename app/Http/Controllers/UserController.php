<?php

namespace App\Http\Controllers;

use App\Events\SendMessage;
use App\Jobs\MessageJob;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('id', '!=', auth()->user()->id)->get();
        return view('users.index', compact('users'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $messages = Message::with(['sender', 'receiver'])->where(function($query) use($user){

            $query->where(function($q) use($user) {
                $q->where('sender_id', auth()->user()->id)->where('receiver_id', $user->id);
            })
            ->orWhere(function($q1) use($user){
                $q1->where('sender_id', $user->id)->where('receiver_id', auth()->user()->id);
            });
        })->get();

        return view('users.show', compact('user', 'messages'));
    }

    public function storeMessage($id, Request $request)
    {
        $user = User::findOrFail($id);
        $message = new Message();
        $message->sender_id = auth()->user()->id;
        $message->receiver_id = $id;
        $message->message = $request->message;
        $message->save();

        broadcast(new SendMessage($message))->toOthers();

        return response()->json(['message' => $message]);

    }
}
