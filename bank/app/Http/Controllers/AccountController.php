<?php

namespace App\Http\Controllers;


use App\Models\Account;
use App\Models\Client;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    
    public function index()
    {
        $accounts = Account::all();

        return view('accounts.index', [
            'accounts' => $accounts
        ]);
    }

    
    public function create(Request $request)
    {
        $clients = Client::all();

        $id = $request->id ?? 0;

        return view('accounts.create', [
            'clients' => $clients, 
            'id' => $id
        ]);
    }

    
    public function store(Request $request)
    {
        Account::create([
            'account' => $request->account,
            'amount' => $request->amount,
            'client_id' => $request->client_id
        ]);

        return redirect()->back();
    }

    
    public function show(Account $account)
    {
        //
    }

    
    public function edit(Account $account)
    {
        //
    }

    
    public function update(Request $request, Account $account)
    {
        //
    }

    
    public function destroy(Account $account)
    {
        //
    }
}
