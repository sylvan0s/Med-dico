<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RechercheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.recherche');
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
     * Show result of search.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->get('search');
        $letter = $request->get('submit');
        $begin = "";
        if($search !== null) {
            $request = "select * from `medicaments` where `name` like '%" . $search . "%'";
            $word = $search;
        }
        if($letter !== null) {
            $request = "select * from `medicaments` where `name` like '" . $letter ."%'";
            $begin = $letter;
        }

        $results = DB::select($request);
        $count = count($results);
        return view('pages.recherche', compact(array('results', 'word', 'begin', 'count')));
    }

}
