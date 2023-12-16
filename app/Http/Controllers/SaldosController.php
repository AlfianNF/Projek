<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Saldos;
use App\Models\Invoices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SaldosController extends Controller
{
    public function saldo()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login'); 
        }

        // Retrieve the totalSaldo directly from the users table
        $totalSaldo = $user->saldo;

        // Retrieve the Invoices
        $invoices = Invoices::where('user_id', $user->id)->get();

        return view('dashboard.saldo', compact('totalSaldo', 'invoices'));
    }

    public function topup_saldo(){
        $saldo = Saldos::all();
        return view('dashboard.topup_saldo');
    }
    

    public function topup(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'saldo' => 'required|numeric',
        ];

        $validatedData = $request->validate($rules);

        $user = User::where('email', $validatedData['email'])->first();

        $saldo = new Saldos();
        $saldo->user_id = $user->id;
        $saldo->username = $request->username;
        $saldo->email = $user->email;
        $saldo->saldo = $validatedData['saldo'];
        $saldo->payment = $request->input('nama_nominal');
        $saldo->save();

        if (!$user) {
            return redirect('topup_saldo')->with('error', 'User Tidak Ditemukan');
        }

        // Increment the existing saldo in the users table
        $user->update(['saldo' => $user->saldo + $validatedData['saldo']]);

        return redirect('topup_saldo')->with('success', 'Saldo Berhasil Ditambahkan');
    }
}