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

        return redirect()->route('accounts-index');
    }

    
    public function show(Account $account)
    {
        //
    }

    
    public function edit(Account $account)
    {
        return view('accounts.edit', [
            'account' => $account
        ]);
    }

    
    public function update(Request $request, Account $account)
    {
        
        if($request->amount <=0) {
            $request->flash();
            
            return redirect()->back()->with('info', 'Please add only positive numbers');
        }

        if(!$request->type) {
            $account->amount = $account->amount + $request->amount;
            $account->save();
        
            return redirect()
            ->route('accounts-index')
            ->with('info', 'Funds was added');  
     
        }
    }

    public function editDeduct(Account $account)
    {
        return view('accounts.editDeduct', [
            'account' => $account
        ]);
    }

    public function updateDeduct(Request $request, Account $account)
    {
        
        if($request->amount <=0) {
            $request->flash();
            
            return redirect()->back()->with('info', 'Please add only positive numbers');
        }

        else {
            $account->amount = $account->amount - $request->amount;
            $account->save();
        
            return redirect()
            ->route('accounts-index')
            ->with('info', 'Funds was deducted');  
        }
    }

    
    public function destroy(Account $account)
    {
        //
    }
}
