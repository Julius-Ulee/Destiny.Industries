<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Address extends MY_Controller 
{

    public function city($province){
        $this->load->library('wilayah');

        $city = $this->wilayah->city($province);

        header("Content-Type: application/json");
        echo json_encode($city);
    }
}