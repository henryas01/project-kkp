<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MasterController extends Controller
{

    public function index(User $user)
    {
      $user = Auth::user();
        // dd($user);
        return view('master-data', compact('user'));

    }

    // public function ab(User $user)
    // {
    //     $users = $user->paginate(5);
    //     return view('admin.mangement-user', compact('users'));
    // }
}
