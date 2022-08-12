
@extends('layouts.app', ['title' => __('Crear Venta')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Crear Venta'),
        'description' => __(''),
        'class' => 'col-lg-12'
    ])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-12 mb-12 mb-xl-12">
                <div class="card card-profile shadow">

						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<h3>Nueva Venta</h3>
								@if (count($errors)>0)
								<div class="alert alert-danger">
									<ul>
									@foreach ($errors->all() as $error)
										<li>{{$error}}</li>
									@endforeach
									</ul>
								</div>
								@endif

								{!!Form::open(array('url'=>'interfaz/venta','method'=>'POST','autocomplete'=>'off'))!!}
								{{Form::token()}}
								<div class="form-group">
									<label for="id_usuario">Usuario(nombre)</label>
									<select name="id_usuario" class="form-control selectpicker" data-live-search="true">
										@foreach ($usuarios as $usuario)
											<option value="{{$usuario->id}}">{{$usuario->name}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label for="id_pago">Pago(monto)</label>
									<select name="id_pago" class="form-control selectpicker" data-live-search="true">
										@foreach ($pagos as $pago)
											<option value="{{$pago->id_pago}}">{{$pago->monto}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label for="id_paquete">Paquete(nombre)</label>
									<select name="id_paquete" class="form-control selectpicker" data-live-search="true">
										@foreach ($paquetes as $paquete)
											<option value="{{$paquete->id_paquete}}">{{$paquete->nombre}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label for="descripcion">Descripción</label>
									<input type="text" name="descripcion" class="form-control" placeholder="Descripción...">
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