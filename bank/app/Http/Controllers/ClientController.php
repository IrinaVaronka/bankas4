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

    
    public function index(Request $request)
    {
        // $sort = $request->sort ?? '';
        // $filter = $request->filter ?? '';
        // $per = (int) ($request->per ?? 5);
        // $page = $request->page ?? 1;


        // $clients = match($filter) {
        //     'plus' => Client::where('amount', '>', 0),
        //     'minus' => Client::where('amount', '<', 0),
        //     'zero' => Client::where('amount', '=', 0),
        //     'noAcc' => Client::where('amount', '=', NULL),
        //     default => Client::where('amount', '>', -999999)
        // };

        

        // $clients = match($request->sort ?? '') {
        //     'surname_asc' => $clients->orderBy('surname'),
        //     'surname_desc' => $clients->orderBy('surname', 'desc'),
            
        // };

         $clients = Client::all()->sortBy('surname');



        // $clients = $clients->paginate($per)->withQueryString();

        
        

        return view('clients.index', [
            'clients' => $clients
            
            // 'sortSelect' => Client::SORT,
            // 'sort' => $request-> ?? '',
            // 'filterSelect' => Client::FILTER,
            // 'filter' => $filter,
            // 'perSelect' => Client::PER,
            // 'per' => $per,
            // 'page' => $page
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
