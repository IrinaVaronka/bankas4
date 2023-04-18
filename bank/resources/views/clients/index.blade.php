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
                            {{-- @foreach($sortSelect as $value => $text)
                            <option value="{{$value}}" @if($value===$sort) selected @endif>{{$text}}</option>
                            @endforeach --}}
                        </select>
                        <div class="form-text">Please select your sort preferences</div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="mb-3">
                        <label class="form-label">Filter</label>
                        <select class="form-select" name="filter">
                            {{-- @foreach($filterSelect as $value => $text)
                            <option value="{{$value}}" @if($value===$filter) selected @endif>{{$text}}</option>
                            @endforeach --}}
                        </select>
                        <div class="form-text">Please select your filter preferences</div>
                    </div>
                </div>

                <div class="col-2">
                    <div class="mb-3">
                        <label class="form-label">Results per page</label>
                        <select class="form-select" name="per">
                            {{-- @foreach($perSelect as $value => $text)
                                <option value="{{$value}}" @if($value===$per) selected @endif>{{$text}}</option>
                            @endforeach --}}
                        </select>
                        <div class="form-text">View preferences</div>
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
    <ul class="list-group m-4">
        @forelse($clients as $client)
        <table class="table table-sm table-light table-striped table-bordered ml-4">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Account number</th>
                    <th scope="col">Personal ID</th>
                    <th scope="col">Account`s amount</th>
                    <th colspan="4" class="table-active">
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
                    <th scope="col"><a href="{{route('clients-editPerson', $client)}}" class="btn btn-success">Edit personal info</a></th>
                    <th scope="col"><a href="{{route('clients-edit', $client)}}" class="btn btn-success">Add funds</a></th>
                    <th scope="col"><a href="{{route('clients-editDeduct', $client)}}" class="btn btn-success">Deduct funds</a></th>
                </tr>
            </tbody>
        </table>
        @empty
        <table class="table table-sm table-light table-striped table-bordered">
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
    {{-- <div class="m-4">
        {{ $clients->links() }}
    </div> --}}
    @endsection
