<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Categoria;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoriaFormRequest;
use DB;


class CategoriaController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $categorias=DB::table('categoria as c')->where('c.nombre','LIKE','%'.$query.'%')
            ->whereNull('c.deleted_at')
            ->leftJoin('itinerario as it', 'c.id_itinerario', '=', 'it.id_itinerario')
            ->leftJoin('lugarturistico as lt', 'c.id_lugar', '=', 'lt.id_lugar')
            ->select(
                'c.*',
                'it.*',
                'lt.*',
                'c.nombre as c_nombre',
                'c.descripcion as c_descripcion',
                'lt.nombre as lt_nombre',
                'lt.descripcion as lt_descripcion',
            )
            ->orderBy('c.id_categoria','desc')
            ->paginate(7);
            return view('interfaz.categoria.index',["categorias"=>$categorias,"searchText"=>$query]);
        }
    }
    public function create()
    {
        $itinerarios=DB::table('itinerario')->get();
        $lugarturisticos=DB::table('lugarturistico')->get();
        return view("interfaz.categoria.create",["itinerarios"=>$itinerarios,"lugarturisticos"=>$lugarturisticos]);
    }
    public function store (CategoriaFormRequest $request)
    {
        $categoria=new Categoria;
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->precio=$request->get('precio');
        $categoria->id_itinerario=$request->get('id_itinerario');
        $categoria->id_lugar=$request->get('id_lugar');
        $categoria->save();
        return Redirect::to('interfaz/categoria');

    }
    public function show($id)
    {
        return view("interfaz.categoria.show",["categoria"=>Categoria::findOrFail($id)]);
    }
    public function edit($id)
    {
        $itinerarios=DB::table('itinerario')->get();
        $lugarturisticos=DB::table('lugarturistico')->get();
        return view("interfaz.categoria.edit",["categoria"=>Categoria::findOrFail($id),"itinerarios"=>$itinerarios,"lugarturisticos"=>$lugarturisticos]);
    }
    public function update(CategoriaFormRequest $request, $id)
    {
        $categoria=Categoria::findOrFail($id);
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->precio=$request->get('precio');
        $categoria->id_itinerario=$request->get('id_itinerario');
        $categoria->id_lugar=$request->get('id_lugar');
        $categoria->update();
        return Redirect::to('interfaz/categoria');
    }
    public function destroy($id)
    {
        $categoria=Categoria::findOrFail($id);
        $categoria->delete();
        return Redirect::to('interfaz/categoria');
    }
}
