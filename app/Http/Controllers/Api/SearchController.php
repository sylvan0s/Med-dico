<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     * Search API
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->get('search');
       //$letter = $request->get('submit');
        //$begin = "";
        if($search !== null) {
            $request = "select * from `medicaments` where `name` like '%" . $search . "%' LIMIT 100";
            //$word = $search;
        }
        /* if($letter !== null) {
            $request = "select * from `medicaments` where `name` like '" . $letter ."%'";
            $begin = $letter;
        }*/

        $results = DB::select($request);
        //$count = count($results);
        return response()->json(compact('results'));
        //return view('pages.recherche', compact(array('results', 'word', 'begin', 'count')));
    }

}
