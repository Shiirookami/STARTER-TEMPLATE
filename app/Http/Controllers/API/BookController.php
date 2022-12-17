<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function books()
    {
        try{
            $books = Book::all();
            return response()->json([
                'message' => 'succes',
                'books' => '$books',
            ], 200);
        }catch (Exception $e){
            return response()->json([
                'message' => 'Request failed',
            ], 401);
        }
    }
    public function create(Request $req)
    {
        // input namr = array
        // cobtroller = req involved/exaplod
        $validated = $req->validate([
            'judul' => 'required|max:255',
            'penulis' => 'required',
            'tahun' => 'required',
            'penerbit' => 'required',
            'cover' => 'required',
        ]);
        if($req->hasFile('cover')){
            $extension = $req->file('cover')->extension();
            $filename ='cover_buku'.time().'.'.$extension;
            $req->file('cover')->storeAs('public/cover_buku', $filename);
        }
        Book:create($validated);
        return response()->json([
            'message' => 'buku ',
            'book' => $validated,
        ], 200);
    }
}
