@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card mt-5">
                <div class="card-header">
                    <h1 class="text-center">Edit personal information</h1>
                </div>
                <div class="card-body">
                    <form class="form-create" action="{{route('clients-updatePerson', $client)}}" method="post">
                        <label>Client`s name: </label>
                        <input type="text" name="name" class="form-control" value="{{$client->name }}">
                        <label>Client`s surname: </label>
                        <input type="text" name="surname" class="form-control" value="{{ $client->surname }}">
                        <button type="submit" class="btn btn-lg btn-primary btn-block buttons">Save changes</button>
                        @csrf
                        @method('put')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


        
          
   
