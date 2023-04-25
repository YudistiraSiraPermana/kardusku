<?php

namespace App\Http\Controllers;

use SweetAlert;
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
        $request->validate([
            'id'     => 'required',
        ]);
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
        $request->validate([
            'jumlah'    => 'required|integer|min:1',
        ]);

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

        SweetAlert::success('Success', 'Kardus Berhasil Ditambahkan');
        return back();
    }
    public function subtractStock(Request $request)
    {
        $request->validate([
            'jumlah'    => 'required|integer|min:1',
        ]);

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

        SweetAlert::success('Success', 'Kardus Berhasil Dikurangi');
        return back();
    }

    public function view()
    {
        $data = [
            'dataTransaksi'   => Transaksi::with('master_kardus', 'user')->orderBy('created_at', 'desc')->get()
        ];
        $total_kardus_plus = Transaksi::where('status', 'plus')->sum('jumlah');
        $total_kardus_minus = Transaksi::where('status', 'minus')->sum('jumlah');
        $total_kardus = $total_kardus_plus - $total_kardus_minus;
        return view('pages.report_transaksi.index', $data, compact('total_kardus'));
    }

    public function filterByDate(Request $request)
    {
        $request->validate([
            'start_date'    => 'required|date',
            'end_date'      => 'required|date',
        ]);

        $start_date = $request->input('start_date');
        $end_date   = $request->input('end_date');

        $filteredData = Transaksi::with('master_kardus', 'user')->whereBetween('created_at', [
            Carbon::parse($start_date)->startOfDay(),
            Carbon::parse($end_date)->endOfDay(),
        ])->get();

        $total_kardus_plus = Transaksi::where('status', 'plus')->whereBetween('created_at', [
            Carbon::parse($start_date)->startOfDay(),
            Carbon::parse($end_date)->endOfDay(),
        ])->sum('jumlah');

        $total_kardus_minus = Transaksi::where('status', 'minus')->whereBetween('created_at', [
            Carbon::parse($start_date)->startOfDay(),
            Carbon::parse($end_date)->endOfDay(),
        ])->sum('jumlah');

        $total_kardus = $total_kardus_plus - $total_kardus_minus;

        return view('pages.report_transaksi.filter', ['data' => $filteredData], compact('total_kardus'));
    }
}
