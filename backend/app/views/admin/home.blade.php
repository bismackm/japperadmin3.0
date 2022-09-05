@extends('layouts.baseadmin')

@section('content')
       
    <div class="col-md-12">
		<h3><i class="fa fa-bookmark"></i> <strong>Compradores </strong></h3>
	</div>

	<div class="right">
		<button type="button" style="margin-top: -60px; margin-right: 15px;" class="btn btn-success btn-effect" onclick="album.willSave()">
			<i class="fa fa-plus"></i> Nuevo
		</button>
	</div>

	<div class="row col-md-12 left" style="margin-left: 0">

        <div class="panel panel-default margin-top">

        <div class="panel-body">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 table-responsive table-red filter-right">
                    <table class="table table-striped table-hover table-dynamic">
                        <thead>
                            <tr>
                                <th>Fecha de Registro</th>
                                <th>Nombre</th>
                                <th>DNI</th>
                                <th>Teléfono</th>
                                <th>Tipo de Entrada</th>
                                <th>Forma de Pago</th>
                                <th>QR - Correlativo</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $buyers as $buyer )
                                <tr alb_id="{{ $buyer->id }}">
                                    <td>{{ $buyer->created_at }}</td>
                                    <td>{{ $buyer->name }}</td>
                                    <td>{{ $buyer->dni}}</td>
                                    <td>{{ $buyer->phone }}</td>
                                    <td>{{ $type_entries[$buyer->type_entry] }}</td>
                                    <td>{{ $pay_modes[$buyer->pay_mode] }}</td>
                                    <td>{{ $buyer->qr_code  }}</td>
                                    <td>
                                        <a class="edit btn btn-dark btn-effect" title="Editar" href="javascript:;" onclick="album.willUpdate( this )">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
{{--                                        <a class="edit btn btn-dark btn-effect" title="Eliminar" href="javascript:;" onclick="album.willRemove( this )">--}}
{{--                                            <i class="fa fa-trash-o"></i>--}}
{{--                                        </a>--}}
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

                </div>

	</div>

@stop

@section('code_footer')

	<script type="text/javascript">
		$('#li-albumes').addClass('current active');

	</script>
@stop