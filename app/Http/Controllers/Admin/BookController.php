<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;


class BookController extends Controller
{

    public $validator = [
        "title" => "required|string|min:2|max:100",
        "author" => "nullable|string|max:100",
        "publication_date" => "nullable|date",
        "description" => "nullable|string",
        "genre" => "required|string|max:100",
        "cover_image" => "nullable|url",
        "ISBN" => "required|unique:books|string|max:13",
        "price" => "required|numeric",
        "editor" => "required|string|max:100",
    ];

    public $errorMsg = [
        'title.required' => 'Il titolo è obbligatorio.',
        'title.min' => 'Il titolo deve essere di almeno due caratteri.',
        'title.max' => 'Il titolo non deve essere più di 100 caratteri.',
        'author.max' => "L'autore non deve avere più di 100 caratteri.",
        'publication_date' => 'La data di uscita deve essere valida.',
        'price.required' => 'Il prezzo è obbligatorio.',
        "cover_image.required" => 'La copertina è richiesta.',
        'ISBN.required' => "L'ISBN è richiesto",
        'ISBN.unique' => "L'ISBN deve essere unico",
        'ISBN.max' => "L'ISBN deve essere di 13 caratteri",
        'editor.required' => "L'editore è richiesto.",
        'editor.max' => "L'editore non deve avere più di 100 caratteri.",
    ];



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $books = Book::paginate(10);

        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Book $book)
    {
        return view('admin.books.create', compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->validator, $this->errorMsg);
        $newBook = new Book();
        $newBook->fill($data);
        $newBook->save();


        return redirect()->route('admin.books.show', $newBook->id)->with('message', "$newBook->title has been created")->with('alert-type', 'info');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Book $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('admin.books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        // $this->getValidated($request);
        $rules = $this->validator;
        $rules['ISBN'] = ['required', 'string', 'max:13', Rule::unique('books')->ignore($book->id)];

        $editData = $request->validate($rules, $this->errorMsg);

        $book->update($editData);

        return redirect()->route('admin.books.index', compact('book'))->with('message', 'Elemento modificato con successo')->with('alert-type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('admin.books.index')->with('message', "The book $book->title has been moved to the bin")->with('alert-type', 'warning');
    }

    public function trashed()
    {
        $books = Book::onlyTrashed()->get();
        return view('admin.books.trashed', compact('books'));
    }

    public function forceDelete($id)
    {
        Book::where('id', $id)->withTrashed()->forceDelete();
        return redirect()->route('admin.books.trashed')->with('message', "The book has been deleted definitely")->with('alert-type', 'warning');
    }

    public function restoreAll()
    {
        Book::onlyTrashed()->restore();
        return redirect()->route('admin.books.index')->with('message', "All books have been successfully restored")->with('alert-type', 'success');
    }

    public function restore($id)
    {
        Book::where('id', $id)->withTrashed()->restore();
        return redirect()->route('admin.books.trashed')->with('message', "The book has been successfully restored")->with('alert-type', 'success');
    }
}
