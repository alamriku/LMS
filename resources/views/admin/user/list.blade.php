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
                    <h4 class="card-title">User List</h4>

                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Register Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($users as $user)
                            <tr>
                                <th>{{$i++}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->role}}</td>
                                <td>{{$user->created_at}}</td>
                                <td class="text-center">
                                    @if($user->role == \App\Models\User::USER)
                                    <span class="sm:block">
                                        <button onclick="confirm('Are you sure about this ?') ? document.getElementById('ban-form{{$user->id}}').submit(): event.preventDefault()" class="inline-flex items-center border border-gray-300 rounded-md shadow-sm text-sm font-medium text-black-200 bg-yellow-300 px-2 py-2 hover:bg-gray-50">{{$user->is_banned == \App\Models\User::BANNED ? "un-Ban" :"Ban"}}</button>
                                    </span>
                                        <form action="{{route('ban-user',$user->id)}}" style="display: none;" id="ban-form{{$user->id}}" method="post">
                                            @csrf
                                            @method("PUT")
                                        </form>
                                        @endif
                                </td>
                                <td>

                                    @if($user->role == \App\Models\User::USER)
                                    <span class="hidden sm:block">
                                        <button class=" inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-200 bg-red-500  hover:bg-gray-50 hover:no-underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" onclick="confirm('Are you sure about this ?') ? document.getElementById('delete-form{{$user->id}}').submit(): event.preventDefault()" >
                                        <!-- Heroicon name: pencil -->
                                           <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                               <path fill-rule="evenodd" clip-rule="evenodd" d="M9 2C8.62123 2 8.27497 2.214 8.10557 2.55279L7.38197 4H4C3.44772 4 3 4.44772 3 5C3 5.55228 3.44772 6 4 6L4 16C4 17.1046 4.89543 18 6 18H14C15.1046 18 16 17.1046 16 16V6C16.5523 6 17 5.55228 17 5C17 4.44772 16.5523 4 16 4H12.618L11.8944 2.55279C11.725 2.214 11.3788 2 11 2H9ZM7 8C7 7.44772 7.44772 7 8 7C8.55228 7 9 7.44772 9 8V14C9 14.5523 8.55228 15 8 15C7.44772 15 7 14.5523 7 14V8ZM12 7C11.4477 7 11 7.44772 11 8V14C11 14.5523 11.4477 15 12 15C12.5523 15 13 14.5523 13 14V8C13 7.44772 12.5523 7 12 7Z" fill="#4A5568"/>
                                            </svg>

                                        </button>
                                    </span>
                                    <form action="{{route('user-delete',$user->id)}}" style="display: none;" id="delete-form{{$user->id}}" method="post">
                                        @csrf
                                        @method("DELETE")
                                    </form>
                                        @endif
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection
