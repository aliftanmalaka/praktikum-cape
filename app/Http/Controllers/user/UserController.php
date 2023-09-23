<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Kalender;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function kalender() {
        $breadcrumbs = [
            ['Kalender', true, route('user.kalender')],
            ['Index', false],
        ];
        $title = __('kalender.title.index');
        $kalenders = Kalender::latest()->get();

        $events = [];

        foreach($kalenders as $kalender) {
            $events[] = [
                'id' => $kalender->id,
                'title' => $kalender->title,
                'start' => $kalender->start,
                'end' => $kalender->end,
            ];
        }

        return view('user.kalender', compact('breadcrumbs', 'title', 'events'));
    }
}
