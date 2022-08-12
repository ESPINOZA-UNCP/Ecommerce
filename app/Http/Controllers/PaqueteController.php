<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Paquete;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PaqueteFormRequest;
use DB;


class PaqueteController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $paquetes=DB::table('paquete as pq')->where('pq.nombre','LIKE','%'.$query.'%')
            ->whereNull('pq.deleted_at')
            ->leftJoin('categoria as c', 'pq.id_categoria', '=', 'c.id_categoria')
            ->select(
                'pq.*',
                'c.*',
                'pq.nombre as pq_nombre',
                'c.nombre as c_nombre',
            )
            ->orderBy('pq.id_paquete','desc')
            ->paginate(7);
            return view('interfaz.paquete.index',["paquetes"=>$paquetes,"searchText"=>$query]);
        }
    }
    public function create()
    {
        $categorias=DB::table('categoria')->get();
        return view("interfaz.paquete.create",["categorias"=>$categorias]);
    }
    public function store (PaqueteFormRequest $request)
    {
        $paquete=new Paquete;
        $paquete->nombre=$request->get('nombre');
        $paquete->id_categoria=$request->get('id_categoria');
        $paquete->save();
        return Redirect::to('interfaz/paquete');

    }
    public function show($id)
    {
        return view("interfaz.paquete.show",["paquete"=>Paquete::findOrFail($id)]);
    }
    public function edit($id)
    {
        $categorias=DB::table('categoria')->get();
        return view("interfaz.paquete.edit",["paquete"=>Paquete::findOrFail($id),"categorias"=>$categorias]);
    }
    public function update(PaqueteFormRequest $request, $id)
    {
        $paquete=Paquete::findOrFail($id);
        $paquete->nombre=$request->get('nombre');
        $paquete->id_categoria=$request->get('id_categoria');
        $paquete->update();
        return Redirect::to('interfaz/paquete');
    }
    public function destroy($id)
    {
        $paquete=Paquete::findOrFail($id);
        $paquete->delete();
        return Redirect::to('interfaz/paquete');
    }
}
