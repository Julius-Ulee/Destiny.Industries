<?php

require_once 'restclient.php';

class Endpoints {

    function province() {
        $rest_client = new RESTClient('provinces.json');
        return $rest_client->get();
    }

    function city($province_id) {
        $rest_client = new RESTClient('regencies/'.$province_id.'.json');
        return $rest_client->get();
    }

    function getName($data, $code){
        foreach($data as $val){
            if($val['code'] == $code){
                return $val['name'];
            }
        }
    }

}
