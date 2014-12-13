<?php

class LoginController extends BaseController{

	public function login(){

		if (Request::isMethod('get')){
			return View::make('login.login');
		}

		elseif(Request::isMethod('post')){
			$user  = Input::get('user');
			$pass  = Input::get('pass');
			$user_bd = Usuario::all();

				$boolean=0;
				foreach ($user_bd as $usuario){
						if (Hash::check($pass,$usuario->pass)){ //Si coincide la clave encriptada
						//if($usuario->user == $user and Hash::check($pass,$usuario->pass)){
							Session::put('user', $usuario->id);
							Session::put('user_mail', $usuario->user);
							Session::put('user_nombre', $usuario->nombre);
							Session::put('user_foto', $usuario->foto);
							Session::put('user_nivel', $usuario->nivel);
							$boolean = 1;
					}
				}
					if($boolean == 1){
						return Redirect::to('admin');
					}
					else{
						Session::put('error', 'Los datos ingresados son incorrectos, comuníquese con el administrador.');
						return View::make('login.login');
					}
			}
	}

	public function recuperar(){
		
		if (Request::isMethod('get')){
			return View::make('login.password_forgot');
		}


		elseif (Request::isMethod('post')){
			$mail = Input::get('mail');
			$user_mail = Usuario::where('user',$mail)->first();

			if(count($user_mail)!=0){
					//Creando password nueva
					$pass_new = Str::upper(str_random(4));
					$passnew = Hash::make($pass_new);
					$user_mail->pass = $passnew; 
					$user_mail->save();

					//Creando Arreglo de cuentas 
					$user = array(
					  'email'=>$mail, 
					  'name'=> 'Administrador Web'
					);
					 
					// the data that will be passed into the mail view blade template
					$data = array(
					  'mail'=>$mail,'clave_nueva'=>$pass_new);
					 
					// use Mail::send function to send email passing the data and using the $user variable in the closure
					Mail::send('login.emails.recuperar_clave', $data, function($message) use ($user)
					{
					  $message->from('bismack_1@hotmail.com', 'Administrador');
					  $message->to($user['email'], $user['name'])->subject('Reseteo de Clave');
					});

				Session::put('check','Porfavor verifique su e-mail');
				return Redirect::to('login');

			}
			else{
				Session::put('error','E-mail no existe en la Base de Datos.');
				return Redirect::back();
			}
		}
	}


}

?>
