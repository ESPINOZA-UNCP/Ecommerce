@extends('layouts.app', ['title' => __('Categorias')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Categorias'),
        'description' => __(''),
        'class' => 'col-lg-7'
    ])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-12 mb-12 mb-xl-12">
                <div class="card card-profile shadow">
   
                    

						<div class="row">
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
								<h3>Listado de Categorias <a href="categoria/create"><button class="btn btn-success">Nuevo</button></a></h3>
								@include('interfaz.categoria.search')
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
											<th>Precio</th>
											<th>Itinerario(origen)</th>
											<th>Lugar Turistico(nombre)</th>
											<th>Opciones</th>
										</thead>
									@foreach ($categorias as $cat)
										<tr>
											<td>{{ $cat->id_categoria}}</td>
											<td>{{ $cat->c_nombre}}</td>
											<td>{{ $cat->c_descripcion}}</td>
											<td>{{ $cat->precio}}</td>
											<td>{{ $cat->origen}}</td>
											<td>{{ $cat->lt_nombre}}</td>
											<td>
												<a href="{{URL::action('App\Http\Controllers\CategoriaController@edit',$cat->id_categoria)}}"><button class="btn btn-info">Editar</button></a>
												<a href="" data-target="#modal-delete-{{$cat->id_categoria}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
											</td>
										</tr>
										@include('interfaz.categoria.modal')
										@endforeach
									</table>
									{{$categorias->render()}}
								</div>
								
								
							</div>
						</div>

        
                       
                    </div>
                </div>
            </div>
    
        </div>
        
    </div>
	
@endsection


