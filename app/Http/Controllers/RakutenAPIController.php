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
            $keyword='';
            $searchword='';
            if(!empty($request->keyword)){
                $keyword=$request->keyword;
                $searchword='&keyword='.$keyword;
            }
            $crawler = $client->request('GET', 'https://app.rakuten.co.jp/services/api/BooksTotal/Search/20170404?format=json'.$searchword.'&booksGenreId=000&applicationId=1061760652970954311&hits=10&page=' . $count);
            $crawler = $crawler->getBody();
            $text = json_decode($crawler, true);
            $items = $text['Items'];
        } catch (\Throwable $th) {
            $items = 'CONECTION_ERROR';
        }
        return view('rakuten.index', ['items' => $items, 'count' => $count, 'keyword'=>$keyword]);
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
