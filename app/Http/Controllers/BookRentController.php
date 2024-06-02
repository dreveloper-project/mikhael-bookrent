<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\RentLogs;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookRentController extends Controller
{
    public function index()
    {
        $users = User::where('id', "!=", 1)->where('status', '!=', 'inactive')->get();
        $books = Book::all();
        return view('book-rent', ['users' => $users, 'books' => $books]);
    }

    public function store(Request $request)
    {
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();

        $book = Book::findOrFail($request->book_id)->only('status');

        if ($book['status'] != 'in stock') {
            Session::flash('message', 'Cant Not Rent The Book, Cause The Book Is Not Available');
            Session::flash('alert-class', 'alert-danger');
            return redirect('book-rent');
        } else {

            $count = RentLogs::where('user_id', $request->user_id)->where('actual_return_date', null)
                ->count();

            if ($count >= 3) {
                Session::flash('message', 'Cant Not Rent The Book, Cause The User Has Reach Rent Limit!');
                Session::flash('alert-class', 'alert-danger');
                return redirect('book-rent');
            } else {
                try {
                    DB::beginTransaction();
                    RentLogs::create($request->all());

                    $book = Book::findOrFail($request->book_id);
                    $book->status = 'not available';
                    $book->save();

                    DB::commit();

                    Session::flash('message', 'Rent Book Success');
                    Session::flash('alert-class', 'alert-Success');
                    return redirect('book-rent');
                } catch (\Throwable $th) {
                    DB::rollBack();
                }
            }
        }
    }

    public function returnBook()
    {
        $users = User::where('id', "!=", 1)->where('status', '!=', 'inactive')->get();
        $books = Book::all();
        return view('book-return', ['users' => $users, 'books' => $books]);
    }

    public function saveReturnBook(Request $request)
    {
        $rent = RentLogs::where('user_id', $request->user_id)->where('book_id', $request->book_id)
            ->where('actual_return_date',  null);

        $rentData = $rent->first();
        $countData = $rent->count();

        if ($countData == 1) {
            $rentData->actual_return_date = Carbon::now()->toDateString();
            $rentData->save();

            Session::flash('message', 'The Book Is Returned Successfully');
            Session::flash('alert-class', 'alert-success');
            return redirect('book-return');
        } else {
            Session::flash('message', 'Book Return Data Not Valid');
            Session::flash('alert-class', 'alert-danger');
            return redirect('book-return');
        }
    }
}
