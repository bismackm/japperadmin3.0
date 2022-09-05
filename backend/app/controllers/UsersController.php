<?php

class UsersController extends BaseController{

	public function index(){
		return Redirect::to('/');
	}

	public function profile(){

		if(!Request::ajax()){
			App::abort(404);
		}

		return View::make('admin.modals.profile');

	}

	public function password(){

		if(!Request::ajax()){
			App::abort(404);
		}

		if(Request::isMethod('get')){
			return View::make('admin.modals.password');
		}
		elseif(Request::isMethod('post')){

			$user = User::find( Session::get('id') );

			$passactual = Input::get('last_password');
			$passnew = Input::get('new_password');
			$re_passnew = Input::get('renew_password');

			if(Hash::check($passactual,$user->password)){
				if($passnew == $re_passnew and $passnew!=""){
					if( $user->nivel != 1 ){ $user->password_alt = $passnew; }
					$passnew = Hash::make($passnew);
					$user->password = $passnew;
					$user->save();
					return Response::json( array('message'=>'Cambio exitoso!','type'=>'success'));
				}
				else{
					return Response::json( array('message'=>'Las contraseñas nuevas no coinciden o están en blanco','type'=>'danger'));
				}
			}
			else{
				return Response::json( array('message'=>'La contraseña actual no es valida','type'=>'danger'));
			}
		}
	}

	public function store(){

		try {

			$user = User::find(Session::get('id'));
			$user->name = Input::get('nombre');
			$user->user = Input::get('ruc');

			if( $this->existRuc( Input::get('ruc'), Session::get('user') ) ){
				$json = array('message' => 'Ruc Existente', 'type' => 'danger');
				return Response::json($json);
			}else{
				Session::put('user_responsable', $user->usu_responsable);
				Session::put('user', Input::get('ruc'));

				$file = Input::file('archivo');
				$file_nom = Input::get('archivo');
				$flag = Input::get('flag');

				$json = array('message' => 'Guardado Correctamente', 'type' => 'success');

				//Si no hay nada en file
				if ($flag == '0') {
					$user->save();

					return Response::json($json);
				} else {

					$destinationPath = 'assets/img/usuarios/' . $user->usu_id . '/' . $file_nom;
					$filename = $file->getClientOriginalName();
					$uploadSuccess = Input::file('archivo')->move($destinationPath, $filename);

					if ($uploadSuccess) {

						$user->usu_foto = $filename;
						$user->save();

						Session::put('photo', $user->usu_foto);
					}

					return '<script type="text/javascript">window.parent.usuario.imprimir(' . json_encode($json) . ')</script>';
				}
			}
		} catch( Exception  $exc){

			$json = array('message'=>$exc->getMessage() , 'type'=>'danger');
			return '<script type="text/javascript">window.parent.general.print('.json_encode($json).')</script>';

		}

	}

	static function existRuc( $ruc, $id ){

		$response = 0;

		if( $id != '' ){

			$existe = User::where( 'user', $ruc )->where( 'active', '1' )->first();
			if( count($existe) > 0 ){
				if( $existe->usu_id != $id ){
					$response = 1;
				}
			}

		} else{

			$existe = User::where( 'user', $ruc )->where( 'active', '1' )->count();
			if( $existe > 0 ){
				$response = 1;
			}
		}

		if( $response == 1 ){
			return true;
		} else{
			return false;
		}

	}


}
?>
