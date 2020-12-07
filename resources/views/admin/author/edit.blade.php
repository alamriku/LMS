@extends('master.layout')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Author</h4>

                    <form class="forms-sample" action="{{route('author.update',$author)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" value="{{$author->name}}"  placeholder="Username">
                                @if($errors->has("name"))
                                    <div class="alert alert-danger" role="alert">
                                        {{$errors->first('name')}}
                                    </div>
                                @endif

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="image"  name="image" placeholder="Email">


                            </div>

                        </div>
                        <div class="form-group row justify-content-center">
                            <div class="bg-indigo-300">
                                <img class="object-contain h-48 w-full" src="{{asset('/').$author->image}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{$author->description}}</textarea>
                                @if($errors->has("description"))
                                    <div class="alert alert-danger" role="alert">
                                        {{$errors->first('description')}}
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

