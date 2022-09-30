<?php

namespace App\Http\Controllers\Corporation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Session\TokenMismatchException;

use App\Http\Controllers\Controller;
use App\Services\Corporation\HelpsService;

use App\Models\Help;

class HelpsController extends Controller
{
    private $help;
    
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct(HelpsService $help)
    {
        parent::__construct();
        $this->help = $help;
    }

    // ヘルプ一覧取得(ヘルプで最初に走る処理)
    public function index(Request $request)
    {

        //dataで検索ワードをとってきてる
        $data = $request->all();

        !$request->isMethod('GET') ? abort(500, '不正なリクエストです')
        : $entities = $this->help->findBy($data);
        !$entities ? abort(500, 'データが存在しません')
        : $entityListByCategory = $entities ->get() ->groupBy('category');


        // echo '<pre>';
        // var_dump($titles);
        // echo '</pre>';
        //dd($entityListByCategory);


        $currentPage = $request->page;

        return view('Corporation.helps.helps', 
        compact('entityListByCategory', 'currentPage'));
     }

}