<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 7 PDF Example</title>
    <!-- <link href="{{ asset('css/argon.css') }}" rel="stylesheet" type="text/css" /> -->
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-3">Laravel HTML to PDF Example</h2>
        <!-- <div class="d-flex justify-content-end mb-4">
            <a class="btn btn-primary" href="{{ URL::to('createPDF/venta') }}">Export to PDF</a>
        </div> -->
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-danger">
                    <th scope="col">col1</th>
                    <th scope="col">col2</th>
                    <th scope="col">col3</th>
                    <th scope="col">col4</th>
                    <th scope="col">col5</th>
                </tr>
            </thead>
            <tbody>
                @foreach($venta as $d)
                <tr>
                    <td>{{ $d->id_venta}}</td>
                    <td>{{ $d->id_usuario}}</td>
                    <td>{{ $d->id_pago}}</td>
                    <td>{{ $d->id_paquete}}</td>
                    <td>{{ $d->descripcion}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- <script src="{{ asset('js/app.js') }}" type="text/js"></script> -->
</body>
</html>