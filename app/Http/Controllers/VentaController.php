<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Venta;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\VentaFormRequest;
use DB;
use PDF;


class VentaController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $ventas=DB::table('venta as vn')->where('vn.id_venta','LIKE','%'.$query.'%')
            ->whereNull('vn.deleted_at')
            ->leftJoin('users as us', 'vn.id_usuario', '=', 'us.id')
            ->leftJoin('pago as pg', 'vn.id_pago', '=', 'pg.id_pago')
            ->leftJoin('paquete as pq', 'vn.id_paquete', '=', 'pq.id_paquete')
            ->select(
                'vn.*',
                'us.*',
                'pg.*',
                'pq.*',
                'us.name as us_nombre',
                'pq.nombre as pq_nombre',
            )
            ->orderBy('vn.id_venta','desc')
            ->paginate(10);
            return view('interfaz.venta.index',["ventas"=>$ventas,"searchText"=>$query]);
        }
    }
    public function create()
    {
        $usuarios=DB::table('users')->get();
        $pagos=DB::table('pago')->get();
        $paquetes=DB::table('paquete')->get();
        return view("interfaz.venta.create",["usuarios"=>$usuarios,"pagos"=>$pagos,"paquetes"=>$paquetes]);
    }
    public function store (VentaFormRequest $request)
    {
        $venta=new Venta;
        $venta->id_usuario=$request->get('id_usuario');
        $venta->id_pago=$request->get('id_pago');
        $venta->id_paquete=$request->get('id_paquete');
        $venta->descripcion=$request->get('descripcion');
        $venta->save();
        return Redirect::to('interfaz/venta');

    }
    public function show($id)
    {
        return view("interfaz.venta.show",["venta"=>Venta::findOrFail($id)]);
    }
    public function edit($id)
    {
        $usuarios=DB::table('users')->get();
        $pagos=DB::table('pago')->get();
        $paquetes=DB::table('paquete')->get();
        return view("interfaz.venta.edit",["venta"=>Venta::findOrFail($id),"usuarios"=>$usuarios,"pagos"=>$pagos,"paquetes"=>$paquetes]);
    }
    public function update(VentaFormRequest $request, $id)
    {
        $venta=Venta::findOrFail($id);
        $venta->id_usuario=$request->get('id_usuario');
        $venta->id_pago=$request->get('id_pago');
        $venta->id_paquete=$request->get('id_paquete');
        $venta->descripcion=$request->get('descripcion');
        $venta->update();
        return Redirect::to('interfaz/venta');
    }
    public function destroy($id)
    {
        $venta=Venta::findOrFail($id);
        $venta->delete();
        return Redirect::to('interfaz/venta');
    }
    public function showPDF(){
        $venta=Venta::All();
        return view('PDFTable',compact('venta'));
    }
    public function createPDF(){
        $data=Venta::All();
        view()->share('venta',$data);
        $pdf = PDF::loadView('PDFTable', compact('data'));
        return $pdf->download('filename.pdf');
    }
}
