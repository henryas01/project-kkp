<?php

namespace App\Http\Controllers\FormPurchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FormPurchaseController extends Controller
{

    public function index(User $user)
    {
      $user = Auth::user();
      // dd($user->role);
      if ($user->role == 'admin'|| $user->role == 'atasan')  {
        return view('form-purchase', compact('user'));
      }else{
        return redirect()->route('home');
      }

    }
}
