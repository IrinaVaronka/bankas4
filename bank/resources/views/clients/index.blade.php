@extends('layouts.app')

@section('content')

<form class="mt-4">
    <h1 class="text-center">Clients DataBase</h1>

    <form action="{{route('clients-index')}}" method="get" class="mt-4">

        <div class="container">
            <div class="row">

                <div class="col-4">
                    <div class="mb-3">
                        <label class="form-label">Sort</label>
                        <select class="form-select" name="sort">
                            @foreach($sortSelect as $value => $text)
                            <option value="{{$value}}" @if($value===$sort) selected @endif>{{$text}}</option>
                            @endforeach
                        </select>
                        <div class="form-text">Please select your sort preferences</div>
                    </div>
                </div>

                

               

                <div class="col-2">
                    <div class="sort-filter-buttons">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{route('clients-index')}}" class="btn btn-danger">clear</a>
                    </div>
                </div>

            </div>
        </div> 
    </form>
    <div class="container">
<div class="row">
    
        @forelse($clients as $client)
        <table class="table table-sm table-light table-striped table-bordered ml-4">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Personal ID</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <div class="accounts-count">orders: {{$client->account->count()}}</div>
                <tr>
                    <td scope="col">{{ $client->name }}</td>
                    <td scope="col">{{ $client->surname }}</td>
                    {{-- <td>{{ $client->account }}</td> --}}
                    <td scope="col">{{ $client->idPerson }}</td>
                    {{-- <td>{{ $client->amount }}</td> --}}
                    
                   
                    <th scope="col"><a href="{{route('clients-show', $client)}}" class="btn btn-success">Show info</a></th>
                    <th scope="col"><a href="{{route('clients-editPerson', $client)}}" class="btn btn-success">Edit personal info</a></th>
                    
                    {{-- <th scope="col"><a href="{{route('clients-edit', $client)}}" class="btn btn-success">Add funds</a></th>
                    <th scope="col"><a href="{{route('clients-editDeduct', $client)}}" class="btn btn-success">Deduct funds</a></th> --}}
                </tr>
            </tbody>
        </table>
        @empty
        <table class="table table-sm table-light table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    {{-- <th scope="col">Account number</th> --}}
                    <th scope="col">Personal ID</th>
                    {{-- <th scope="col">Account`s amount</th> --}}
            </thead>
            <tbody>
                <td colspan="5" class="empty">No clients yet</td>
            </tbody>
        </table>
        @endforelse
    </ul>
    <div class="m-4">
        {{ $clients->links() }}
    </div>
      </div>
</div>
    @endsection
