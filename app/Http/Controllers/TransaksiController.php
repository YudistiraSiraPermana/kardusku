<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('pages.transaksi.index');
    }

    public function view()
    {
        return view('pages.report_transaksi.index');
    }
}
