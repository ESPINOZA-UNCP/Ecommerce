@extends('layouts.app', ['title' => __('Lugares Turisticos')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Lugares Turisticos'),
        'description' => __(''),
        'class' => 'col-lg-7'
    ])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-12 mb-12 mb-xl-12">
                <div class="card card-profile shadow">
					
						<div class="row">
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
								<h3>Listado de Lugares Turisticos <a href="lugarturistico/create"><button class="btn btn-success">Nuevo</button></a></h3>
								@include('interfaz.lugarturistico.search')
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-condensed table-hover">
										<thead>
											<th>Id</th>
											<th>Nombre</th>
											<th>Descripción</th>
											<th>Opciones</th>
										</thead>
									@foreach ($lugarturisticos as $lt)
										<tr>
											<td>{{ $lt->id_lugar}}</td>
											<td>{{ $lt->nombre}}</td>
											<td>{{ $lt->descripcion}}</td>
											<td>
												<a href="{{URL::action('App\Http\Controllers\LugarTuristicoController@edit',$lt->id_lugar)}}"><button class="btn btn-info">Editar</button></a>
												<a href="" data-target="#modal-delete-{{$lt->id_lugar}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
											</td>
										</tr>
										@include('interfaz.lugarturistico.modal')
										@endforeach
									</table>
									{{$lugarturisticos->render()}}
								</div>
								
								
							</div>
						</div>

        
                       
                    </div>
                </div>
            </div>
    
        </div>
        
    </div>
	
@endsection


