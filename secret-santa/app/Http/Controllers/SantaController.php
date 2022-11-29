<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SantaController extends Controller
{
    /**
     * Возвращает json с юзером-сантой
     * и с информацией о его подопечном
     */
    public function show(User $user)
    {
        $client = $user->santaClient()->first();
        return response()->json([
            'santa' => $user,
            'client' => $client
        ]);
    }
}
