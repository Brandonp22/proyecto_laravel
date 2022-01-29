<?php

namespace App\Http\Controllers;

use App\Mail\loanSummary;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Mail;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.index', [
            'clients' => Client::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'direction' => 'required',
            'dpi' => 'required|min:13',
        ]);

        $newClient = new Client();
        $newClient->name = $request->get('name');
        $newClient->lastname = $request->get('lastname');
        $newClient->direction = $request->get('direction');
        $newClient->dpi = $request->get('dpi');
        $newClient->status = 1;
        $newClient->save();

        return redirect('/clients');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('client.show', [
            'clientLoan' => $client
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('client.edit', [
            'client' => $client
        ]);
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
        $validData = $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'direction' => 'required',
            'dpi' => 'required|min:13',
        ]);

        $client = Client::findOrFail($id);
        $client->name = $request->get('name');
        $client->lastname = $request->get('lastname');
        $client->direction = $request->get('direction');
        $client->dpi = $request->get('dpi');
        $client->save();

        return redirect('/clients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect('/clients');
    }

    public function confirmDelete($id){
        $client = Client::findOrFail($id);
        return view('client.confirmDelete', [
            'client' => $client
        ]);
    }

    public function confirmSendEmail($id){
        $client = Client::findOrFail($id);
        return view('client.confirmSendEmail', [
            'client' => $client
        ]);
    }

    public function sendEmail(Request $request, $id){
        $client = Client::findOrFail($id);
        Mail::to($request->get('email'))->send(new loanSummary($client));
        return redirect('/clients/'. $id);
    }

}
