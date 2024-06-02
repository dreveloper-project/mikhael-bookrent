<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        if ($request->category || $request->title) {

            // $books =  Book::where('title', 'like', '%'.$request->title.'%')
            //             ->orWhereHas('categories', function($q) use($request) {
            //                 $q->where('categories.id', $request->category);
            //             })->get(); yang punya youtube blunder . kode ini not work

            $books = Book::when($request->title, function ($query) use ($request) {
                $query->where('title', 'like', '%'.$request->title.'%');
            })->when($request->category, function ($query) use ($request) {
                $query->whereHas('categories', function ($q) use ($request) {
                    $q->where('category_id', $request->category);
                });
            })->get();
           
            
           
        } else {
            $books = Book::all();
        }

     

        return view('book-list', ['books' => $books, 'categories' => $categories]);
    }
}
