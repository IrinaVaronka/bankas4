@extends('layouts.app')

@section('content')

<form class="mt-4">
    <h1 class="text-center">Accounts List</h1>

    {{-- <form action="{{route('clients-index')}}" method="get" class="mt-4">

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

                <div class="col-4">
                    <div class="mb-3">
                        <label class="form-label">Filter</label>
                        <select class="form-select" name="filter">
                            @foreach($filterSelect as $value => $text)
                            <option value="{{$value}}" @if($value===$filter) selected @endif>{{$text}}</option>
                            @endforeach
                        </select>
                        <div class="form-text">Please select your filter preferences</div>
                    </div>
                </div>

                <div class="col-2">
                    <div class="mb-3">
                        <label class="form-label">Results per page</label>
                        <select class="form-select" name="per">
                            @foreach($perSelect as $value => $text)
                                <option value="{{$value}}" @if($value===$per) selected @endif>{{$text}}</option>
                            @endforeach
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
    </form> --}}
    <div class="container">
<div class="row">
    
        @forelse($accounts as $account)
        <table class="table table-sm table-light table-striped table-bordered ml-4">
            <thead>
                <tr>
                
                    <th scope="col">Account number</th>
                    <th scope="col">Account`s amount</th>
                    <th class="table-active">
                    <div class="col">
                        <form action="{{route('accounts-delete', $account)}}" method="post">
                            <button type="submit" class="btn btn-danger">Delete Account</button>
                            @csrf
                            @method('delete')
                        </form>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                
                    <td scope="col"><a class="client" href="{{route('clients-show', $account->accountClient)}}" scope="col">{{ $account->accountClient->name }} {{ $account->accountClient->surname }}</a></td>
                    <td scope="col">{{ $account->account }}</td>
                    <td scope="col">{{ $account->amount }}</td>
                </tr>
            </tbody>
            <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Dropdown button
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <a class="dropdown-item" href="{{route('clients-show', $account)}}" class="btn btn-success">Show info</a></li>
                    <li><a class="dropdown-item" href="{{route('clients-editPerson', $account)}}" class="btn btn-success">Edit personal info</a></li>
                    <li><a class="dropdown-item" href="" class="btn btn-success">Add funds</a></li>
                    <li><a class="dropdown-item" href="" class="btn btn-success">Deduct funds</a></li>
                     </ul>
                    </div>
        </table>
        @empty
        <table class="table table-sm table-light table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Account number</th>
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
      </div>
</div>
    @endsection
