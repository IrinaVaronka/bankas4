@extends('layouts.app')

@section('content')
<form class="mt-4">
<h1 class="text-center">Clients List</h1>
    <ul>
        @forelse($clients as $client)
            <table class="table table-sm table-success table-striped table-bordered">
            <thead>
            <tr>
             <th scope="col">Name</th>
             <th scope="col">Surname</th>
             <th scope="col">Account number</th>
             <th scope="col">Personal ID</th>
             <th scope="col">Account`s amount</th>
             <th colspan="3" class="table-active">
             <form action="{{route('clients-delete', $client)}}" method="post">
                 <button type="submit" class="btn btn-danger">Delete Account</button>
                @csrf
                @method('delete')
            </form>
            </th>
            </tr>
            </thead>
           <tbody>
                    <tr>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->surname }}</td>
                    <td>{{ $client->account }}</td>
                    <td>{{ $client->idPerson }}</td>
                    <td>{{ $client->amount }}</td>
                    <th scope="col"><a href="{{route('clients-show', $client)}}" class="btn btn-success">Show info</a></th>
                    <th scope="col"><a href="{{route('clients-edit', $client)}}" class="btn btn-success">Add funds</a></th>
                    <th scope="col"><a href="{{route('clients-editDeduct', $client)}}" class="btn btn-success">Deduct funds</a></th>
                    </tr>
            </tbody>
            </table>
        @empty
            <table class="table table-sm table-success table-striped table-bordered">
            <thead>
            <tr>
             <th scope="col">Name</th>
             <th scope="col">Surname</th>
             <th scope="col">Account number</th>
             <th scope="col">Personal ID</th>
             <th scope="col">Account`s amount</th>
             </thead>
             <tbody>
             <td colspan="5" class="empty">No clients yet</td>
             </tbody>
             </table>
            @endforelse
    </ul>
    @endsection


