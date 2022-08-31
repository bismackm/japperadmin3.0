<?php
class SongController extends BaseController{

    public function index($alb_id){

        $album = Album::find($alb_id);
        $songs = Song::where('alb_id',$alb_id)->get();

        return View::make('admin.song')->with('songs',$songs)->with('album',$album);
    }

    public function store($alb_id){

        $sesionID = Session::get('user');
        if( !isset( $sesionID ) ){
            App::abort(404);
        }

        try {

            $can_id = Input::get('can_id');
            $flag = Input::get('flag');

            if( $can_id != '' ){
                $song = Song::find( $can_id );
            } else {

                $findSameTitle = Song::where('can_link',Input::get('convertURL_text'))->get();
               if( count( $findSameTitle ) > 0 ){
                   $json = array('message' => 'Error, el título de la canción ya fué agregada anteriormente. Por favor intenta ingresando otro título', 'type' => 'danger');
                   if( $flag == 'x' ){
                       return Response::json($json);
                   } else{
                       return '<script type="text/javascript">window.parent.song.imprimir(' . json_encode($json) . ')</script>';
                   }
               }

                $song = new Song;
            }

            $tipo_archivo = Input::get('can_tipo_archivo');

            $song->alb_id = $alb_id;
            $song->can_titulo = Input::get('can_titulo');
            $song->can_autores = Input::get('can_autores');
            $song->can_intro = Input::get('can_intro');
            $song->can_letra = Input::get('can_letra');
            $song->can_tipo_archivo = $tipo_archivo;
            $song->can_link = Input::get('convertURL_text');

            if( $flag == 'x' ){
                $song->can_video = Input::get('can_video');
                $song->save();
                $json = array('message' => 'Guardado Correctamente', 'type' => 'success');
                return Response::json($json);
            } else {
                $file = Input::file('can_mp3');
                $file_nom = Input::get('can_mp3');

                $destinationPath = 'assets/img/album/'. $alb_id . '/canciones/' . $file_nom;
                $filename = $file->getClientOriginalName();
                $uploadSuccess = Input::file('can_mp3')->move($destinationPath, $filename);

                if ($uploadSuccess) {
                    $song->can_mp3 = $filename;
                    $song->save();
                    $json = array('message' => 'Guardado Correctamente', 'type' => 'success');
                    return '<script type="text/javascript">window.parent.song.imprimir(' . json_encode($json) . ')</script>';
                }
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

            $song = Song::find( Input::get('can_id') );
            $song->delete();
            return Response::json( array('message'=>'Canción eliminada' , 'type'=>'success') );
        } catch( Exception  $exc){
            return Response::json( array('message'=>$exc->getMessage() , 'type'=>'danger') );
        }
    }

    public function updates(){

        $song = Song::find( Input::get('can_id') );
        return Response::json($song);
    }

}
?>