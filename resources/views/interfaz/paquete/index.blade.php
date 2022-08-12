@extends('layouts.app', ['title' => __('Paquetes')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Paquetes'),
        'description' => __(''),
        'class' => 'col-lg-7'
    ])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-12 mb-12 mb-xl-12">
                <div class="card card-profile shadow">
   
                    

						<div class="row">
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
								<h3>Listado de Paquetes <a href="paquete/create"><button class="btn btn-success">Nuevo</button></a></h3>
								@include('interfaz.paquete.search')
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-condensed table-hover">
										<thead>
											<th>Id</th>
											<th>Nombre</th>
											<th>Categoria(nombre)</th>
											<th>Opciones</th>
										</thead>
									@foreach ($paquetes as $pq)
										<tr>
											<td>{{ $pq->id_paquete}}</td>
											<td>{{ $pq->pq_nombre}}</td>
											<td>{{ $pq->c_nombre}}</td>
											<td>
												<a href="{{URL::action('App\Http\Controllers\PaqueteController@edit',$pq->id_paquete)}}"><button class="btn btn-info">Editar</button></a>
												<a href="" data-target="#modal-delete-{{$pq->id_paquete}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
											</td>
										</tr>
										@include('interfaz.paquete.modal')
										@endforeach
									</table>
									{{$paquetes->render()}}
								</div>
								
								
							</div>
						</div>

        
                       
                    </div>
                </div>
            </div>
    
        </div>
        
    </div>
	
@endsection


