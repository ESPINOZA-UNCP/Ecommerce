
@extends('layouts.app', ['title' => __('Crear Pago')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Crear Pago'),
        'description' => __(''),
        'class' => 'col-lg-12'
    ])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-12 mb-12 mb-xl-12">
                <div class="card card-profile shadow">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<h3>Nuevo Pago</h3>

								@if (count($errors)>0)
								<div class="alert alert-danger">
									<ul>
									@foreach ($errors->all() as $error)
										<li>{{$error}}</li>
									@endforeach
									</ul>
								</div>
								@endif

								{!!Form::open(array('url'=>'interfaz/pago','method'=>'POST','autocomplete'=>'off'))!!}
								{{Form::token()}}
								<div class="form-group">
									<label for="monto">Monto</label>
									<input type="text" name="monto" class="form-control" placeholder="Monto...">
								</div>
								<div class="form-group">
									<label for="tipo_pago">Tipo pago</label>
									<input type="text" name="tipo_pago" class="form-control" placeholder="Tipo pago...">
								</div>
								<div class="form-group">
									<label for="cantidad">Cantidad</label>
									<input type="text" name="cantidad" class="form-control" placeholder="Cantidad...">
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