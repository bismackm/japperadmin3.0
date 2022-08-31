@extends('layouts.baseadmin')

@section('content')
       
    <div class="col-md-12">
		<h3><i class="fa fa-bookmark"></i> <strong>Álbumes </strong></h3>
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
                                <th>Nombre</th>
                                <th>Año</th>
                                <th>Imagen</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
{{--                            @foreach( $albumes as $album )--}}
{{--                                <tr alb_id="{{ $album->alb_id }}">--}}
{{--                                    <td>{{ $album->alb_nombre }}</td>--}}
{{--                                    <td>{{ $album->alb_anio}}</td>--}}
{{--                                    <td>{{ $album->alb_foto }}</td>--}}
{{--                                    <td>--}}
{{--                                        <a class="edit btn btn-dark btn-effect" title="Editar" href="javascript:;" onclick="album.willUpdate( this )">--}}
{{--                                            <i class="fa fa-pencil-square-o"></i>--}}
{{--                                        </a>--}}
{{--                                        <a class="edit btn btn-dark btn-effect" title="Eliminar" href="javascript:;" onclick="album.willRemove( this )">--}}
{{--                                            <i class="fa fa-trash-o"></i>--}}
{{--                                        </a>--}}
{{--                                        <a class="edit btn btn-dark btn-effect" title="Revisar canciones" href="{{ URL::to('/album/'.$album->alb_id.'/songs')  }}" >--}}
{{--                                            <i class="fa fa-music"></i>--}}
{{--                                        </a>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}


                            <tr>
                                <td>Hola</td>
                                <td>12</td>
                                <td>3</td>
                                <td>
                                    <a class="edit btn btn-dark btn-effect" title="Editar" href="javascript:;" onclick="album.willUpdate( this )">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                    <a class="edit btn btn-dark btn-effect" title="Eliminar" href="javascript:;" onclick="album.willRemove( this )">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                    <a class="edit btn btn-dark btn-effect" title="Revisar canciones" href="#" >
                                        <i class="fa fa-music"></i>
                                    </a>
                                </td>
                            </tr>

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