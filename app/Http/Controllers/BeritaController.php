<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['Berita', true, route('admin.berita.index')],
            ['Index', false],
        ];
        $title = __('berita.title.index');
        $beritas = Berita::with('user')->latest()->get();
        return view('admin.berita.index', compact('breadcrumbs', 'title', 'beritas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['Berita', true, route('admin.berita.index')],
            ['Create', false],
        ];
        $title = __('berita.title.create');
        return view('admin.berita.create', compact('breadcrumbs', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'berita_judul' => 'required|string|max:255',
            'berita_desc' => 'required|string|max:255',
            'berita_foto' => 'required|file|image',
        ]);

        $validated['berita_foto'] = $request->berita_foto->store('image');
        $validated['user_id'] = auth()->id();

        Berita::create($validated);

        return redirect()->route('admin.berita.create')->with(['color'=> 'bg-success-500', 'message' => __('berita.success.store')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $beritum)
    {
        $berita = $beritum;
        $breadcrumbs = [
            ['Berita', true, route('admin.berita.index')],
            [$berita->berita_judul, false],
        ];
        $title = __('berita.title.show');
        return view('admin.berita.show', compact('breadcrumbs', 'title', 'berita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $beritum)
    {
        $berita = $beritum;
        $breadcrumbs = [
            ['Berita', true, route('admin.berita.index')],
            [$berita->berita_judul, false],
        ];
        $title = __('berita.title.edit');
        return view('admin.berita.edit', compact('breadcrumbs', 'title', 'berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $beritum)
    {
        $berita = $beritum;
        $validated = $request->validate([
            'berita_judul' => 'required|string|max:255',
            'berita_desc' => 'required|string|max:255',
            'berita_foto' => 'file|image',
        ]);

        if ($request->berita_foto !== null) {
            Storage::delete($berita->berita_foto);
            $validated['berita_foto'] = $request->berita_foto->store('image');
        }

        $berita->update($validated);

        return redirect()->route('admin.berita.index')->with(['color'=> 'bg-success-500', 'message' => __('berita.success.update')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $beritum)
    {
        $berita = $beritum;
        Storage::delete($berita->berita_foto);
        $berita->delete();
        return redirect()->back()->with(['color'=> 'bg-success-500', 'message' => __('berita.success.delete')]);
    }
}
