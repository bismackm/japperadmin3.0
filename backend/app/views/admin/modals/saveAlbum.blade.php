<div class="md-modal modal-general">
    <div class="md-content">
        <h3></h3>

        <div>

        <iframe src="" style="display: none;" name="ifra"></iframe>

         <form enctype="multipart/form-data" id="formAlbum" target="ifra" method="post" action="{{ URL::to('/album') }}">

            <div class="col-md-6">
                
                <div id="alert-profile"></div>
                   
                    <div class="form-group">
                        <div id="foto_current" class="file-preview">
                            <div class="file-preview-thumbnails">
                                <div class="file-preview-frame">
                                    <img class="file-preview-image" src="{{URL::to('/')}}/assets/img/usuarios/1/user.png" >
                                </div>
                            </div>
                            <!-- <input id="nombre2" name="nombre2" type="text"> -->
                           <div class="clearfix"></div>   
                           <div class="file-preview-status text-center text-success"></div>
                           <div class="kv-fileinput-error file-error-message" style="display: none;"></div>
                        </div>
                        <input id="archivo" name="archivo" type="file">
                    </div>
            </div>
            <div class="col-md-6">

                    <label class="label label-primary">Nombre</label>
                    <input type="text" id="alb_nombre" name="alb_nombre" placeholder="Nombre" class="form-control" required>

                    <label class="label label-primary">Año</label>
                    <input type="text" id="alb_anio" name="alb_anio" placeholder="Año" class="form-control" required>

                <input type="hidden" id="alb_id" name="alb_id" >

            </div>
        </form>
        </div>

            <div>
                <div class="right"><button id="saveModal" type="button" onclick="album.save()" class="btn btn-success">Guardar</button></div>
                <div class="right"><button id="closeModal" class="btn btn-modal btn-default">Cerrar</button></div>
            </div>
    </div>            
</div> 

<div class="md-overlay"></div>
