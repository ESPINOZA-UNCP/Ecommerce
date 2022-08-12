@extends('layouts.app', ['title' => __('Itinerarios')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Itinerarios'),
        'description' => __(''),
        'class' => 'col-lg-7'
    ])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-12 mb-12 mb-xl-12">
                <div class="card card-profile shadow">
					
						<div class="row">
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
								<h3>Listado de Itinerarios <a href="itinerario/create"><button class="btn btn-success">Nuevo</button></a></h3>
								@include('interfaz.itinerario.search')
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-condensed table-hover">
										<thead>
											<th>Id</th>
											<th>Origen</th>
											<th>Destino</th>
											<th>Fecha salida</th>
											<th>Fecha llegada</th>
											<th>Opciones</th>
										</thead>
									@foreach ($itinerarios as $it)
										<tr>
											<td>{{ $it->id_itinerario}}</td>
											<td>{{ $it->origen}}</td>
											<td>{{ $it->destino}}</td>
											<td>{{ $it->fecha_salida}}</td>
											<td>{{ $it->fecha_llegada}}</td>
											<td>
												<a href="{{URL::action('App\Http\Controllers\ItinerarioController@edit',$it->id_itinerario)}}"><button class="btn btn-info">Editar</button></a>
												<a href="" data-target="#modal-delete-{{$it->id_itinerario}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
											</td>
										</tr>
										@include('interfaz.itinerario.modal')
										@endforeach
									</table>
									{{$itinerarios->render()}}
								</div>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
@endsection


