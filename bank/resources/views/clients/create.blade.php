@extends('layouts.app')

@section('content')
<div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Add a new client</h3>
                        <p>Fill in the data below</p>
                        <form action="{{route('clients-store')}}" method="post">
                            <div class="col-md-12">
                               <input class="form-control" type="text" name="name" placeholder="Name" value={{old('name')}}>
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="text" name="surname" placeholder="Surname" value={{old('surname')}}> 
                            </div>


                           <div class="col-md-12">
                              <input class="form-control" type="text" name="idPerson" placeholder="Personal identification number" value={{old('idPerson')}}>
                           </div>


                            <div class="form-button mt-3">
                                <button id="submit" type="submit" class="btn btn-primary">Add client</button>
                                 @csrf
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection