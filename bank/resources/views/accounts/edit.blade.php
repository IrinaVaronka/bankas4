@extends('layouts.app')

@section('content')
<div class="form-body">
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Add Funds</h3>
                    <p>Add funds for {{$account->accountClient->name}} {{$account->accountClient->surname}}</p>
                    <form action="{{route('accounts-update', $account)}}" method="post">
                        <div class="col-md-12">
                            <input class="form-control" type="text" name="account" readonly placeholder="Account number" value={{old('account', $account->account)}}>
                        </div>

                        <div class="col-md-12">
                            <input class="form-control" type="text" name="amount" placeholder="Amount" value={{old('amount', $account->amount)}}>
                        </div>

                        <div class="col-md-12">
                            
                            <select class="form-select" disabled>
                                <option>{{$account->accountClient->name}} {{$account->accountClient->surname}}</option>
                                
                            </select>
                        </div>


                        <div class="form-button mt-3">
                            <button id="submit" type="submit" class="btn btn-primary">Add</button>
                            @csrf
                            @method('put')
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
