<?php

namespace App\Http\Controllers\Pages;

use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Thread;


class HomeController extends Controller
{
    public function index()
    {
        return view('pages.threads.index', [
            'threads'=> Thread::orderBy('id', 'desc')->paginate(10),
            'categories'=>Category::all(),
        ]);
    }
}
