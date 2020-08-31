<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Service\ExchangeConvertor;
use App\Service\FixerConvertor;
use App\Service\LocalConvertor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = (User::paginate(15));

        return view('users')->with('users', $users);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(StoreUserRequest $request)
    {
        $validatedData = $request->validated();
        $user = User::create($validatedData);
        return response()->redirectTo('users')->with('status', 'Successfully created');
    }

    /**
     * Display the specified resource. return json response for json request
     * @param User $user
     * @param ExchangeConvertor $exchangeConvertor
     * @return Response
     */
    public function show(User $user, ExchangeConvertor $exchangeConvertor)
    {
        $user->setConvertor($exchangeConvertor);
        if (request()->wantsJson()) {
            return response()->json(new UserResource($user), 201);
        }
        return view('user', compact('user'));
    }


}
