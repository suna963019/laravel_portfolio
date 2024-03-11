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
        
        try {
            $count=1;
            if (!empty($request->page)) {
                $count=$request->page;
            }
            $crawler = $client->request('GET', 'https://app.rakuten.co.jp/services/api/BooksTotal/Search/20170404?format=json&keyword=java&booksGenreId=000&applicationId=1061760652970954311&hits=30&page=' . $count);
            $crawler = $crawler->getBody();
            $text = json_decode($crawler, true);
            $text = $text['Items'];
        } catch (\Throwable $th) {
            $text = 'CONECTION_ERROR';
        }
        return view('rakuten.index', ['items' => $text, 'count' => $count]);
    }
    public function add(Request $request)
    {
        return view('rakuten.add', ['item' => $request]);
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
}
