@extends('layouts.app', ['title' => __('Ventas')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Ventas'),
        'description' => __(''),
        'class' => 'col-lg-7'
    ])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-12 mb-12 mb-xl-12">
                <div class="card card-profile shadow">
					
						<div class="row">
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
								<h3>Listado de Ventas <a href="venta/create"><button class="btn btn-success">Nuevo</button></a></h3>
								@include('interfaz.venta.search')
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-condensed table-hover">
										<thead>
											<th>Id</th>
											<th>Usuario(nombre)</th>
											<th>Pago(monto)</th>
											<th>Paquete(nombre)</th>
											<th>Descripción</th>
											<th>Opciones</th>
										</thead>
									@foreach ($ventas as $vn)
										<tr>
											<td>{{ $vn->id_venta}}</td>
											<td>{{ $vn->us_nombre}}</td>
											<td>{{ $vn->monto}}</td>
											<td>{{ $vn->pq_nombre}}</td>
											<td>{{ $vn->descripcion}}</td>
											<td>
												<a href="{{URL::action('App\Http\Controllers\VentaController@edit',$vn->id_venta)}}"><button class="btn btn-info">Editar</button></a>
												<a href="" data-target="#modal-delete-{{$vn->id_venta}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
											</td>
										</tr>
										@include('interfaz.venta.modal')
										@endforeach
									</table>
									{{$ventas->render()}}
								</div>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
@endsection


