<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Models\Games;
use Illuminate\Http\Request;
use App\Models\TopUpNominals;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class TopUpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function gi_topup()
    {
        $topup = TopUpNominals::all();
        return view('gi.index', compact('topup'));    }

    public function hsr_topup()
    {
        $topup = TopUpNominals::all();
        return view('hsr.index', compact('topup'));
    }

    public function ml_topup()
    {
        $topup = TopUpNominals::all();
        return view('ml.index', compact('topup'));
    }

    public function coc_topup()
    {
        $topup = TopUpNominals::all();
        return view('coc.index', compact('topup'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validation rules
    $rules = [
        'username' => 'required|string|max:15',
        'uid' => 'required',
        'server' => 'required',
        'nama_nominal' => 'required',
    ];

    // Validate the request data
    $request->validate($rules);

    // Begin a database transaction
    \Illuminate\Support\Facades\DB::beginTransaction();

    try {
        // Create a new Invoice instance
        $invoice = new Invoices();

        // Extract values from 'nama_nominal' using explode
        list($namaNominal, $nominal) = explode('|', $request->input('nama_nominal'));

        // Set values in the Invoice instance
        $invoice->user_id = auth()->id();
        $invoice->username = $request->input('username');
        $invoice->uid = $request->input('uid');
        $invoice->server = $request->input('server');
        $invoice->nominal = $nominal;
        $invoice->nama_nominal = $namaNominal;

        // Save the Invoice
        $invoice->save();

        // Update user's balance
        $user = auth()->user(); // Retrieve the authenticated user

        if (($user->saldo - $nominal) < 0) {
            throw new \Exception('Insufficient balance');
        }

        // Decrement the saldo
        $user->decrement('saldo', $nominal);

        // Commit the transaction
        \Illuminate\Support\Facades\DB::commit();

        return redirect('/')->with('success', 'Top Up Anda Berhasil');
    } catch (\Exception $e) {
        // Rollback the transaction in case of an error
        \Illuminate\Support\Facades\DB::rollback();
        return redirect('/')->with('error', 'Maaf Saldo Anda Kurang');
    }
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
