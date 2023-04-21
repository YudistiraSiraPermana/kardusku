<?php

namespace App\Http\Controllers;

use App\Models\MasterDataKardus;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MasterDataKardusController extends Controller
{
    public function index()
    {
        $data = [
            'dataMasterKardus'   => MasterDataKardus::orderBy('created_at', 'desc')->get()
        ];
        return view('pages.masterdata_kardus.index', $data);
    }
    public function create()
    {
        return view('pages.masterdata_kardus.create');
    }

    public function store(Request $request)
    {
        $custom_id     = str_pad(20001 + MasterDataKardus::count(), 5, '0', STR_PAD_LEFT);
        $jenis  = $request->jenis;
        $ukuran = $request->ukuran;

        $data = new MasterDataKardus;
        $data->id       = $custom_id;
        $data->jenis    = $jenis;
        $data->ukuran   = $ukuran;
        $data->stock    = 0;
        $data->save();

        return back()->with('success', 'Master Kardus telah diisi');
    }
    public function edit($id)
    {
        $master_kardus = MasterDataKardus::find($id);
        $data = [
            'jenis'     => $master_kardus->jenis,
            'ukuran'    => $master_kardus->ukuran,
        ];
        return view('pages.masterdata_kardus.edit', $data);
    }
    public function destroy($id)
    {
        MasterDataKardus::find($id)->delete();
        return back()->with('success', 'Delete Success!');
    }
    public function generate($id)
    {
        $master_kardus = MasterDataKardus::select('id', 'jenis', 'ukuran', 'stock')
            ->where('id', $id)
            ->first();
        $data = [
            'id'        => $master_kardus->id,
            'jenis'     => $master_kardus->jenis,
            'ukuran'    => $master_kardus->ukuran,
            'stock'     => $master_kardus->stock,
        ];
        $qrcode = QrCode::size(250)->generate(json_encode($data));
        return view('pages.masterdata_kardus.generate', compact('qrcode'));
    }
}
