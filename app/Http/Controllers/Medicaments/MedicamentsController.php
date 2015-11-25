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
        $now = new \DateTime();

        DB::table('medicaments')->insert([
            'id_user' => $user['id'],
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'ordonnance' => $request->get('ordonnance'),
            'created_at' => $now->format('Y-m-d H:i:s')
        ]);
        return redirect('admin');
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ShowUpdate($id)
    {
        $medicament = DB::select('select * from medicaments where id = ?', [$id]);
        return view('pages.update_medicament', ['medicament' => $medicament]);
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
        $now = new \DateTime();
        DB::table('medicaments')
            ->where('id', $id)
            ->update([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'ordonnance' => $request->get('ordonnance'),
                'updated_at' => $now->format('Y-m-d H:i:s')
            ]);
        return redirect('admin');
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
