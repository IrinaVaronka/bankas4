<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function create()
    {
        return view('clients.create');
    }

    
    public function store(Request $request)
    {
        $client = new Client;
        $client->name = $request->name;
        $client->surname = $request->surname;
        $client->account = $request->account;
        $client->idPerson = $request->idPerson;
        $client->amount = $request->amount;
        $client->save();
        return redirect()->back();

    }

    
    public function show(Client $client)
    {
        //
    }

    
    public function edit(Client $client)
    {
        //
    }

    
    public function update(Request $request, Client $client)
    {
        //
    }

   
    public function destroy(Client $client)
    {
        //
    }
}
