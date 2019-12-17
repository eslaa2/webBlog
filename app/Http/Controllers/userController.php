<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class userController extends Controller
{
public function index()
    {
    $user=User::all();
    return view('admin.users.index',compact('user'));
    }
}
