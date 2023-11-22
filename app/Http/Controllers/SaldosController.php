<?php

namespace App\Http\Controllers;

use App\Models\Saldos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SaldosController extends Controller
{
    public function saldo(){
        $saldo = Saldos::all();
        return view('dashboard.saldo');
    }

    public function topup_saldo(){
        $saldo = Saldos::all();
        return view('dashboard.topup_saldo');
    }
}
