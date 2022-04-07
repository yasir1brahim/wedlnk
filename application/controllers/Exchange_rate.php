<?php
defined('BASEPATH') OR exit('No direct script access is allowed');

class Exchange_rate extends MY_Controller {

    private $accessKey ='';

    public function __construct(){
        parent::__construct();

        $auth = auth();

        if(!$auth OR $auth->user_type!=ROLE_ADMIN){
            redirect('Login');
        }
    }

    public function index(){
        $data['exchange_rates'] = $this->latest_exchange_rate();
        $data['page'] = 'exchange_rate/index';
        $this->load->view('template/admin',$data);
    }

    public function latest_exchange_rate(){
    // set API Endpoint and API key
    $endpoint = 'latest';
    $access_key = 'c21724cb44e00f47b0be71ff3d48639e';
    $base = 'EUR';
    $symbols = 'USD,RON';

    // Initialize CURL:
    $ch = curl_init('http://api.exchangeratesapi.io/v1/'.$endpoint.'?access_key='.$access_key.'&base='.$base.'&symbols='.$symbols);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Store the data:
    $json = curl_exec($ch);
    curl_close($ch);

    // Decode JSON response:
    $exchangeRates = json_decode($json, true);
        
    // Access the exchange rate values, e.g. GBP:
    if(array_key_exists('success',$exchangeRates) && $exchangeRates['success']==1){
        return $exchangeRates;
    }
    return [];

    }
}