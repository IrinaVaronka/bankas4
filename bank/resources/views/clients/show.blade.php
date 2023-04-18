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
                <td scope="col">{{ $account->account }}</td>
                <td scope="col">{{ $account->amount }}</td>
            </tr>
        </tbody>
    
    </li>
    @empty

    @endforelse
    </table>
</ul>

</ul>
@endsection
