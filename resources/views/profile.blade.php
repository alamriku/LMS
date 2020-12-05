@extends('master.layout')
@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="font-weight-bold mb-0">RoyalUI Dashboard</h4>
                </div>

            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Profile</h4>

                    <form class="forms-sample" action="{{route('profile-update')}}" method="post">
                        @csrf
                        @method("PUT")
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" placeholder="Username">
                                @if($errors->has("name"))
                                    <div class="alert alert-danger" role="alert">
                                        {{$errors->first('name')}}
                                    </div>
                                @endif

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="email" value="{{$user->email}}" name="email" placeholder="Email">
                                 @if($errors->has("email"))
                                    <div class="alert alert-danger" role="alert">
                                        {{$errors->first('email')}}
                                    </div>
                                @endif

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="phone" name="phone" value="{{$user->phone}}" placeholder="Mobile number">
                                 @if($errors->has("phone"))
                                    <div class="alert alert-danger" role="alert">
                                        {{$errors->first('phone')}}
                                    </div>
                                @endif

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">

                                 @if($errors->has("password"))
                                    <div class="alert alert-danger" role="alert">
                                        {{$errors->first('password')}}
                                    </div>
                                @endif

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password_confirmation" class="col-sm-3 col-form-label">Re Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password">
                                 @if($errors->has("password_confirmation"))
                                    <div class="alert alert-danger" role="alert">
                                        {{$errors->first('password_confirmation')}}
                                    </div>
                                @endif


                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
