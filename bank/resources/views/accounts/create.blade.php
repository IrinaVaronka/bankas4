@extends('layouts.app')

@section('content')
<div class="form-body">
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Add new account</h3>
                    <p>Fill in the data below</p>
                    <form action="{{route('accounts-store')}}" method="post">
                        <div class="col-md-12">
                            <input class="form-control" type="text" name="account" readonly placeholder="Account number" value={{('LT' . '60' . rand(0, 9)  . rand(0, 9)  . rand(0, 9)  . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9)  . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9)  . rand(0, 9) . rand(0, 9) . rand(0, 9)  . rand(0, 9) . rand(0, 9))}}>
                        </div>

                        <div class="col-md-12">
                            <input class="form-control" type="text" name="amount" readonly placeholder="Amount" value="0">
                        </div>

                        <div class="col-md-12">
                            
                            <select class="form-select" name="client_id">
                            <option value="0">Client list</option>
                                @foreach($clients as $client)
                                <option value="{{$client->id}}" @if($client->id == $id) selected @endif>
                                {{$client->name}} {{$client->surname}}</option>
                                @endforeach
                            </select>
                            <div class="form-text">Please select client</div>
                        </div>


                        <div class="form-button mt-3">
                            <button id="submit" type="submit" class="btn btn-primary">Add account</button>
                            @csrf
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
