<?php

namespace App\Http\Controllers\User;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Products;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IndexController 
{
    use AuthorizesRequests;
    public function index(Request $request)
    {
        $this->authorize('viewWelcome', User::class);

        $products = Products::orderBy('id', 'desc')->paginate(3);

        return view('welcome.welcome', compact('products'));
    }
}
