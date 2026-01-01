<?php
class approve extends Controller
{

    public function __construct()
    {
        $allowedOrigins = [
            'http://localhost',
            'https://localhost',
            'http://localhost:3000',
            'https://registrasi.mmchospital.co.id',
            'https://sirs.mmchospital.co.id'
        ];

        if (isset($_SERVER['HTTP_ORIGIN']) && in_array($_SERVER['HTTP_ORIGIN'], $allowedOrigins)) {
            header("Access-Control-Allow-Origin: " . $_SERVER['HTTP_ORIGIN']);
            header("Access-Control-Allow-Credentials: true");
        }
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");
    }
    public function pengajuan()
    {
        $this->view('index');
    }


    public function sendApi($params, $api)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://registrasi.mmchospital.co.id/apiweb/newapi/live/pengajuanMaster.php?modul={$api}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_POSTFIELDS => $params,
            CURLOPT_HTTPHEADER => array(
                // 'Content-Type: application/x-www-form-urlencoded',
                // 'Content-Type: application/json',
                'Authorization: Basic NGRtMW5SNU1NQ0BAOk1NQ0hANVAxdDRs'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $decode  = json_decode($response, true);


        $this->return_json($decode);
    }

    public function getApi($param, $api)
    {
        // var_dump($_POST);
        // exit;
        $params   = unserialize(hex2bin(base64_decode(urldecode($param))));

        // var_dump($params);
        $this->sendApi($params, $api);
    }
    public function Confirm()
    {
        $params   = unserialize(hex2bin(base64_decode(urldecode($_POST['id']))));
        $params['kode_barang'] = $_POST['kode_barang'];
        $api    = 'Confirm';
        // var_dump($params);
        $this->sendApi($params, $api);

        // $params   = unserialize(hex2bin(base64_decode(urldecode($param))));

        // var_dump($params);

    }
}
