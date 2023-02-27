<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){

        $books = Book::all();

        return view('guest.index',compact('books'));

    }

    public function show(Book $book){

        return view('guest.show',compact('book'));

    }


}
