<?php

class AdminController extends BaseController{

	public function index(){

		$buyers = Buyer::where('deleted_at', null)->get();

		$type_entries[1] = "General";
		$type_entries[2] = "Preferencial";
		$type_entries[3] = "VIP";
		$type_entries[4] = "Platino";

		$pay_modes[1] = "Yape";
		$pay_modes[2] = "Plin";
		$pay_modes[3] = "Efectivo";

		return View::make('admin.home')
			->with('buyers', $buyers)
			->with('type_entries', $type_entries)
			->with('pay_modes', $pay_modes);

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
