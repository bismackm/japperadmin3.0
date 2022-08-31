<?php
class AlbumController extends BaseController{

    public function index(){
        return Redirect::to('/admin');
    }

    public function save(){

        $sesionID = Session::get('user');
        if( !Request::ajax() || !isset( $sesionID ) ){
            App::abort(404);
        }
        return View::make('admin.modals.saveAlbum');

    }

    public function store(){

        $sesionID = Session::get('user');
        if( !isset( $sesionID ) ){
            App::abort(404);
        }

        try {

            $alb_id = Input::get('alb_id');

            if( $alb_id != '' ){
                $album = Album::find( $alb_id );
            } else {
                $album = new Album;
            }

            $album->alb_nombre = Input::get('alb_nombre');
            $album->alb_anio = Input::get('alb_anio');
            $album->alb_estado = 1;

                $file = Input::file('archivo');
                $file_nom = Input::get('archivo');
                $flag = Input::get('flag');

                $json = array('message' => 'Guardado Correctamente', 'type' => 'success');

                //Si no hay nada en file
                if ($flag == 'x') {
                    $album->save();

                    return Response::json($json);
                } else {

                    $destinationPath = 'assets/img/album/' . $file_nom;
                    $filename = $file->getClientOriginalName();
                    $uploadSuccess = Input::file('archivo')->move($destinationPath, $filename);

                    if ($uploadSuccess) {
                        $album->alb_foto = $filename;
                        $album->save();
                    }

                    return '<script type="text/javascript">window.parent.album.imprimir(' . json_encode($json) . ')</script>';
                }

        } catch( Exception  $exc){

            $json = array('message'=>$exc->getMessage() , 'type'=>'danger');
            return '<script type="text/javascript">window.parent.general.print('.json_encode($json).')</script>';

        }

    }

    public function remove(){
        $sesionID = Session::get('user');
        if( !Request::ajax() || !isset( $sesionID ) ){
            App::abort(404);
        }
        try{

            $album = Album::find( Input::get('alb_id') );
            $album->alb_estado = 0;
            $album->save();
            return Response::json( array('message'=>'Album eliminado' , 'type'=>'success') );
        } catch( Exception  $exc){
            return Response::json( array('message'=>$exc->getMessage() , 'type'=>'danger') );
        }
    }

    public function updates(){

        $album = Album::find( Input::get('alb_id') );
        return Response::json($album);
    }

}
?>