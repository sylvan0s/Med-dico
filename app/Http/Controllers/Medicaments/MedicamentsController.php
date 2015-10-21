<?php

namespace App\Http\Controllers\Medicaments;

use DB;
use Auth;
use App\Medicaments;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MedicamentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('pages.add_medicament');
    }

    /**
     * Creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function news(Request $request)
    {
        $user = Auth::user();
        Medicaments::create([
            'id_user' => $user['id'],
            'name' => $request->get('name'),
            'définition' => $request->get('définition'),
            'ordonnance' => $request->get('ordonnance')
        ]);
        return redirect('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$medicament = Medicaments::find($id);
        $medicament = DB::select('select * from medicaments where id = ?', [$id]);
        return view('pages.fiche', ['medicament' => $medicament]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicament = Medicaments::find($id);
        $medicament->delete();
    }
}
