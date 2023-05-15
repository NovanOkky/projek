<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use Barryvdh\DomPDF\Facade\PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AntrianController extends Controller
{

    public function createAntrian(Request $request)
    {

        $request->validate([
            'nama' => 'required',
            'poli' => 'required',
        ]);

        $nama = $request->input('nama');
        $poli = $request->input('poli');
        $prefix = config('app.prefixes.' . $poli);

        $tanggal = Carbon::now()->format('Y-m-d');

        $lastAntrian = Antrian::where('poli', $poli)
            ->where('tanggal_antrian', $tanggal)
            ->orderBy('id', 'desc')
            ->first();

        if ($lastAntrian = Antrian::where('poli', $poli)) {
            $nomorAntrian = $lastAntrian->count() + 1;
        } else {
            $nomorAntrian = 1;
        }

        $nomorAntrian = $prefix . str_pad($nomorAntrian, 3, '0', STR_PAD_LEFT);

        $antrian = new Antrian;
        $antrian->nama = $nama;
        $antrian->no_antrian = $nomorAntrian;
        $antrian->poli = $poli;
        $antrian->tanggal_antrian = $tanggal;
        $antrian->save();

        $no_antrian = Antrian::where('poli', $poli)->get('no_antrian');
        $pdf = PDF::loadView('cetak', compact('no_antrian', 'poli', 'nama'));
        return $pdf->stream('antrian.pdf');

        return redirect('antrian')->with('no_antrian', $antrian);

        return response()->json(['no_antrian' => $nomorAntrian]);
    }

    public function resetNomorAntrian()
    {
        Antrian::where('tanggal_antrian', '<', Carbon::now()->format('Y-m-d'))
            ->update(['no_antrian' => 0]);
        return response()->json(['message' => 'Nomor antrian telah direset.']);
    }

    public function poliGigi(Request $request)
    {
        // Mengambil data antrian dari database berdasarkan poli
        $nama = $request->get('nama');
        $poli = $request->get('poli', 'gigi');
        $antrian = Antrian::where('poli', $poli)->get();

        // Mengirim data antrian ke halaman laporan
        return view('/teller/poligigi', compact('antrian'), [
            'nama' => $nama,
            'no_antrian' => $antrian,
            'poli' => $poli,
        ]);
    }

    public function poliUmum(Request $request)
    {
        // Mengambil data antrian dari database berdasarkan poli
        $nama = $request->get('nama');
        $poli = $request->get('poli', 'umum');
        $antrian = Antrian::where('poli', $poli)->get();

        // Mengirim data antrian ke halaman laporan
        return view('/teller/poliumum', compact('antrian'), [
            'nama' => $nama,
            'no_antrian' => $antrian,
            'poli' => $poli,
        ]);
    }

    public function poliMata(Request $request)
    {
        // Mengambil data antrian dari database berdasarkan poli
        $nama = $request->get('nama');
        $poli = $request->get('poli', 'mata');
        $antrian = Antrian::where('poli', $poli)->get();

        // Mengirim data antrian ke halaman laporan
        return view('/teller/polimata', compact('antrian'), [
            'nama' => $nama,
            'no_antrian' => $antrian,
            'poli' => $poli,
        ]);
    }

    public function laporanPoliGigi(Request $request)
    {
        // Mengambil data antrian dari database berdasarkan poli
        $nama = $request->get('nama');
        $poli = $request->get('poli', 'gigi');
        $antrian = Antrian::where('poli', $poli)->get();

        // Mengirim data antrian ke halaman laporan
        return view('/admin/poligigi', compact('antrian'), [
            'nama' => $nama,
            'no_antrian' => $antrian,
            'poli' => $poli,
        ]);
    }

    public function laporanPoliUmum(Request $request)
    {
        // Mengambil data antrian dari database berdasarkan poli
        $nama = $request->get('nama');
        $poli = $request->get('poli', 'umum');
        $antrian = Antrian::where('poli', $poli)->get();

        // Mengirim data antrian ke halaman laporan
        return view('/admin/poliumum', compact('antrian'), [
            'nama' => $nama,
            'no_antrian' => $antrian,
            'poli' => $poli,
        ]);
    }

    public function laporanPoliMata(Request $request)
    {
        // Mengambil data antrian dari database berdasarkan poli
        $nama = $request->get('nama');
        $poli = $request->get('poli', 'mata');
        $antrian = Antrian::where('poli', $poli)->get();

        // Mengirim data antrian ke halaman laporan
        return view('/admin/polimata', compact('antrian'), [
            'nama' => $nama,
            'no_antrian' => $antrian,
            'poli' => $poli,
        ]);
    }

    public function cetakLaporan(Request $request)
    {
        $poli = $request->get('poli');
        $nama = $request->get('nama');

        $no_antrian = Antrian::where('poli', $poli)->get('no_antrian');
        $pdf = PDF::loadView('admin.cetak', compact('no_antrian', 'poli', 'nama'));
        return $pdf->stream('laporan.pdf');
    }

}
