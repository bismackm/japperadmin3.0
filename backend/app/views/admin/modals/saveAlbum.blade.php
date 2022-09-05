<div class="md-modal modal-general">
    <div class="md-content">
        <h3></h3>

        <div>

         <form id="formAlbum">
            <div class="col-md-12">
                    <label class="label label-primary">Nombre</label>
                    <input type="text" id="name" name="name" maxlength="300" placeholder="Nombre" class="form-control" required>

                    <label class="label label-primary">DNI</label>
                    <input type="text" id="dni" name="dni" maxlength="8" placeholder="DNI" class="form-control" required>

                    <label class="label label-primary">Celular</label>
                    <input type="text" id="phone" name="phone" maxlength="300" placeholder="Celular" class="form-control" required>

                    <label class="label label-primary">Tipo de Entrada</label>
                    <select id="type_entry" name="type_entry" class="form-control" onchange="album.change_type_entry()">
                        <option value="1" selected>General (S/.50)</option>
                        <option value="2">Preferencial (S/.70)</option>
                        <option value="3">VIP (S/.100)</option>
                        <option value="4">Platino (S/.120)</option>
                    </select>

                    <label class="label label-primary" id="number_entries_label">N° de entradas</label>
                    <input type="number" id="number_entries" name="number_entries" step="1" min="0" max="99" value="1" class="form-control" required>

                    <label class="label label-primary">Forma de Pago</label>
                    <div class="col-12">
                        <div class="col-4" style="float: left;">
                            <input type="radio" name="pay_mode" value="1" class="form-control" style="width: auto; margin: 15px;" checked="checked">
                            <label class="label label-primary">Yape</label>
                        </div>
                        <div class="col-4" style="float: left;">
                            <input type="radio" name="pay_mode" value="2" class="form-control" style="width: auto; margin: 15px;">
                            <label class="label label-primary">Plin</label>
                        </div>
                        <div class="col-4" style="float: left;">
                            <input type="radio" name="pay_mode" value="3" class="form-control" style="width: auto; margin: 15px;">
                            <label class="label label-primary">Efectivo</label>
                        </div>
                    </div>

                    <div class="col-4" style="float: right;">
                            <label class="label label-primary">QR - Correlativo</label>
                            <input type="text" id="qr_code" name="qr_code" class="form-control display-none" disabled>
                            <input type="text" id="qr_code_1" name="qr_code_1" class="form-control display-none" disabled>
                            <input type="text" id="qr_code_2" name="qr_code_2" class="form-control display-none" disabled>
                            <input type="text" id="qr_code_3" name="qr_code_3" class="form-control display-none" disabled>
                            <input type="text" id="qr_code_4" name="qr_code_4" class="form-control display-none" disabled>
                    </div>

                <input type="hidden" id="id" name="id" >

            </div>
        </form>
        </div>

            <div>
                <div class="right"><button id="saveModal" type="button" onclick="album.save()" class="btn_ btn btn-success">Guardar</button></div>
                <div class="right"><button id="closeModal" class="btn btn-modal btn-default">Cerrar</button></div>
            </div>
    </div>            
</div> 

<div class="md-overlay"></div>
