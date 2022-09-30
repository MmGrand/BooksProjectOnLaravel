<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        $books = Book::paginate(10);
        return view('admin.index', compact('books'));
    }
}
