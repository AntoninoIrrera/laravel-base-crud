<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public $customValidations = [
        'first_name.required' => 'Il campo Nome è obbligatorio',
        'first_name.min' => 'Il campo Nome deve contenere almeno :min caratteri',
        'first_name.max' => 'Il campo Nome non può contenere più di :max caratteri',
        'last_name.required' => 'Il campo Cognome è obbligatorio',
        'last_name.min' => 'Il campo Cognome deve contenere almeno :min caratteri',
        'last_name.max' => 'Il campo Cognome non può contenere più di :max caratteri',
        'birthdate.date' => 'La data di nascita non è valida',
        'biography.max' => 'La biografia non può contenere più di :max caratteri'
    ];

    public $validationRules = [
        'first_name' => 'required|min:2|max:100',
        'last_name' => 'required|min:2|max:100',
        'birthdate' => 'nullable|date',
        'biography' => 'nullable|max:500'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::paginate(10);
        return view('admin.authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.authors.create', ["author" => new Author()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->validationRules, $this->customValidations);

        $newAuthor = new Author();
        $newAuthor->fill($data);
        $newAuthor->save();

        return redirect()->route('admin.authors.show', $newAuthor->id)->with('message', "$newAuthor->first_name $newAuthor->last_name has been created")->with('alert-type', 'info');
    }

    /**
     * Display the specified resource.
     *
     * @param  Author $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        return view('admin.authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Author $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('admin.authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $data = $request->validate($this->validationRules, $this->customValidations);
        $author->update($data);

        return redirect()->route('admin.author.show', compact('author'))->with('message', "$author->first_name $author->last_name has been update")->with('alert-type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Author $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('admin.authors.index')->with('message', "$author->first_name $author->last_name has been delete")->with('alert-type', 'warning');
    }
}
