@extends('layouts.app', ['title' => __('Editar Lugar Turistico')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Editar Lugar Turistico'),
        'description' => __(''),
        'class' => 'col-lg-12'
    ])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-12 mb-12 mb-xl-12">
                <div class="card card-profile shadow">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<h3>Editar Lugar Turistico: {{ $lugarturistico->nombre}}</h3>
							@if (count($errors)>0)
							<div class="alert alert-danger">
								<ul>
								@foreach ($errors->all() as $error)
									<li>{{$error}}</li>
								@endforeach
								</ul>
							</div>
							@endif

					<form action="/interfaz/lugarturistico/{{$lugarturistico->id_lugar}}" method="POST" enctype="multipart/form-data">
					@csrf    
					@method('PUT')
							<div class="form-group">
								<label for="nombre">Nombre</label>
								<input type="text" name="nombre" class="form-control" value="{{$lugarturistico->nombre}}" placeholder="Nombre...">
							</div>
							<div class="form-group">
								<label for="descripcion">Descripción</label>
								<input type="text" name="descripcion" class="form-control" value="{{$lugarturistico->descripcion}}" placeholder="Descripción...">
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