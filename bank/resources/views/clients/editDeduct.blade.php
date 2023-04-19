@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card mt-5">
                <div class="card-header">
                    <h1 class="text-center">Deduct Funds</h1>
                </div>
                <div class="card-body">
                    <form class="form-create" action="{{route('clients-updateDeduct', $client)}}" method="post">
                        <label>Client`s name: </label>
                        <input type="text" name="name" class="form-control" readonly value="{{$client->name }}">
                        <label>Client`s surname: </label>
                        <input type="text" name="surname" class="form-control" readonly value="{{ $client->surname }}">
                        <label>Client`s account: </label>
                        <input type="text" name="account" class="form-control" readonly value="{{ $client->account }}">
                        <label>Client`s amount: </label>
                        <input type="text" name="amount" class="form-control" readonly value="{{ $client->amount }}">
                        <label>Deduct funds, EUR: </label>
                        <input type="text" name="amount" class="form-control"  >
                        <button type="submit" class="btn btn-lg btn-primary btn-block buttons">Deduct</button>
                        @csrf
                        @method('put')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


        
          
   
