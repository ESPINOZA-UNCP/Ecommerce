<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Itinerario;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ItinerarioFormRequest;
use DB;


class ItinerarioController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $itinerarios=DB::table('itinerario')->where('id_itinerario','LIKE','%'.$query.'%')
            ->whereNull('deleted_at')
            ->orderBy('id_itinerario','desc')
            ->paginate(10);
            return view('interfaz.itinerario.index',["itinerarios"=>$itinerarios,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("interfaz.itinerario.create");
    }
    public function store (ItinerarioFormRequest $request)
    {
        $itinerario=new Itinerario;
        $itinerario->origen=$request->get('origen');
        $itinerario->destino=$request->get('destino');
        $itinerario->fecha_salida=$request->get('fecha_salida');
        $itinerario->fecha_llegada=$request->get('fecha_llegada');
        $itinerario->save();
        return Redirect::to('interfaz/itinerario');

    }
    public function show($id)
    {
        return view("interfaz.itinerario.show",["itinerario"=>Itinerario::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("interfaz.itinerario.edit",["itinerario"=>Itinerario::findOrFail($id)]);
    }
    public function update(ItinerarioFormRequest $request, $id)
    {
        $itinerario=Itinerario::findOrFail($id);
        $itinerario->origen=$request->get('origen');
        $itinerario->destino=$request->get('destino');
        $itinerario->fecha_salida=$request->get('fecha_salida');
        $itinerario->fecha_llegada=$request->get('fecha_llegada');
        $itinerario->update();
        return Redirect::to('interfaz/itinerario');
    }
    public function destroy($id)
    {
        $itinerario=Itinerario::findOrFail($id);
        $itinerario->delete();
        return Redirect::to('interfaz/itinerario');
    }
}
