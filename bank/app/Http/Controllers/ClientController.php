<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    
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
            'idPerson' => 'required|numeric|unique:clients|min_digits:11|max_digits:11'
        ],
        [
            'name.min' => 'Name is too short - should be at least 3 characters',
            'surname.min' => 'Surname is too short - should be at least 3 characters',
            'idPerson.min' => 'Personal ID should have 11 digits'
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
        ->route('clients-index')
        ->with('ok', 'New client was created');

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
            ->route('clients-index')
            ->with('info', 'Amount was added');
    }

    public function updateDeduct(Request $request, Client $client)
    {
        $amountMinus = $client->amount - $request->amount;
        if ($client->amount < $request->amount) {
            return redirect()
                ->route('clients-editDeduct', $client)
                ->with('info','You want to deduct too much!');
        }
        $client->amount = $amountMinus;
        $client->save();
        return redirect()
            ->route('clients-index')
            ->with('info', 'Amount was deducted');
    }

   
    public function destroy(Client $client)
    {
        if ($client->amount > 0) {
            return redirect()
                ->route('clients-index')
                ->with('info','Client account not empty!');
        }

        $client->delete();
        return redirect()
        ->route('clients-index')
        ->with('info', 'The client was deleted!');
    }
}
