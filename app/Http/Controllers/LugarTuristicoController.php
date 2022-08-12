<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\LugarTuristico;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\LugarTuristicoFormRequest;
use DB;


class LugarTuristicoController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $lugarturisticos=DB::table('lugarturistico')->where('nombre','LIKE','%'.$query.'%')
            ->whereNull('deleted_at')
            ->orderBy('id_lugar','desc')
            ->paginate(7);
            return view('interfaz.lugarturistico.index',["lugarturisticos"=>$lugarturisticos,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("interfaz.lugarturistico.create");
    }
    public function store (LugarTuristicoFormRequest $request)
    {
        $lugarturistico=new LugarTuristico;
        $lugarturistico->nombre=$request->get('nombre');
        $lugarturistico->descripcion=$request->get('descripcion');
        $lugarturistico->save();
        return Redirect::to('interfaz/lugarturistico');

    }
    public function show($id)
    {
        return view("interfaz.lugarturistico.show",["lugarturistico"=>LugarTuristico::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("interfaz.lugarturistico.edit",["lugarturistico"=>LugarTuristico::findOrFail($id)]);
    }
    public function update(LugarTuristicoFormRequest $request, $id)
    {
        $lugarturistico=LugarTuristico::findOrFail($id);
        $lugarturistico->nombre=$request->get('nombre');
        $lugarturistico->descripcion=$request->get('descripcion');
        $lugarturistico->update();
        return Redirect::to('interfaz/lugarturistico');
    }
    public function destroy($id)
    {
        $lugarturistico=LugarTuristico::findOrFail($id);
        $lugarturistico->delete();
        return Redirect::to('interfaz/lugarturistico');
    }
}
