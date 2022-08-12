
@extends('layouts.app', ['title' => __('Crear paquete')])



@section('content')
    @include('users.partials.header', [
        'title' => __('Crear paquete'),
        'description' => __(''),
        'class' => 'col-lg-12'
    ])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-12 mb-12 mb-xl-12">
                <div class="card card-profile shadow">

						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<h3>Nuevo paquete</h3>
								@if (count($errors)>0)
								<div class="alert alert-danger">
									<ul>
									@foreach ($errors->all() as $error)
										<li>{{$error}}</li>
									@endforeach
									</ul>
								</div>
								@endif

								{!!Form::open(array('url'=>'interfaz/paquete','method'=>'POST','autocomplete'=>'off'))!!}
								{{Form::token()}}
								<div class="form-group">
									<label for="nombre">Nombre</label>
									<input type="text" name="nombre" class="form-control" placeholder="Nombre...">
								</div>
								<div class="form-group">
									<label for="id_categoria">Categoria(nombre)</label>
									<select name="id_categoria" class="form-control selectpicker" data-live-search="true">
										@foreach ($categorias as $categoria)
											<option value="{{$categoria->id_categoria}}">{{$categoria->nombre}}</option>
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