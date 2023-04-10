@extends('layouts.app')

@section('content')
<div class="container col-5 mt-4">
        <form action="{{route('clients-store')}}" class="form-create" method="post">
            <h2 class="text-center">Create new account</h2>
            <input type="text" name="name" class="form-control" placeholder="Name (from 3 characters)"  value={{old('name')}}>
            <input type="text" name="surname" class="form-control" placeholder="Surname (from 3 characters)"  value={{old('surname')}}>
            <input type="text" name="account" class="form-control" readonly placeholder="Account number" 
            value="<?= 'LT' . '60' . rand(0, 9)  . rand(0, 9)  . rand(0, 9)  . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9)  . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9)  . rand(0, 9) . rand(0, 9) . rand(0, 9)  . rand(0, 9) . rand(0, 9) ?>">
            <input type="text" name="idPerson" class="form-control" placeholder="Personal identification number"  value={{old('idPerson')}}>
            <input type="text" name="amount" class="form-control" readonly placeholder="Amount" value="0">
            <button type="submit" class="btn btn-lg btn-primary btn-block buttons">Add new account</button>
            @csrf
        </form>
</div>
@endsection