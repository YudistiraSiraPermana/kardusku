<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterDataKardusController extends Controller
{
    public function index()
    {
        return view('pages.masterdata_kardus.index');
    }
    public function create()
    {
        return view('pages.masterdata_kardus.create');
    }
    public function edit()
    {
        return view('pages.masterdata_kardus.edit');
    }
}
