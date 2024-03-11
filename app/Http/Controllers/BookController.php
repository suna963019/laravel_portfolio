<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //表示
    public function index(Request $request)
    {
        $items = Book::all();
        return view('book.index', ['items' => $items]);
    }
    //追加
    public function add(Request $request)
    {
        return view('book.add');
    }
    public function create(Request $request)
    {
        $this->validate($request, Book::$rules);
        $books = new Book();
        $form = $request->all();
        unset($form['_token']);
        $books->fill($form)->save();
        return redirect('/book');
    }

    //更新
    public function edit(Request $request)
    {
        $item = Book::find($request->id);
        return view('book.edit', ['item' => $item]);
    }
    public function update(Request $request)
    {
        $this->validate($request, Book::$rules);
        $books = Book::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $books->fill($form)->save();
        return redirect('/book');
    }
    //削除
    public function delete(Request $request)
    {
        $books = Book::find($request->id);
        return view('book.del', ['item' => $books]);
    }
    public function remove(Request $request)
    {
        Book::find($request->id)->delete();
        return redirect('/book');
    }
    //検索
    public function search(Request $request)
    {

        $name = Book::where('name', 'like', '%' . $request->word . '%')->get();
        $author = Book::where('author', 'like', '%' . $request->word . '%')->where('name', 'not like', '%' . $request->word . '%')->get();
        $is_empty_name = count($name) !== 0;
        $is_empty_author = count($name) !== 0;
        $items = [];
        if ($is_empty_name && $is_empty_author) {
            $items = array_merge($name, $author);
        } else if ($is_empty_author) {
            $items = $author;
        } else if ($is_empty_name) {
            $items = $name;
        }

        return view('book.index', ['items' => $items]);
    }
}
