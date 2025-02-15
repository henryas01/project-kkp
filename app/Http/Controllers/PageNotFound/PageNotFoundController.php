<?php

namespace App\Http\Controllers\PageNotFound;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PageNotFoundController extends Controller
{
    public function index(User $user)
    {
        $user = Auth::user();
        return view('404', compact('user'));
    }
}
