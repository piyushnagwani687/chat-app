<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Log;

Broadcast::channel('chat.{senderId}.{receiverId}', function ($user) {
    // return true;
    return \Auth::check();
});
