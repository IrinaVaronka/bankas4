<?php

namespace App\Http\Controllers;


use App\Models\Account;
use App\Models\Client;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    
    public function index(Request $request)
    {
        $sort = $request->sort ?? '';
        $filter = $request->filter ?? '';
        

         $accounts = match($filter) {
                'plus' => Account::where('amount', '>', 0),
                'minus' => Account::where('amount', '<', 0),
                'zero' => Account::where('amount', '=', 0),
                'noAcc' => Account::where('amount', '=', NULL),
                default => Account::where('amount', '>', -9999999)
            };

           
            
            $accounts = match($sort) {
                'surname_asc' => $accounts->orderBy('surname'),
                'surname_desc' => $accounts->orderBy('surname', 'desc'),
                
            };

            $accounts = $accounts->get();

            

            // $accounts = $accounts->paginate(3)->withQueryString();


        //   $accounts = Account::all();

        return view('accounts.index', [
            'accounts' => $accounts, 
            'sortSelect' => Account::SORT,
            'sort' => $sort,
            'filterSelect' => Account::FILTER,
            'filter' => $filter
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
        if ($account->amount != 0) {
            return redirect()->back()->with('info', 'Account have funds!');
        }
        else {
            $account->delete();
            return redirect()->route('clients-index')->with('info', 'Account was deleted');
        }
    }
}
