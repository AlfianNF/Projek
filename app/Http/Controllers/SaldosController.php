<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Saldos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SaldosController extends Controller
{
    public function saldo(){
       $user = Auth::user();

        if (!$user) {
            return redirect()->route('login'); 
        }

        $saldos = $user->saldos;

        $totalSaldo = $user->saldos->sum('saldo');

        return view('dashboard.saldo',compact('saldos', 'totalSaldo'));
    }

    public function topup_saldo(){
        $saldo = Saldos::all();
        return view('dashboard.topup_saldo');
    }
    

    public function topup(Request $request){
        $rules = [
            'email' => 'required|email',
            'saldo' => 'required',
        ];
    
        $validatedData = $request->validate($rules);
    
        $user = User::where('email', $validatedData['email'])->first();
    
        if (!$user) {
            return redirect('topup_saldo')->with('error', 'User Tidak Ditemukan');
        }
    
        $saldo = new Saldos([
            'saldo' => $validatedData['saldo'],
        ]);
    
        $user->Saldos()->save($saldo);
    
        return redirect('topup_saldo')->with('success', 'Saldo Berhasil Ditambahkan');
    }
}