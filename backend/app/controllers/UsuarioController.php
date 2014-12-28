<?php

class UsuarioController extends BaseController{

	public function index(){
		 var_export('Chau'); die;
	}

	public function store(){
		return Response::json(array('mensaje'=>'Hola'));
	}
	
}
?>
