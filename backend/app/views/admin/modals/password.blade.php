<div class="md-modal modal-general">
    <div class="md-content width-300">
        <h3></h3>

        <div>
         <form id="form_password">
                   
            <div class="col-md-12"><br>
                    <input class="form-control input-sm" id="last_password" type="password" placeholder="Contraseña Actual">
                    <input class="form-control input-sm" id="new_password" type="password" placeholder="Contraseña Nueva">
                    <input class="form-control input-sm" id="renew_password" type="password" placeholder="Repita Contraseña Nueva">
            </div>
        </form>
        </div>

            <div>
                <div class="right"><button id="saveModal" onclick="usuario.savePassword();" type="button" class="btn btn-success">Guardar</button></div>
                <div class="right"><button id="closeModal" class="btn btn-modal btn-default">Cerrar</button></div>
            </div>
    </div>            
</div> 

<div class="md-overlay"></div>
