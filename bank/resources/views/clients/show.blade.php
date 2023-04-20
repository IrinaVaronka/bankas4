@extends('layouts.app')

@section('content')

<h1 class="text-center">Client information: {{$client->name}} {{$client->surname}} </h1>


<ul class="list-group m-4">
    <table class="table table-sm table-light table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">Personal ID</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">{{$client->name}}</th>
                <td>{{$client->surname}}</td>
                <td>{{$client->idPerson}}</td>
            </tr>
        </tbody>
    </table>
    <h2 class="text-center">Accounts:</h2>
    <table class="table table-sm table-light table-striped table-bordered">
        <thead>
            <tr>

                <th scope="col">Account number</th>
                <th scope="col">Account`s amount</th>
            </tr>
        </thead>

        @forelse($client->account as $account)
        <tbody>
            <tr>
                <td scope="col">{{ $account->account }}
                <div class="">
                                    <form action="{{route('accounts-delete', $account)}}" method="post">
                                        <button type="submit" class="btn btn-danger">delete</button>
                                        @csrf
                                        @method('delete')
                                    </form>
                                </div>
                </td>
                <td scope="col">{{ $account->amount }}
                
                </td>
            </tr>
            
        </tbody>
        </li>
        @empty
        <li class="list-group-item">
            <div class="client-line noAcc">No accounts</div>
        </li>
        @endforelse
    </table>
</ul>
<div class="buttons"><a href="{{route('accounts-create', ['id' => $client])}}" class="btn btn-success">New account</a></div>
<div class="buttons">
    <form action="{{route('clients-delete', $client)}}" method="post">
        <button type="submit" class="btn btn-danger">Delete client</button>
        @csrf
        @method('delete')
    </form>
</div>

</ul>
@endsection
