<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Client;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Client $client)
    {   
        return view('loan.create', [
            'clientLoan' => $client
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Client $client)
    {
        $clientLoan = new Loan();
        $clientLoan->loanBalance = 1;
        $clientLoan->borrowedCapital = $request->get('borrowedCapital');
        $clientLoan->period = $request->get('type');
        $clientLoan->appliedInterest = $request->get('appliedInterest');
        $clientLoan->amountInstallments = $request->get('amountInstallments');
        $clientLoan->statusLoan = 1;
        $clientLoan->client_id = $client->id;
        $clientLoan->save();

        return redirect('/clients/' . $client->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
