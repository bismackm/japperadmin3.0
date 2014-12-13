<div class="md-modal" id="modal-perfil">
    <div class="md-content">
        <h3></h3>

        <div>
            <div class="col-md-6">
                <form enctype="multipart/form-data">
                   
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

                </form>
            </div>
            <div class="col-md-4">
                H
            </div>
        </div>

            <div>
                <div class="right"><button class="btn btn-modal btn-default">Cerrar</button></div>
                <div class="right"><button type="button" class="btn btn-default">Guardar</button></div>
            </div>
    </div>            
</div> 

<div class="md-overlay"></div>
