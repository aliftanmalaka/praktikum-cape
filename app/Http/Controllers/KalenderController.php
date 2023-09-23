<?php

namespace App\Http\Controllers;

use App\Models\Kalender;
use Illuminate\Http\Request;

class KalenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['Kalender', true, route('admin.kalender.index')],
            ['Index', false],
        ];
        $title = __('kalender.title.index');
        $kalenders = Kalender::orderBy('start', 'ASC')->get();
        return view('admin.kalender.index', compact('breadcrumbs', 'title', 'kalenders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['Kalender', true, route('admin.kalender.index')],
            ['Create', false],
        ];
        $title = __('kalender.title.create');
        return view('admin.kalender.create', compact('breadcrumbs', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'start' => 'required',
            'end' => 'required',
        ]);

        Kalender::create($validated);

        return redirect()->route('admin.kalender.create')->with(['color'=> 'bg-success-500', 'message' => __('kalender.success.store')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Kalender $kalender)
    {
        $breadcrumbs = [
            ['Kalender', true, route('admin.kalender.index')],
            [$kalender->title, false],
        ];
        $title = __('kalender.title.show');
        return view('admin.kalender.show', compact('breadcrumbs', 'title', 'kalender'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kalender $kalender)
    {
        $breadcrumbs = [
            ['Kalender', true, route('admin.kalender.index')],
            [$kalender->title, false],
        ];
        $title = __('kalender.title.edit');
        return view('admin.kalender.edit', compact('breadcrumbs', 'title', 'kalender'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kalender $kalender)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'start' => 'required',
            'end' => 'required',
        ]);

        $kalender->update($validated);

        return redirect()->route('admin.kalender.index')->with(['color'=> 'bg-success-500', 'message' => __('kalender.success.update')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kalender $kalender)
    {
        $kalender->delete();
        return redirect()->back()->with(['color'=> 'bg-success-500', 'message' => __('kalender.success.delete')]);
    }
}
