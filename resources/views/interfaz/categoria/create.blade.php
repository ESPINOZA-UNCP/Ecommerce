
@extends('layouts.app', ['title' => __('Crear Categoria')])



@section('content')
    @include('users.partials.header', [
        'title' => __('Crear Categoria'),
        'description' => __(''),
        'class' => 'col-lg-12'
    ])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-12 mb-12 mb-xl-12">
                <div class="card card-profile shadow">

						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<h3>Nueva Categoria</h3>
								@if (count($errors)>0)
								<div class="alert alert-danger">
									<ul>
									@foreach ($errors->all() as $error)
										<li>{{$error}}</li>
									@endforeach
									</ul>
								</div>
								@endif

								{!!Form::open(array('url'=>'interfaz/categoria','method'=>'POST','autocomplete'=>'off'))!!}
								{{Form::token()}}
								<div class="form-group">
									<label for="nombre">Nombre</label>
									<input type="text" name="nombre" class="form-control" placeholder="Nombre...">
								</div>
								<div class="form-group">
									<label for="descripcion">Descripción</label>
									<input type="text" name="descripcion" class="form-control" placeholder="Descripción...">
								</div>
								<div class="form-group">
									<label for="precio">Precio</label>
									<input type="text" name="precio" class="form-control" placeholder="Precio...">
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

								{!!Form::close()!!}		
								
							</div>
						</div>

				</div>
                </div>
            </div>
    
        </div>
        
    </div>
@endsection