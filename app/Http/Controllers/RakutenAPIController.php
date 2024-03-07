<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Book;

class RakutenAPIController extends Controller
{
    public function index(Request $request)
    {
        $client = new Client();
        if (empty($request->page)) {
            $request->page = 1;
        }
        try {
            $count = $request->page;
            $crawler = $client->request('GET', 'https://app.rakuten.co.jp/services/api/BooksTotal/Search/20170404?format=json&keyword=java&booksGenreId=000&applicationId=1061760652970954311&hits=30&page=' . $count);
            $crawler = $crawler->getBody();
            $text = json_decode($crawler, true);
            $text = $text['Items'];
        } catch (\Throwable $th) {
            $text = 'CONECTION_ERROR';
        }
        return view('book.rakuten', ['items' => $text, 'count' => $count]);
    }
    public function rakutenAdd(Request $request)
    {
        return view('book.rakutenAdd', ['item' => $request]);
    }
    public function rakutenCreate(Request $request)
    {
        $this->validate($request, Book::$rules);
        $books = new Book();
        $form = $request->all();
        unset($form['_token']);
        $books->fill($form)->save();
        return redirect('/book');
    }
}
