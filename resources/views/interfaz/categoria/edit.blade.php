@extends('layouts.app', ['title' => __('Editar Categoria')])



@section('content')
    @include('users.partials.header', [
        'title' => __('Editar Categoria'),
        'description' => __(''),
        'class' => 'col-lg-12'
    ])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-12 mb-12 mb-xl-12">
                <div class="card card-profile shadow">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<h3>Editar Categoria: {{ $categoria->nombre}}</h3>
							@if (count($errors)>0)
							<div class="alert alert-danger">
								<ul>
								@foreach ($errors->all() as $error)
									<li>{{$error}}</li>
								@endforeach
								</ul>
							</div>
							@endif

					<form action="/interfaz/categoria/{{$categoria->id_categoria}}" method="POST" enctype="multipart/form-data">
					@csrf    
					@method('PUT')
							<div class="form-group">
								<label for="nombre">Nombre</label>
								<input type="text" name="nombre" class="form-control" value="{{$categoria->nombre}}" placeholder="Nombre...">
							</div>
							<div class="form-group">
								<label for="descripcion">Descripción</label>
								<input type="text" name="descripcion" class="form-control" value="{{$categoria->descripcion}}" placeholder="Descripción...">
							</div>
							<div class="form-group">
								<label for="precio">Precio</label>
								<input type="text" name="precio" class="form-control" value="{{$categoria->precio}}" placeholder="Precio...">
							</div>
							<div class="form-group">
								<label for="id_itinerario">Itinerario(origen)</label>
								<select name="id_itinerario" class="form-control selectpicker" data-live-search="true">
									@foreach ($itinerarios as $itinerario)
										<option value="{{$itinerario->id_itinerario}}">{{$itinerario->origen}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="id_lugar">Lugar Turistico(nombre)</label>
								<select name="id_lugar" class="form-control selectpicker" data-live-search="true">
									@foreach ($lugarturisticos as $lugarturistico)
										<option value="{{$lugarturistico->id_lugar}}">{{$lugarturistico->nombre}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<button class="btn btn-primary" type="submit">Guardar</button>
								<button class="btn btn-danger" type="reset">Cancelar</button>
							</div>

					</form>	
							
						</div>
					</div>

					</div>
                </div>
            </div>
    
        </div>
        
    </div>
@endsection