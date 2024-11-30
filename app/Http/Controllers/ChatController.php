<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    public function postMessage(Request $request, $roomId)
    {
        $userName = 'User_' . Str::random(4);
        $messageContent = $request->input('message');
        MessageSent::dispatch($userName, $roomId, $messageContent);
        return response()->json(['status' => 'Message sent successfully.']);
    }
}
