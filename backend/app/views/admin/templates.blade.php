
<?php if ( Input::get("id")  == "clonar_TEST"){ ?>

        <div class="form-group">
            <div class="col-lg-12">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-dot-circle-o fa-fw text-primary fa-fw"></i>
                    </span>
                        <input type="text" placeholder="Escriba una opción" name="seop_opcion@{{count}}" class="form-control tipo_alt">
                    <span class="input-group-btn">
                        <button class="btn btn-default" onclick="aduanas.removeOption(this);" type="button">
                            <i class="fa fa-times"></i> 
                        </button>
                    </span>
                </div>
            </div>
        </div>

<?php } ?>


<?php if( $_GET["id"]  == "confirm" ){ ?>

    <div class="md-modal " id="modalConfirm">
        <div class="md-content">
            <h3></h3>

            <div>
                <div class="col-md-12">
                    <p>Estás seguro ?</p>
                </div>
            </div>

                <div>
                    <div class="right"><button id="saveModal" type="button" class="btn btn-danger">Si</button></div>
                    <div class="right"><button id="closeModal" class="btn btn-modal btn-default">No</button></div>
                </div>
        </div>

    <input type="hidden" name="var" id="var">

    </div>
    <div class="md-overlay"></div>

<?php } ?>
