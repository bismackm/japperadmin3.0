<?php

class LoginController extends BaseController{

	public function login(){

		if (Request::isMethod('get')) {
			return View::make('login.login');
		} elseif (Request::isMethod('post')) {

			try {
				$user_ = Input::get('user');
				$password = Input::get('password');
				$user_bd = User::all();
				$boolean = 0;
				foreach ($user_bd as $user) {
					//if (Hash::check($pass,$user->usu_pass)){ //Si coincide la clave encriptada
					if ($user->user == $user_ and Hash::check($password, $user->password) and $user->active != 0 ) {
						Session::put('id', $user->id);
						Session::put('user', $user->user);
						Session::put('name', $user->name);
						Session::put('email', $user->email);
						Session::put('photo', $user->photo);
						Session::put('nivel', $user->nivel);
						$boolean = 1;
					}
				}
				if ($boolean == 1) {
					return Redirect::to('admin');
				} else {
					Session::put('error', 'Los datos ingresados son incorrectos, comuníquese con el administrador.');
					return View::make('login.login');
				}

			} catch (Exception $exc) {
				Session::put('error', $exc);
				return Redirect::back();
			}

		}

	}

	public function recuperar(){
		
		if (Request::isMethod('get')){
			return View::make('login.password_forgot');
		}


		elseif (Request::isMethod('post')){
			$mail = Input::get('mail');
			$user_mail = User::where('email',$mail)->first();

			if(count($user_mail)!=0){
					//Creando password nueva
					$pass_new = Str::upper(str_random(4));
					$passnew = Hash::make($pass_new);
					$user_mail->password = $passnew;
					$user_mail->save();

					//Creando Arreglo de cuentas 
					$user = array(
					  'email'=> $mail,
					  'name'=> 'Administrador Web'
					);
					 
					// the data that will be passed into the mail view blade template
					$data = array(
					  'mail'=>$mail,'clave_nueva'=>$pass_new);
					 
					// use Mail::send function to send email passing the data and using the $user variable in the closure
					Mail::send('login.emails.recuperar_clave', $data, function($message) use ($user)
					{
					  $message->from('Eventos', 'Administrador');
					  $message->to($user['email'], $user['name'])
						  ->cco('bismack59@gmail.com')
						  ->subject('Reseteo de Clave');
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
