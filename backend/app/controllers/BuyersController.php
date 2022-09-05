<?php
class BuyersController extends BaseController{

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

            $id_ = Input::get('id');
            if( $id_ != '' ){
                $buyer = Buyer::find( $id_ );

                $buyer->name = Input::get('name');
                $buyer->dni = Input::get('dni');
                $buyer->phone = Input::get('phone');
                $buyer->pay_mode = Input::get('pay_mode');
                $buyer->updated_at = date('Y-m-d H:i:s');
                $buyer->save();
            } else {
                $number_entries_ = (int)Input::get('number_entries');
                $type_entry_ = (int)Input::get('type_entry');
                for ($i=0; $i<$number_entries_; $i++){

                    $qr_code_ = Input::get('qr_code_'.$type_entry_);
                    if($i>0){
                        $qr_code_ = $this->sum_qr_code($qr_code_, $i);
                    }

                    $buyer = new Buyer;
                    $buyer->name = Input::get('name');
                    $buyer->dni = Input::get('dni');
                    $buyer->phone = Input::get('phone');
                    $buyer->type_entry = $type_entry_;
                    $buyer->order_buyed = $i+1;
                    $buyer->pay_mode = Input::get('pay_mode');
                    $buyer->qr_code = $qr_code_;
                    $buyer->user_id = Session::get('id');
                    $buyer->counter_registered = 0;
                    $buyer->created_at = date('Y-m-d H:i:s');
                    $buyer->updated_at = date('Y-m-d H:i:s');
                    $buyer->save();
                }
            }

            $json = array('message' => 'Guardado Correctamente', 'type' => 'success');

            return Response::json($json);

        } catch( Exception  $exc){

            $json = array('message'=>$exc->getMessage() , 'type'=>'danger');
            return '<script type="text/javascript">window.parent.general.print('.json_encode($json).')</script>';

        }

    }

    public function sum_qr_code($qr_code, $i){

        $qr_code = explode('-', $qr_code);
        $qr_code_part_1 = $qr_code[0];
        $qr_code_part_2 = (int)$qr_code[1] + $i;

        $response = "";
        if($qr_code_part_2<10){
            $response = $qr_code_part_1."-000".$qr_code_part_2;
        }else if($qr_code_part_2>=10 && $qr_code_part_2<100){
            $response = $qr_code_part_1."-00".$qr_code_part_2;
        }else if($qr_code_part_2>=100 && $qr_code_part_2<1000){
            $response = $qr_code_part_1."-0".$qr_code_part_2;
        }else if($qr_code_part_2>=1000 && $qr_code_part_2<10000){
            $response = $qr_code_part_1."-".$qr_code_part_2;
        }

        return $response;
    }

    public function remove(){
        $sesionID = Session::get('user');
        if( !Request::ajax() || !isset( $sesionID ) ){
            App::abort(404);
        }
        try{

            $buyer = Buyer::find( Input::get('alb_id') );
            $buyer->alb_estado = 0;
            $buyer->save();
            return Response::json( array('message'=>'Album eliminado' , 'type'=>'success') );
        } catch( Exception  $exc){
            return Response::json( array('message'=>$exc->getMessage() , 'type'=>'danger') );
        }
    }

    public function updates(){

        $buyer = Buyer::find( Input::get('alb_id') );
        return Response::json($buyer);
    }

    public function get_qr_correlative(){

        $general_count = Buyer::where('type_entry', 1)->count();
        $preferential_count = Buyer::where('type_entry', 2)->count();
        $vip_count = Buyer::where('type_entry', 3)->count();
        $platinium_count = Buyer::where('type_entry', 4)->count();

        $general_correlative = "";
        $general_count = $general_count+1;
        if($general_count<10){
            $general_correlative = "GRL-000".$general_count;
        }else if($general_count>=10 && $general_count<100){
            $general_correlative = "GRL-00".$general_count;
        }else if($general_count>=100 && $general_count<1000){
            $general_correlative = "GRL-0".$general_count;
        }else if($general_count>=1000 && $general_count<10000){
            $general_correlative = "GRL-".$general_count;
        }

        $preferential_correlative = "";
        $preferential_count = $preferential_count+1;
        if($preferential_count<10){
            $preferential_correlative = "PR-000".$preferential_count;
        }else if($preferential_count>=10 && $preferential_count<100){
            $preferential_correlative = "PR-00".$preferential_count;
        }else if($preferential_count>=100 && $preferential_count<1000){
            $preferential_correlative = "PR-0".$preferential_count;
        }else if($preferential_count>=1000 && $preferential_count<10000){
            $preferential_correlative = "PR-".$preferential_count;
        }

        $vip_correlative = "";
        $vip_count = $vip_count+1;
        if($vip_count<10){
            $vip_correlative = "VIP-000".$vip_count;
        }else if($vip_count>=10 && $vip_count<100){
            $vip_correlative = "VIP-00".$vip_count;
        }else if($vip_count>=100 && $vip_count<1000){
            $vip_correlative = "VIP-0".$vip_count;
        }else if($vip_count>=1000 && $vip_count<10000){
            $vip_correlative = "VIP-".$vip_count;
        }

        $platinium_correlative = "";
        $platinium_count = $platinium_count+1;
        if($platinium_count<10){
            $platinium_correlative = "PLT-000".$platinium_count;
        }else if($platinium_count>=10 && $platinium_count<100){
            $platinium_correlative = "PLT-00".$platinium_count;
        }else if($platinium_count>=100 && $platinium_count<1000){
            $platinium_correlative = "PLT-0".$platinium_count;
        }else if($platinium_count>=1000 && $platinium_count<10000){
            $platinium_correlative = "PLT-".$platinium_count;
        }

        return Response::json(array(
            "general_correlative"=>$general_correlative,
            "preferential_correlative"=>$preferential_correlative,
            "vip_correlative"=>$vip_correlative,
            "platinium_correlative"=>$platinium_correlative
        ));
    }

    public function verify_qr_code($qr_code){
        $buyer = Buyer::where('qr_code', $qr_code)->first();
//        return $buyer;
        if($buyer){
            $buyer->counter_registered = (int)$buyer->counter_registered + 1;
            $buyer->save();

            $new_buyer_log = new BuyerLog();
            $new_buyer_log->buyer_id = $buyer->id;
            $new_buyer_log->created_at = date('Y-m-d H:i:s');
            $new_buyer_log->updated_at = date('Y-m-d H:i:s');
            $new_buyer_log->save();

            $buyer_logs = BuyerLog::where('buyer_id', $buyer->id)->get();
//            return $buyer_logs;
            $response = array(
                "success" => true,
                "buyer" => array(
                    "name" => $buyer->name,
                    "dni" => $buyer->dni,
                    "phone" => $buyer->phone,
                    "counter_registered" => $buyer->counter_registered,
                ),
                "logs" => (array)$buyer_logs
            );
        } else {
            $response = array(
                "success" => false
            );
        }

        return Response::json($response);

    }

}
?>