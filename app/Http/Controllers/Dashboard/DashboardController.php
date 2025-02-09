<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

     public function index(User $user)
    {
      $user = Auth::user();
      // dd($user->role);
      if ($user->role == 'admin' || $user->role == 'atasan') {
        return view('Dashboard', compact('user'));
      }else{

        return redirect()->route('home');
      }

    }
}
