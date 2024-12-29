<?php

namespace App\Http\Controllers;

use App\Events\SendMessage;
use App\Jobs\MessageJob;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function storeMessage($id, Request $request)
    {
        // dd($id);
        $user = User::findOrFail($id);
        $message = new Message();
        $message->sender_id = auth()->user()->id;
        $message->receiver_id = $id;
        $message->message = $request->message;
        $message->save();

        broadcast(new SendMessage($message->toArray()))->toOthers();
        // SendMessage::dispatch($message->toArray());

        // return redirect()->to(route('users.show', $id));

    }
}
