@extends('layouts.app', ['title' => __('Editar Pago')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Editar Pago'),
        'description' => __(''),
        'class' => 'col-lg-12'
    ])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-12 mb-12 mb-xl-12">
                <div class="card card-profile shadow">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<h3>Editar Pago(id): {{ $pago->id_pago}}</h3>
							@if (count($errors)>0)
								<div class="alert alert-danger">
									<ul>
									@foreach ($errors->all() as $error)
										<li>{{$error}}</li>
									@endforeach
									</ul>
								</div>
							@endif

							<form action="/interfaz/pago/{{$pago->id_pago}}" method="POST" enctype="multipart/form-data">
								@csrf    
								@method('PUT')
								<div class="form-group">
									<label for="monto">Monto</label>
									<input type="text" name="monto" class="form-control" value="{{$pago->monto}}" placeholder="Monto...">
								</div>
								<div class="form-group">
									<label for="tipo_pago">Tipo pago</label>
									<input type="text" name="tipo_pago" class="form-control" value="{{$pago->tipo_pago}}" placeholder="Tipo pago...">
								</div>
								<div class="form-group">
									<label for="cantidad">Cantidad</label>
									<input type="text" name="cantidad" class="form-control" value="{{$pago->cantidad}}" placeholder="Cantidad...">
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