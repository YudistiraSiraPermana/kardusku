<?php

namespace App\Http\Controllers;

use App\Models\MasterDataKardus;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.transaksi.index');
    }
    public function process(Request $request)
    {
        $id = $request->id;
        $master_kardus = MasterDataKardus::find($id);
        $data = [
            'id'         => $master_kardus->id,
            'jenis'      => $master_kardus->jenis,
            'ukuran'     => $master_kardus->ukuran,
            'stock'      => $master_kardus->stock,
            'created_by' => $master_kardus->created_by,
        ];
        return view('pages.transaksi.process', $data);
    }
    public function addStock(Request $request)
    {
        $master_kardus_id   = $request->add_stock_id;
        $jumlah             = $request->jumlah;
        $status             = $request->status;

        $master_kardus = MasterDataKardus::where('id', $master_kardus_id)->first();
        $master_kardus->stock     += $jumlah;
        $master_kardus->updated_at = now();
        $master_kardus->save();

        $transaksi = new Transaksi;
        $transaksi->master_kardus_id = $master_kardus_id;
        $transaksi->jumlah           = $jumlah;
        $transaksi->status           = $status;
        $transaksi->created_by       = Auth::id();
        $transaksi->save();

        return back()->with('success', 'Transaksi Berhasil');
    }
    public function subtractStock(Request $request)
    {
        $master_kardus_id   = $request->subtract_stock_id;
        $jumlah             = $request->jumlah;
        $status             = $request->status;

        $master_kardus = MasterDataKardus::where('id', $master_kardus_id)->first();
        $master_kardus->stock     -= $jumlah;
        $master_kardus->updated_at = now();
        $master_kardus->save();

        $transaksi = new Transaksi;
        $transaksi->master_kardus_id = $master_kardus_id;
        $transaksi->jumlah           = $jumlah;
        $transaksi->status           = $status;
        $transaksi->created_by       = Auth::id();
        $transaksi->save();

        return back()->with('success', 'Transaksi Berhasil');
    }

    public function view()
    {
        $data = [
            'dataTransaksi'   => Transaksi::with('master_kardus', 'user')->orderBy('created_at', 'desc')->get()
        ];
        return view('pages.report_transaksi.index', $data);
    }

    public function filterByDate(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date   = $request->input('end_date');

        $filteredData = Transaksi::with('master_kardus', 'user')->whereBetween('created_at', [
            Carbon::parse($start_date)->startOfDay(),
            Carbon::parse($end_date)->endOfDay(),
        ])->get();

        return view('pages.report_transaksi.filter', ['data' => $filteredData]);
    }
}
