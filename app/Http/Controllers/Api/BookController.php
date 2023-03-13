<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {

        $books = Book::with('genres', 'author');



        if($request->title){
            $books->where('title','LIKE','%'.$request->title .'%');
        }
        if ($request->genre) {

            $books->whereHas('genres',function($query) use($request){
                $query->where('name',$request->genre);
            });
        }
        if($request->price){
            $books->where('price','<=',  $request->price );
        }
        if ($request->date) {
            $books->where('publication_date', '>=',  $request->date);
        }



        $booksIndex = $books->paginate(10);

        return response()->json([
            'success' => true,
            'results' => $booksIndex,
        ]);
    }

    public function show(Book $book)
    {
        $book = Book::with('genres', 'author')->findOrFail($book->id);

        return response()->json([
            'success' => true,
            'results' => $book,
        ]);
    }
}