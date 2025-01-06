<?php

namespace App\Http\Controllers;

use App\Events\SendMessage;
use App\Jobs\MessageJob;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
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

        $latestMessages = Message::with(['sender', 'receiver'])->where(function($query) use($user){

            $query->where(function($q) use($user) {
                $q->where('sender_id', auth()->user()->id)->where('receiver_id', $user->id);
            })
            ->orWhere(function($q1) use($user){
                $q1->where('sender_id', $user->id)->where('receiver_id', auth()->user()->id);
            });
        })
        ->orderBy('created_at', 'desc')
        ->take(10)
        ->get();
        // ->reverse();

        $userIds = [auth()->user()->id, $user->id];

        $cacheKey = "chat.".min($userIds).'.'.max($userIds);

        Cache::put($cacheKey, $latestMessages, now()->addMinutes(60));

        broadcast(new SendMessage($message))->toOthers();

        return response()->json(['message' => $message]);

    }

    public function getMessages($senderId, $receiverId)
    {
        $user = User::findOrFail($receiverId);
        // $messages = Message::with(['sender', 'receiver'])->where(function($query) use($senderId, $receiverId){

        //     $query->where(function($q) use($senderId, $receiverId) {
        //         $q->where('sender_id', $senderId)->where('receiver_id', $receiverId);
        //     })
        //     ->orWhere(function($q1) use($senderId, $receiverId){
        //         $q1->where('sender_id', $receiverId)->where('receiver_id', $senderId);
        //     });
        // })->get();

        $userIds = [$senderId, $receiverId];

        $cacheKey = "chat.".min($userIds).'.'.max($userIds);

        $messages = Cache::get($cacheKey);

        return response()->json(['messages' => $messages, 'user' => $user]);
    }

    public function loadMessages($senderId, $receiverId, Request $request)
    {
        $offset = $request->offset ?? 0;
        // dd($offset);

        $messages = Message::where(function ($query) use ($senderId, $receiverId) {
            $query->where('sender_id', $senderId)
                ->where('receiver_id', $receiverId);
        })->orWhere(function ($query) use ($senderId, $receiverId) {
            $query->where('sender_id', $receiverId)
                ->where('receiver_id', $senderId);
        })->orderBy('created_at', 'desc')
        ->skip($offset)
        ->take(10)
        ->get();

        // dd($messages);

        return response()->json([
            'success' => true,
            'messages' => $messages, // Reverse to display in correct order
        ]);
    }
}
