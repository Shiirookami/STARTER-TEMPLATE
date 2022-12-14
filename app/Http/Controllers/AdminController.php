<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    public function __construct(){
        $this ->middleware('auth');
    }
    public function books(){
        $user = Auth::user();
        $books = Book::all();
        return view('book', compact('user','books'));
    }
}
