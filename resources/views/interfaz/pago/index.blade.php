@extends('layouts.app', ['title' => __('Pagos')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Pagos'),
        'description' => __(''),
        'class' => 'col-lg-7'
    ])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-12 mb-12 mb-xl-12">
                <div class="card card-profile shadow">
					
						<div class="row">
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
								<h3>Listado de Pagos <a href="pago/create"><button class="btn btn-success">Nuevo</button></a></h3>
								@include('interfaz.pago.search')
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-condensed table-hover">
										<thead>
											<th>Id</th>
											<th>Monto</th>
											<th>Tipo pago</th>
											<th>Cantidad</th>
											<th>Opciones</th>
										</thead>
									@foreach ($pagos as $pg)
										<tr>
											<td>{{ $pg->id_pago}}</td>
											<td>{{ $pg->monto}}</td>
											<td>{{ $pg->tipo_pago}}</td>
											<td>{{ $pg->cantidad}}</td>
											<td>
												<a href="{{URL::action('App\Http\Controllers\PagoController@edit',$pg->id_pago)}}"><button class="btn btn-info">Editar</button></a>
												<a href="" data-target="#modal-delete-{{$pg->id_pago}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
											</td>
										</tr>
										@include('interfaz.pago.modal')
										@endforeach
									</table>
									{{$pagos->render()}}
								</div>
								
								
							</div>
						</div>

        
                       
                    </div>
                </div>
            </div>
    
        </div>
        
    </div>
	
@endsection


