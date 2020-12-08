@extends('master.layout')
@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="font-weight-bold mb-0">Library Management</h4>
                </div>

            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Author List</h4>

                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($authors as $author)
                                <tr>
                                    <th>{{$loop->iteration}}</th>
                                    <td>{{$author->name}}</td>
                                    <td>{{$author->description}}</td>
                                    <td>
                                        <span class="rounded-full h-24 w-24 flex items-center justify-center bg-gradient-to-r from-purple-400 via-pink-500 to-red-500"><img
                                                    src="{{asset("/$author->image")}}" alt=""></span></td>


                                    <td class="text-center">
                                        <button class=" inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-200 bg-red-500  hover:bg-gray-50 hover:no-underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                onclick="confirm('Are you sure about this ?') ? document.getElementById('delete-form{{$author->id}}').submit(): event.preventDefault()">
                                            <!-- Heroicon name: pencil -->
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M9 2C8.62123 2 8.27497 2.214 8.10557 2.55279L7.38197 4H4C3.44772 4 3 4.44772 3 5C3 5.55228 3.44772 6 4 6L4 16C4 17.1046 4.89543 18 6 18H14C15.1046 18 16 17.1046 16 16V6C16.5523 6 17 5.55228 17 5C17 4.44772 16.5523 4 16 4H12.618L11.8944 2.55279C11.725 2.214 11.3788 2 11 2H9ZM7 8C7 7.44772 7.44772 7 8 7C8.55228 7 9 7.44772 9 8V14C9 14.5523 8.55228 15 8 15C7.44772 15 7 14.5523 7 14V8ZM12 7C11.4477 7 11 7.44772 11 8V14C11 14.5523 11.4477 15 12 15C12.5523 15 13 14.5523 13 14V8C13 7.44772 12.5523 7 12 7Z"
                                                      fill="#4A5568"/>
                                            </svg>

                                        </button>
                                        <form action="{{route('author.destroy',$author)}}" style="display: none;"
                                              id="delete-form{{$author->id}}" method="post">
                                            @csrf
                                            @method("DELETE")
                                        </form>
                                        <a href="{{route('author.edit', $author)}}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-white-200 bg-teal-300  hover:bg-gray-50 hover:no-underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            <!-- Heroicon name: pencil -->
                                            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                 fill="currentColor" aria-hidden="true">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                                            </svg>

                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$authors->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection
