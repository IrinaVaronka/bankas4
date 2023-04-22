<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index(Request $request)
    {
        $sort = $request->sort ?? '';
        


        

        $clients = match($sort) {
            'surname_asc' => Client::orderBy('surname'),
            'surname_desc' => Client::orderBy('surname', 'desc'),
            default => Client::where('id', '!=', 0)
            
        };

        $clients = $clients->paginate(5)->withQueryString();


        //  $clients = Client::all()->sortBy('surname');



        // $clients = $clients->paginate($per)->withQueryString();

        
        

        return view('clients.index', [
            'clients' => $clients,
            'sortSelect' => Client::SORT,
            'sort' => $sort,
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
        $client->idPerson = $request->idPerson;
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

    public function editPerson(Client $client)
    {
        return view('clients.editPerson', [
            'client' => $client
        ]);
    }

    public function updatePerson(Request $request, Client $client)
    {

        $client->name = $request->name;
        $client->surname = $request->surname;
        $client->save();
        return redirect()
            ->route('clients-index')
            ->with('info', 'Personal information was updated');
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

   
    public function destroy(Request $request, Client $client)
    {
        
            
        if (!$client->account()->count()) {

             $client->delete();
            
             return redirect()->route('clients-index')->with('info', 'Client was deleted');
            
             }
            
             return redirect()->back()->with('info', 'Client has account(s)');
            
             }

    
        

    

}

