<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $userService;

    public function __construct(UserService $user)
    {
        $this->middleware('auth');
        $this->userService = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(User::PAGINATE);
        return view('admin.user.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function ban(User $user)
    {
        $this->userService->ban($user);
        return redirect()->back()->with('success', 'User Status Changed');
    }

    public function unBan(User $user)
    {
        $this->userService->unBan($user);
        return redirect()->back()->with('success', 'User Status Changed');
    }


    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(ProfileRequest $request)
    {
        $this->userService->storeUser($request->all());
        return redirect()->back()->with('success', 'Librarian Added');
    }

}
