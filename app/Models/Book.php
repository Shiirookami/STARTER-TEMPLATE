<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "books";
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'judul',
        'penulis',
        'tahun',
        'penerbit',
        'cover'
    ];
    public static function getDataBooks()
    {
        $books = Book::all();
        $books_filter = [];

        $no =1;
        for ($i=0; $i < $books->count(); $i++) {
            $books_filter[$i]['no'] = $no++;
            $books_filter[$i]['judul'] = $books[$i]->judul;
            $books_filter[$i]['penulis'] = $books[$i]->penulis;
            $books_filter[$i]['tahun'] = $books[$i]->tahun;
            $books_filter[$i]['penerbit'] = $books[$i]->penerbit;
        }
        return $books_filter;
    }
}
