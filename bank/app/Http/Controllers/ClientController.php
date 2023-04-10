<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    
    public function index()
    {
        $clients = Client::all()->sortBy('name');

        return view('clients.index', [
            'clients' => $clients
        ]);
    }

    
    public function create()
    {
        return view('clients.create');
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|alpha:ascii|min:3',
            'surname' => 'required|alpha:ascii|min:3',
            'idPerson' => 'required|numeric|min_digits:11|max_digits:11'
        ],
        [
            'name.min' => 'Name is too short - should be at least 3 characters',
            'surname.min' => 'Surname is too short - should be at least 3 characters',
            'idPerson.size' => 'Personal ID should have 11 digits'
        ]);

        if ($validator->fails()) {
            $request->flash();
            return redirect()
                ->back()
                ->withErrors($validator);
        }



        $client = new Client;
        $client->name = $request->name;
        $client->surname = $request->surname;
        $client->account = $request->account;
        $client->idPerson = $request->idPerson;
        $client->amount = $request->amount;
        $client->save();
        return redirect()
        ->route('clients-index');

    }

    
    public function show(Client $client)
    {
        return view('clients.show', [
            'client' => $client
        ]);
    }

    
    public function edit(Client $client)
    {
        return view('clients.edit', [
            'client' => $client
        ]);
    }

    public function editDeduct(Client $client)
    {
        return view('clients.editDeduct', [
            'client' => $client
        ]);
    }

    
    public function update(Request $request, Client $client)
    {
        $amountPlus = $client->amount + $request->amount;
        $client->amount = $amountPlus;
        $client->save();
        return redirect()
            ->route('clients-index');
    }

    public function updateDeduct(Request $request, Client $client)
    {
        $amountMinus = $client->amount - $request->amount;
        $client->amount = $amountMinus;
        $client->save();
        return redirect()
            ->route('clients-index');
    }

   
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()
        ->route('clients-index');
    }
}
