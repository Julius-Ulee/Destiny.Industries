<?php

class RESTClient {

    private $endpoint;
    private $api_url;

    public function __construct($endpoint) {
        $this->endpoint = $endpoint;
        $this->api_url = "https://wilayah.id/api/";
    }

    function post($params) {
        $curl = curl_init();
        $header[] = "Content-Type: application/json";
        $query = http_build_query($params);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_URL, $this->api_url . $this->endpoint);
        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $query);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        $request = curl_exec($curl);
        $return = ($request === FALSE) ? curl_error($curl) : $request;
        curl_close($curl);

        $data = json_decode($return, true);
        return $data['data'];
    }

    function get($params = null) {
        $curl = curl_init();
        $query = $params ? http_build_query($params) : '';
        curl_setopt($curl, CURLOPT_URL, $this->api_url . $this->endpoint . "?" . $query);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        $request = curl_exec($curl);
        $return = ($request === FALSE) ? curl_error($curl) : $request;
        curl_close($curl);
        
        $data = json_decode($return, true);
        return $data['data'];
    }

}
