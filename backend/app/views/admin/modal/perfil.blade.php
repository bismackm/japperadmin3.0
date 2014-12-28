<div class="md-modal" id="modal-perfil">
    <div class="md-content">
        <h3></h3>

        <div>
         <form enctype="multipart/form-data" id="form_perfil">
            <div class="col-md-6">
               
                   
                    <div class="form-group">
                     @if( Session::get('user_foto')!='' )
                        <div id="foto_current" class="file-preview">
                            <div class="file-preview-thumbnails">
                                <div class="file-preview-frame">
                                    <img class="file-preview-image" src="{{URL::to('/')}}/assets/img/admin/{{ Session::get('user') }}/{{Session::get('user_foto')}}" alt="{{Session::get('user_nombre')}}" title="{{Session::get('user_nombre')}}" >
                                </div>
                            </div>
                           <div class="clearfix"></div>   
                           <div class="file-preview-status text-center text-success"></div>
                           <div class="kv-fileinput-error file-error-message" style="display: none;"></div>
                        </div>
                        @endif
                        <input id="file" type="file" multiple=true>
                    </div>
            </div>
            <div class="col-md-6"><br><br>
                <div id="nombre" contenteditable="true" class="cke-editor" value="Erick">
                    <h4>{{ Session::get('user_nombre') }}</h4>
                </div>
                <br>
                <div id="mail" contenteditable="true" class="cke-editor">
                    <h4>{{ Session::get('user_mail') }}</h4>
                </div>
            </div>
        </form>
        </div>

            <div>
                <div class="right"><button class="btn btn-modal btn-default">Cerrar</button></div>
                <div class="right"><button type="button" onclick="usuario.save();" class="btn btn-default">Guardar</button></div>
            </div>
    </div>            
</div> 

<div class="md-overlay"></div>
