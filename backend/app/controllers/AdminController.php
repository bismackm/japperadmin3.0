<?php

class AdminController extends BaseController{

	public function index(){

		return View::make('admin.index');

	}

	public function perfil(){

		return View::make('admin.modal.perfil');

	}

	public function post_accountedit(){
		$id = Input::get('id');
		$inputs = Input::all();

		$users = Usuario::find($id);
		//$gallery->imagen = Input::get('');
		$users->nombre = Input::get('nombre'); 
		$users->user = Input::get('correo');
		Session::put('correo', Input::get('correo'));
		$file = Input::file('archivo'); $file_nom = Input::get('archivo'); 
		$reglas = array('correo'=>'email');
		$validar = Validator::make($inputs,$reglas);
		//Si no hay nada en file
		if($file == ""){			
			if($validar->fails()){
				Session::put('error','Correo no Valido');
			}else{
				Session::put('nombre', $users->nombre );
				$users->save();
				Session::put('check','Datos Actualizados');
			}
		}else{//Si hay algo en file guardar con todo y el file
			$reglas = array('archivo'=>'required', 'correo'=>'email');
			$mensajes = array('required'=>'Especificar Ruta de la Imagen','email'=>'Correo no valido');
			$validar = Validator::make($inputs,$reglas,$mensajes);
		if($validar->fails()){
			Session::put('error','Error al Cargar');
			return Redirect::to('admin/panel/account')->withErrors($validar);
		}else{
			$destinationPath = 'assets/images/usuarios'.$file_nom;
			$filename = $file->getClientOriginalName();
			$uploadSuccess = Input::file('archivo')->move($destinationPath, $filename);
			if( $uploadSuccess ) {
				$users->foto = $filename;	
				$users->save();
				Session::put('foto', $users->foto );
				Session::put('check','Efectuado con exito.');
			} else {
			   	Session::put('error','Error al Cargar');
				return Redirect::to('admin/account')->withErrors($validar);
			}
		}

		}
		return Redirect::to('admin/account');
	}	
	public function post_accounteditpass(){
		$id = Input::get('id');
		$inputs = Input::all();
		$user = Usuario::find($id);
		
		$passactual = Input::get('passactual');
		$passnew = Input::get('passnew');
		$re_passnew = Input::get('repassnew');

		if(Hash::check($passactual,$user->pass)){
			if($passnew == $re_passnew and $passnew!=""){				
				$passnew=Hash::make($passnew);
				$user->pass = $passnew; 
				$user->save();
				Session::put('check','Contraseña cambio con éxito');
			}
			else{
				Session::put('error','Las contraseñas nuevas no coinciden o están en blanco');	
			}
		}
		else{
			Session::put('error','La contraseña actual no es valida');
		}

		return Redirect::to('admin/account');
	}
}

?>
