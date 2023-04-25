<?php

namespace App\Http\Controllers;

use SweetAlert;
use App\Models\MasterDataKardus;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $request->validate([
            'jenis'     => 'required|string',
            'ukuran'    => 'required|string',
        ]);

        $custom_id     = str_pad(20001 + MasterDataKardus::count(), 5, '0', STR_PAD_LEFT);
        $jenis  = $request->jenis;
        $ukuran = $request->ukuran;

        $data = new MasterDataKardus;
        $data->id           = $custom_id;
        $data->jenis        = $jenis;
        $data->ukuran       = $ukuran;
        $data->stock        = 0;
        $data->created_by   = Auth::id();
        $data->save();

        SweetAlert::success('Success', 'Master Kardus telah diisi');
        return redirect()->route('kardus');
    }
    public function edit($id)
    {
        $master_kardus = MasterDataKardus::find($id);
        $data = [
            'id'         => $master_kardus->id,
            'jenis'      => $master_kardus->jenis,
            'ukuran'     => $master_kardus->ukuran,
            'created_by' => $master_kardus->created_by,
        ];
        return view('pages.masterdata_kardus.edit', $data);
    }
    public function update(request $request)
    {
        $request->validate([
            'jenis'     => 'required|string',
            'ukuran'    => 'required|string',
        ]);

        $id         = $request->id;
        $jenis      = $request->jenis;
        $ukuran     = $request->ukuran;
        $created_by = Auth::id();

        $master_kardus = MasterDataKardus::find($id);
        $master_kardus->jenis       = $jenis;
        $master_kardus->ukuran      = $ukuran;
        $master_kardus->created_by  = $created_by;
        $master_kardus->save();

        SweetAlert::success('Success', 'Master Kardus telah diupdate');
        return redirect()->route('kardus');
    }
    public function destroy($id)
    {
        MasterDataKardus::find($id)->delete();
        return back()->with('success', 'Delete Success!');
    }
    public function generate($id)
    {
        $master_kardus = MasterDataKardus::select('id', 'jenis', 'ukuran', 'stock', 'created_by')
            ->where('id', $id)
            ->first();
        $data = [
            'id' => $master_kardus->id,
        ];
        $qrcode = QrCode::size(230)->backgroundColor(255, 255, 0)->margin(1)->generate(json_encode($data));
        return view('pages.masterdata_kardus.generate', compact('qrcode', 'data'));
    }
}
