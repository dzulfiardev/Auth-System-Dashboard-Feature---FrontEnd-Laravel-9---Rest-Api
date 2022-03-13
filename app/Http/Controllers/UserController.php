<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
	public function index()
	{
		if (Auth::user()->isAdmin()) {
			return UserResource::collection(User::paginate());
		}
		return response()->json(["message" => "Forbidden"], 403);
	}

	public function show(User $user)
	{
		if (Auth::user()->isAdmin()) {
			return new UserResource($user);
		}
		return  response()->json(["message" => "Forbidden"], 403);
	}
}
