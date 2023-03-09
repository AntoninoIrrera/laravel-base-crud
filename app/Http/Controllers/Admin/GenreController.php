<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $validation = [
        "name" => 'required|string|max:100',
        "color" => 'required|string|max:8',
    ];

    public function index()
    {
        $genres = Genre::all();
        $trashed = Genre::onlyTrashed()->get()->count();
        return view('admin.genres.index', compact('genres', 'trashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.genres.create', ["genre" => new Genre()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->validation);

        $newGenre = new Genre();
        $newGenre->fill($data);
        $newGenre->save();

        return redirect()->route('admin.genres.show', $newGenre->id)->with('message', "$newGenre->name has been created")->with('alert-type', 'info');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        return view('admin.genres.show', compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        return view('admin.genres.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genre $genre)
    {
        $editData = $request->validate($this->validation);

        $genre->update($editData);

        return redirect()->route('admin.genres.show', compact('genre'))->with('message', "$genre->name has been update")->with('alert-type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('admin.genres.index')->with('message', "$genre->name has been delete")->with('alert-type', 'warning');
    }

    public function trashed()
    {
        $genres = Genre::onlyTrashed()->get();
        return view('admin.genres.trashed', compact('genres'));
    }

    public function forceDelete($id)
    {
        Genre::where('id', $id)->withTrashed()->forceDelete();
        return redirect()->route('admin.genres.index')->with('message', "The genre has been deleted definitely")->with('alert-type', 'warning');
    }

    public function restoreAll()
    {
        Genre::onlyTrashed()->restore();
        return redirect()->route('admin.genres.index')->with('message', "All genres have been successfully restored")->with('alert-type', 'success');
    }

    public function restore($id)
    {
        Genre::where('id', $id)->withTrashed()->restore();
        return redirect()->route('admin.genres.index')->with('message', "The genre has been successfully restored")->with('alert-type', 'success');
    }
}