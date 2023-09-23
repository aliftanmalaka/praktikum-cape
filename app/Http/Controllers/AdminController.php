<?php

namespace App\Http\Controllers;

use App\Mail\Mailer;
use App\Models\Kalender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Spatie\Activitylog\Models\Activity;

class AdminController extends Controller
{
    public function log() {
        $breadcrumbs = [
            ['Log', true, route('admin.log.index')],
            ['Index', false],
        ];
        $title = 'All Log';
        $logs = Activity::latest()->get();

        return view('admin.log.index', compact('breadcrumbs', 'title', 'logs'));
    }

    public function kalender() {
        $breadcrumbs = [
            ['Kalender', true, route('admin.kalender')],
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

        return view('admin.kalender', compact('breadcrumbs', 'title', 'events'));
    }

    public function mail(Request $request) {
        $breadcrumbs = [
            ['Mail', true, route('admin.mail.index')],
            ['Index', false],
        ];
        $title = __('mail.title.index');

        return view('admin.mail.index', compact('breadcrumbs', 'title'));
    }

    public function store_mail(Request $request) {
        $request->validate([
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;

        $mailer = new Mailer($message, $subject);

        Mail::to($email)->send($mailer);

        return redirect()->back()->with(['color'=> 'bg-success-500', 'message' => __('mail.success.store')]);;
    }
}
