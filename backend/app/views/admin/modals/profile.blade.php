<?php
   if( Session::get('user_nivel') == 1 ){
        $eventSave = 'onclick="usuario.saveProfile()"';
        $accion = '/usuario';
   } else{
        $eventSave = '';
        $accion = '/exhibidor/profile';
   }
?>
<div class="md-modal modal-general">
    <div class="md-content">
        <h3></h3>

        <div>

        <iframe src="" style="display: none;" name="ifra"></iframe>

         <form enctype="multipart/form-data" id="formProfile" target="ifra" method="post" action="{{ URL::to($accion) }}">

            <div class="col-md-6">
                
                <div id="alert-profile"></div>
                   
                    <div class="form-group">
                     @if( Session::get('user_foto')!='' )
                        <div id="foto_current" class="file-preview">
                            <div class="file-preview-thumbnails">
                                <div class="file-preview-frame">
                                    <img class="file-preview-image" src="{{URL::to('/')}}/assets/img/usuarios/{{ Session::get('user') }}/{{Session::get('user_foto')}}" alt="{{Session::get('user_responsable')}}" title="{{Session::get('user_responsable')}}" >
                                </div>
                            </div>
                            <!-- <input id="nombre2" name="nombre2" type="text"> -->
                           <div class="clearfix"></div>   
                           <div class="file-preview-status text-center text-success"></div>
                           <div class="kv-fileinput-error file-error-message" style="display: none;"></div>
                        </div>
                        @endif
                        <input id="archivo" name="archivo" type="file">
                    </div>
            </div>
            <div class="col-md-6">
                @if( Session::get('user_nivel') == 1 )

                    <input type="text" id="nombre" name="nombre" value="{{ Session::get('user_responsable') }}" placeholder="Nombre" class="form-control" required>

                    <input type="text" id="ruc" name="ruc" maxlength="11" value="{{ Session::get('user_ruc') }}" placeholder="RUC" class="form-control" required>
                 @else
                    <label class="label label-primary">RUC</label>
                     <input type="text" value="{{ Session::get('user_ruc') }}" class="form-control" disabled>

                    <label class="label label-primary">Responsable</label>
                    <input type="text" id="nombre" value="{{ Session::get('user_responsable') }}" placeholder="Nombre" class="form-control" required>

                    <label class="label label-primary">Teléfono</label>
                    <input type="text" id="usu_telefono" placeholder="Teléfono" class="form-control" required>

                    <label class="label label-primary">E-mail</label>
                    <input type="email" id="usu_mail" placeholder="E-mail" class="form-control" required>

                 @endif
            </div>
        </form>
        </div>

            <div>
                <div class="right"><button id="saveModal" type="button" {{ $eventSave  }} class="btn btn-success">Guardar</button></div>
                <div class="right"><button id="closeModal" class="btn btn-modal btn-default">Cerrar</button></div>
            </div>
    </div>            
</div> 

<div class="md-overlay"></div>
