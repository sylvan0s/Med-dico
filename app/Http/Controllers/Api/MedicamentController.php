<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MedicamentController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fiche($id)
    {
        $medicament = DB::select('select * from medicaments where id = ?', [$id]);
        return response()->json(compact('medicament'));
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
    public function show($email_user)
    {
        $id_user = DB::table('users')->where('email', $email_user)->value('id');
        $medicament = DB::select('select * from medicaments where id_user = ?', [$id_user]);
        return response()->json(compact('medicament'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $now = new \DateTime();
        $id_user = DB::table('users')->where('email', $request->get('email_user'))->value('id');
        DB::table('medicaments')->insert([
            'id_user' => $id_user,
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'forme' => $request->get('forme'),
            'voie' => $request->get('voie'),
            'remboursement' => $request->get('remboursement'),
            'prix' => $request->get('prix'),
            'laboratoire' => $request->get('laboratoire'),
            'ordonnance' => $request->get('ordonnance'),
            'created_at' => $now->format('Y-m-d H:i:s')
        ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
