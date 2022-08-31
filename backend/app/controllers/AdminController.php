<?php

class AdminController extends BaseController{

	public function index(){
//		$albumes = Album::where('alb_estado','1')->get();
		$albumes = array();
		return View::make('admin.home')->with('albumes', $albumes);

//            $datos = Usuario::find( Session::get('user') );
//
//            //Datos de su personal
//            $personal = Personal::where('pers_active',1)
//                        ->where('usu_id', Session::get('user') )->get();
//
//            $totalPersonal = count( $personal );
//
//            return View::make('panel.home')
//                ->with('datos', $datos)
//                ->with('personal', $personal)
//                ->with('totalPersonal', $totalPersonal);


	}


	public function templates(){

		if(!Request::ajax()){
			return Response::view('404', array(), 404);

		}else{
			return View::make('admin.templates');
		}
	}


}

?>
