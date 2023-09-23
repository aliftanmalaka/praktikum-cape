<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['Ruangan', true, route('admin.ruangan.index')],
            ['Index', false],
        ];
        $title = __('ruangan.title.index');
        $ruangans = Ruangan::latest()->get();
        return view('admin.ruangan.index', compact('breadcrumbs', 'title', 'ruangans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['Ruangan', true, route('admin.ruangan.index')],
            ['Create', false],
        ];
        $title = __('ruangan.title.create');
        return view('admin.ruangan.create', compact('breadcrumbs', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ruangan_nama' => 'required|string|max:255',
            'ruangan_kapasitas' => 'required|string|max:255',
            'ruangan_fasilitas' => 'required|string|max:255',
            'ruangan_foto' => 'required|file|image',
        ]);

        $validated['ruangan_foto'] = $request->ruangan_foto->store('image');

        Ruangan::create($validated);

        return redirect()->route('admin.ruangan.create')->with(['color'=> 'bg-success-500', 'message' => __('ruangan.success.store')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ruangan $ruangan)
    {
        $breadcrumbs = [
            ['Ruangan', true, route('admin.ruangan.index')],
            [$ruangan->ruangan_nama, false],
        ];
        $title = __('ruangan.title.show');
        return view('admin.ruangan.show', compact('breadcrumbs', 'title', 'ruangan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ruangan $ruangan)
    {
        $breadcrumbs = [
            ['Ruangan', true, route('admin.ruangan.index')],
            [$ruangan->ruangan_nama, false],
        ];
        $title = __('ruangan.title.edit');
        return view('admin.ruangan.edit', compact('breadcrumbs', 'title', 'ruangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ruangan $ruangan)
    {
        $validated = $request->validate([
            'ruangan_nama' => 'required|string|max:255',
            'ruangan_kapasitas' => 'required|string|max:255',
            'ruangan_fasilitas' => 'required|string|max:255',
            'ruangan_foto' => 'file|image',
        ]);

        if ($request->ruangan_foto !== null) {
            Storage::delete($ruangan->ruangan_foto);
            $validated['ruangan_foto'] = $request->ruangan_foto->store('image');
        }

        $ruangan->update($validated);

        return redirect()->route('admin.ruangan.index')->with(['color'=> 'bg-success-500', 'message' => __('ruangan.success.update')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ruangan $ruangan)
    {
        Storage::delete($ruangan->ruangan_foto);
        $ruangan->delete();
        return redirect()->back()->with(['color'=> 'bg-success-500', 'message' => __('ruangan.success.delete')]);
    }
}
