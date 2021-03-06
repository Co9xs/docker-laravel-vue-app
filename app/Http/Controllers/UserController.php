<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function reviews (User $user) 
    {
        return $user->reviews()->with('user', 'company')->get();
    }
    public function update (Request $request, User $user) 
    {
        $user->fill($request->all())->save();
        return $user;
    }
}
