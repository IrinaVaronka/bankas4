@extends('layouts.app')

@section('content')

<h1 class="text-center">Client information: {{$client->name}} </h1>


    <ul class="list-group m-4">
            <table class="table table-sm table-light table-striped table-bordered">
            <thead>
            <tr>
             <th scope="col">Name</th>
             <th scope="col">Surname</th>
             <th scope="col">Account number</th>
             <th scope="col">Personal ID</th>
             <th scope="col">Account`s amount</th>
           
            
            </tr>
            </thead>
            <tbody>
                    <tr>
                    <td scope="row">{{$client->name}}</th>
                    <td>{{$client->surname}}</td>
                    <td>{{$client->account}}</td>
                    <td>{{$client->idPerson}}</td>
                    <td>{{$client->amount}}</td>
                    </tr>
            </tbody>
            </table>
       
    </ul>
@endsection

