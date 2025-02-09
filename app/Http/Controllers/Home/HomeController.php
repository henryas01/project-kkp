<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index(User $user)
    {
      $user = Auth::user();
        return view('home', compact('user'));

    }

    // public function ab(User $user)
    // {
    //     $users = $user->paginate(5);
    //     return view('admin.mangement-user', compact('users'));
    // }
}
