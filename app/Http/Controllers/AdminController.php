<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use App\Models\Book;

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
    public function submit_book(Request $req){
        $validate = $req->validate([
            'judul'=>'required|max:255',
            'penulis'=>'required',
            'tahun'=>'required',
            'penerbit'=>'required',
        ]);
        $book = new Book;

        $book->judul = $req->get('judul');
        $book->penulis = $req->get('penulis');
        $book->tahun = $req->get('tahun');
        $book->penerbit = $req->get('penerbit');

        if ($req->hasFile('cover')){
            $extension = $req->file('cover')->extension();
            $filename = 'cover_buku_'.time().'.'.$extension;
            $req->file('cover')->storeAs(
                'public/cover_buku', $filename
            );
            $book->cover = $filename;
        }

        $book->save();

        $notification = array('message' => 'Data buku berhasil ditambahkan','alert-type'=>'succes');

        return redirect()->route('admin.books')->with($notification);
    }
    public function getDataBuku($id){
        $buku = Book::find($id);
        return response()->json($buku);
    }
    public function update_book(Request $request){
        $book = Book::find($request->get('id'));

        $validate = $request->validate([
            'judul' => 'required|max:255',
            'penulis' => 'required',
            'tahun' => 'required',
            'penerbit' => 'required',
            'cover' => 'required|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $book->judul = $request->get('judul');
        $book->penulis = $request->get('penulis');
        $book->tahun = $request->get('tahun');
        $book->penerbit = $request->get('penerbit');

        if ($request->hasFile('cover')){
                $extension = $request->file('cover')->extension();
                $filename = 'cover_buku_'.time().'.'.$extension;
                $request->file('cover')->storeAs('public/cover_buku', $filename);

                Storage::delete('public/cover_buku/'.$request->get('old_cover'));

                $book->cover = $filename;
            }

                $book->save();
                $notification = array(
                    'message' => 'Data buku berhasil diubah',
                    'alert-type' => 'success'
                );

                return redirect()->route('admin.books')->with($notification);
    }
    public function delete_book($id){
        $book = Book::find($id);
        Storage::delete('public/cover_buku/'.$book->cover);
        $book->delete();
        return redirect()->back();
    }
}
