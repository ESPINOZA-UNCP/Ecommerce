@extends('layouts.app', ['title' => __('Editar itinerario')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Editar itinerario'),
        'description' => __(''),
        'class' => 'col-lg-12'
    ])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-12 mb-12 mb-xl-12">
                <div class="card card-profile shadow">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<h3>Editar itinerario: {{ $itinerario->id_itinerario}}</h3>
							@if (count($errors)>0)
							<div class="alert alert-danger">
								<ul>
								@foreach ($errors->all() as $error)
									<li>{{$error}}</li>
								@endforeach
								</ul>
							</div>
							@endif
							<form action="/interfaz/itinerario/{{$itinerario->id_itinerario}}" method="POST" enctype="multipart/form-data">
							@csrf    
							@method('PUT')
								<div class="form-group">
									<label for="origen">Origen</label>
									<input type="text" name="origen" class="form-control" value="{{$itinerario->origen}}" placeholder="Origen...">
								</div>
								<div class="form-group">
									<label for="destino">Destino</label>
									<input type="text" name="destino" class="form-control" value="{{$itinerario->destino}}" placeholder="Destino...">
								</div>
								<div class="form-group">
									<label for="fecha_salida">Fecha salida</label>
									<input type="text" id="datepicker1" name="fecha_salida" class="form-control" placeholder="dd/mm/yyyy">
								</div>
								<div class="form-group">
									<label for="fecha_llegada">Fecha llegada</label>
									<input type="text" id="datepicker2" name="fecha_llegada" class="form-control" placeholder="dd/mm/yyyy">
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
	@push('scripts')
		<script> 
			$(function() {
				$( "#datepicker1" ).datepicker({ dateFormat: 'dd/mm/yy' });
				$( "#datepicker2" ).datepicker({ dateFormat: 'dd/mm/yy' });
			} );
		</script>
	@endpush

@endsection