<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules\Password;

class WebProfileController extends Controller
{
    public function index()
    {
        return view('landingPage', [
            'services' => [
                [
                    'title' => 'Cuci Setrika Reguler',
                    'image' => '/assets/icons/cuci-setrika.png',
                ],
                [
                    'title' => 'Cuci Setrika Express',
                    'image' => '/assets/icons/cuci-setrika.png',
                ],
                [
                    'title' => 'Cuci Reguler',
                    'image' => '/assets/icons/cuci.png',
                ],
                [
                    'title' => 'Cuci Express',
                    'image' => '/assets/icons/cuci.png',
                ],
                [
                    'title' => 'Setrika Reguler',
                    'image' => '/assets/icons/setrika.png',
                ],
                [
                    'title' => 'Setrika Express',
                    'image' => '/assets/icons/setrika.png',
                ],
                [
                    'title' => 'Cuci Setrika',
                    'image' => '/assets/icons/cuci-setrika.png',
                ],
            ],
            'events' => Event::latest()->paginate(4),
        ]);
    }

    public function showEvent(Event $event)
    {
        return view('event', [
            'event' => $event,
            'events' => Event::latest()->paginate(4)->skip(1),
        ]);
    }
}
