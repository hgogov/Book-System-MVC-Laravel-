<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;
use App\Book;

class BooksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$books = Book::all();
        $books = Book::orderBy('id')->paginate(4);
        return view('books.index')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $author_ids = \DB::table('authors')->pluck('name', 'id');
        $genre_ids = \DB::table('genres')->pluck('name', 'id');
        return view('books.create')->with('author_ids', $author_ids)->with('genre_ids', $genre_ids);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'author_id' => 'required',
            'genre_id' => 'required',
            'title' => 'required',
            'publish_date' => 'required',
            'cover_image' => 'image|required|max:1999',
            'description' => 'required'
        ]);

        //Handle File Upload
        if ($request->hasFile('cover_image')) {
            //Get filename with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $book = new Book();
        $book->author_id = $request->input('author_id');
        $book->genre_id = $request->input('genre_id');
        $book->title = $request->input('title');
        $book->publish_date = $request->input('publish_date');
        $book->cover_image = $fileNameToStore;
        $book->description = $request->input('description');

        $book->save();

        return redirect('/books')->with('success', 'Book Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show')->with('book', $book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $author_ids = \DB::table('authors')->pluck('name', 'id');
        $genre_ids = \DB::table('genres')->pluck('name', 'id');
        return view('books.edit')->with('book', $book)->with('author_ids', $author_ids)->with('genre_ids', $genre_ids);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'author_id' => 'required',
            'genre_id' => 'required',
            'title' => 'required',
            'publish_date' => 'required'
        ]);

        $book = Book::findOrFail($id);
        $book->author_id = $request->input('author_id');
        $book->genre_id = $request->input('genre_id');
        $book->title = $request->input('title');
        $book->publish_date = $request->input('publish_date');
        $book->save();

        return redirect('/books')->with('success', 'Book Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect('/books')->with('success', 'Book Removed');
    }
}
