<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PDF;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdfbook($id)
    {
        
        $book = Book::where('id', $id)->first();

        if (Auth::user()->total_download >= 3) {
            return redirect()->back()->with('status', "You've reached your download limit today!");
        }

        Book::where('id', $book->id)->update([
            'download' => $book->download + 1
        ]);

        User::where('id', Auth::user()->id)->update([
            'total_download' => Auth::user()->total_download + 1
        ]);

        $pdf = PDF::loadview('user.pdfbook', ['pdfbook' => $book], compact('book'));
        return $pdf->download($book['title'] . '.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'writer' => 'required',
            'publisher' => 'required',
            'no_isbn' => 'required',
            'sinopsis' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('/assets/cover/'), $nama_file);
        }

        Book::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'writer' => $request->writer,
            'publisher' => $request->publisher,
            'isbn' => $request->no_isbn,
            'sinopsis' => $request->sinopsis,
            'cover' => $nama_file,
        ]);


        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function bookpatch(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'writer' => 'required',
            'publisher' => 'required',
            'no_isbn' => 'required',
            'sinopsis' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('/assets/cover/'), $nama_file);
        }

        Book::where('id', $id)->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'writer' => $request->writer,
            'publisher' => $request->publisher,
            'isbn' => $request->no_isbn,
            'sinopsis' => $request->sinopsis,
            'cover' => $nama_file,
        ]);

        return redirect('/databook');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function bookdelete($id)
    {
        Book::where('id', $id)->delete();
        return back();
    }
}