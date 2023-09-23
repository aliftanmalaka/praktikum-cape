<?php

namespace App\Http\Controllers;

use App\Models\Kalender;
use App\Models\Organisasi;
use App\Models\Peminjaman;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['Peminjaman', true, route('admin.peminjaman.index')],
            ['Index', false],
        ];
        $title = __('peminjaman.title.index');
        $peminjamans = Peminjaman::with('user', 'organisasi', 'ruangan')->orderBy('peminjaman_status', 'ASC')->get();
        return view('admin.peminjaman.index', compact('breadcrumbs', 'title', 'peminjamans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['Peminjaman', true, route('admin.peminjaman.index')],
            ['Create', false],
        ];
        $title = __('peminjaman.title.create');
        $organisasies = Organisasi::orderBy('organisasi_nama', 'ASC')->get();
        $ruangans = Ruangan::orderBy('ruangan_nama', 'ASC')->get();
        return view('admin.peminjaman.create', compact('breadcrumbs', 'title', 'organisasies', 'ruangans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'organisasi_id' => 'required',
            'nama_acara' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'ruangan_id' => 'required',
            'no_surat' => 'nullable|string',
        ]);

        $validated['user_id'] = auth()->id();

        Peminjaman::create($validated);

        return redirect()->route('admin.peminjaman.create')->with(['color'=> 'bg-success-500', 'message' => __('peminjaman.success.store')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        $breadcrumbs = [
            ['Peminjaman', true, route('admin.peminjaman.index')],
            [$peminjaman->nama_acara, false],
        ];
        $title = __('peminjaman.title.show');
        return view('admin.peminjaman.show', compact('breadcrumbs', 'title', 'peminjaman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        if ($peminjaman->peminjaman_status !== 'Proses') {
            return redirect()->route('admin.peminjaman.index')->with(['color'=> 'bg-danger-500', 'message' => __('peminjaman.access-decline')]);
        }
        $breadcrumbs = [
            ['Peminjaman', true, route('admin.peminjaman.index')],
            [$peminjaman->nama_acara, false],
        ];
        $title = __('peminjaman.title.edit');
        $organisasies = Organisasi::orderBy('organisasi_nama', 'ASC')->get();
        $ruangans = Ruangan::orderBy('ruangan_nama', 'ASC')->get();
        return view('admin.peminjaman.edit', compact('breadcrumbs', 'title', 'peminjaman', 'organisasies', 'ruangans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $validated = $request->validate([
            'organisasi_id' => 'required',
            'nama_acara' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'ruangan_id' => 'required',
            'no_surat' => 'nullable|string',
            'peminjaman_status' => 'required'
        ]);
        $peminjaman->update($validated);

        $status = $validated['peminjaman_status'];
        if ($status == 'Terima') {
            // Menerima Peminjaman
            Kalender::create([
                'peminjaman_id' => $peminjaman->id,
                'title' => $peminjaman->nama_acara,
                'start' => $peminjaman->tanggal_pinjam,
                'end' => $peminjaman->tanggal_kembali,
            ]);
            return redirect()->route('admin.peminjaman.index')->with(['color'=> 'bg-success-500', 'message' => __('peminjaman.success.update') . ' & ' . __('peminjaman.success.update-accept')]);
        } else if ($status == 'Tolak') {
            // Menolak Peminjaman
            return redirect()->route('admin.peminjaman.index')->with(['color'=> 'bg-success-500', 'message' => __('peminjaman.success.update-decline')]);
        }

        // Tanpa Merubah Status
        return redirect()->route('admin.peminjaman.index')->with(['color'=> 'bg-success-500', 'message' => __('peminjaman.success.update')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        if ($peminjaman->peminjaman_status !== 'Proses') {
            return redirect()->route('admin.peminjaman.index')->with(['color'=> 'bg-danger-500', 'message' => __('peminjaman.access-decline')]);
        }
        $peminjaman->delete();
        return redirect()->back()->with(['color'=> 'bg-success-500', 'message' => __('peminjaman.success.delete')]);
    }
}
