<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Pago;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PagoFormRequest;
use DB;


class PagoController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $pagos=DB::table('pago')->where('id_pago','LIKE','%'.$query.'%')
            ->whereNull('deleted_at')
            ->orderBy('id_pago','desc')
            ->paginate(10);
            return view('interfaz.pago.index',["pagos"=>$pagos,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("interfaz.pago.create");
    }
    public function store (PagoFormRequest $request)
    {
        $pago=new Pago;
        $pago->monto=$request->get('monto');
        $pago->tipo_pago=$request->get('tipo_pago');
        $pago->cantidad=$request->get('cantidad');
        $pago->save();
        return Redirect::to('interfaz/pago');

    }
    public function show($id)
    {
        return view("interfaz.pago.show",["pago"=>Pago::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("interfaz.pago.edit",["pago"=>Pago::findOrFail($id)]);
    }
    public function update(PagoFormRequest $request, $id)
    {
        $pago=Pago::findOrFail($id);
        $pago->monto=$request->get('monto');
        $pago->tipo_pago=$request->get('tipo_pago');
        $pago->cantidad=$request->get('cantidad');
        $pago->update();
        return Redirect::to('interfaz/pago');
    }
    public function destroy($id)
    {
        $pago=Pago::findOrFail($id);
        $pago->delete();
        return Redirect::to('interfaz/pago');
    }
}
