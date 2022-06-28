<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebServiceController extends Controller
{
    
    public function bigmailintegration(Request $request){
        
        $curl = curl_init();
        curl_setopt_array($curl, [
          CURLOPT_URL => "https://api.bigmailer.io/v1/me",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => [
            "Accept: application/json",
            "X-API-Key: 9668aebe-5513-46ff-bf19-1924952dc6c1"
          ],
        ]);

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }
           

        return $response;

    }





public function bigmailer_list_brands(Request $request){
    $client = new \GuzzleHttp\Client();

    $response = $client->request('GET', 'https://api.bigmailer.io/v1/brands?limit=10', [
      'headers' => [
        'Accept' => 'application/json',
        'X-API-Key' => '9668aebe-5513-46ff-bf19-1924952dc6c1',
      ],
    ]);

    echo $response->getBody();
}





    public function bigmailer_list_content(Request $request){
        $client = new \GuzzleHttp\Client();

$response = $client->request('GET', 'https://api.bigmailer.io/v1/brands/ee82a5c9-fe7a-4d58-8d47-8bd6b01c7581/contacts', [
  'headers' => [
    'Accept' => 'application/json',
    'X-API-Key' => '9668aebe-5513-46ff-bf19-1924952dc6c1',
  ],
]);

echo $response->getBody();

    }



    public function bigmailer_list_field(Request $request){

        $client = new \GuzzleHttp\Client();

            $response = $client->request('GET', 'https://api.bigmailer.io/v1/brands/ee82a5c9-fe7a-4d58-8d47-8bd6b01c7581/fields?limit=10', [
              'headers' => [
                'Accept' => 'application/json',
                'X-API-Key' => '9668aebe-5513-46ff-bf19-1924952dc6c1',
              ],
            ]);

            echo $response->getBody();

    }


    public function bigmailer_list_message_type(Request $request){

        $client = new \GuzzleHttp\Client();

            $response = $client->request('GET', 'https://api.bigmailer.io/v1/brands/ee82a5c9-fe7a-4d58-8d47-8bd6b01c7581/message-types?limit=10', [
              'headers' => [
                'Accept' => 'application/json',
                'X-API-Key' => '9668aebe-5513-46ff-bf19-1924952dc6c1',
              ],
            ]);

            echo $response->getBody();
    }





    public function bigmailer_list_users(Request $request){
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://api.bigmailer.io/v1/users?limit=10', [
          'headers' => [
            'Accept' => 'application/json',
            'X-API-Key' => '9668aebe-5513-46ff-bf19-1924952dc6c1',
          ],
        ]);

echo $response->getBody();
    }



public function bigmailer_transactional_email(Request $request){
    // $client = new \GuzzleHttp\Client();
    
    // $response = $client->request('POST', 'https://api.bigmailer.io/v1/brands/ee82a5c9-fe7a-4d58-8d47-8bd6b01c7581/transactional-campaigns/280c7f37-f5c7-471a-8e3f-bc129baf10e9/send', [
    //     'body' => '{"email":"chris@bigmailer.io","field_values":[{"name":"FIRST NAME","string":"Christopher"},{"name":"BIRTHDAY","date":"1981-12-04"},{"name":"EMPLOYEE ID","integer":12345}],"variables":[{"name":"COMPANY","value":"Widgets, LTD."},{"name":"ADDRESS","value":"123 Main Street"}]}',

    //   'headers' => [
    //     'Accept' => 'application/json',
    //     'Content-Type' => 'application/json',
    //     'X-API-Key' => '9668aebe-5513-46ff-bf19-1924952dc6c1',
    //   ],
      


    // ]);

    // echo $response."<br><br><br>";
    // return $response;





    $client = new \GuzzleHttp\Client();

$response = $client->request('POST', 'https://api.bigmailer.io/v1/brands/ee82a5c9-fe7a-4d58-8d47-8bd6b01c7581/transactional-campaigns/280c7f37-f5c7-471a-8e3f-bc129baf10e9/send', [
  'body' => '{"field_values":[{"name":"FIRST NAME","string":"Christopher"},{"name":"BIRTHDAY","date":"1981-12-04"},{"name":"EMPLOYEE ID","integer":12345}],"variables":[{"name":"COMPANY","value":"Widgets, LTD."},{"name":"ADDRESS","value":"123 Main Street"}],"email":"chris@bigmailer.io"}',
  'headers' => [
    'Accept' => 'application/json',
    'Content-Type' => 'application/json',
    'X-API-Key' => '9668aebe-5513-46ff-bf19-1924952dc6c1',
  ],
]);

echo $response->getBody();

return $response->getBody();



//     $brandId = "ee82a5c9-fe7a-4d58-8d47-8bd6b01c7581";
// $campaignId = "280c7f37-f5c7-471a-8e3f-bc129baf10e9";
// $apiKey = "9668aebe-5513-46ff-bf19-1924952dc6c1";

// $curl = curl_init();

// curl_setopt_array($curl, [
//   CURLOPT_URL => "https://api.bigmailer.io/v1/brands/ee82a5c9-fe7a-4d58-8d47-8bd6b01c7581/transactional-campaigns/280c7f37-f5c7-471a-8e3f-bc129baf10e9/send",
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => "",
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => "POST",
//   CURLOPT_POSTFIELDS => "{\"field_values\":[{\"name\":\"FIRST_NAME\",\"string\":\"Christopher\"},{\"name\":\"AGE\",\"integer\":38},{\"name\":\"DOB\",\"string\":\"1981-12-04\"}],\"variables\":[{\"name\":\"SPECIAL_MESSAGE\",\"value\":\"<strong>Thank you for being a great customer!</strong>\"}],\"email\":\"chris@example.com\"}",
//   CURLOPT_HTTPHEADER => [
//     "Accept: application/json",
//     "Content-Type: application/json",
//     "X-API-Key: $apiKey",
//   ],
// ]);

// $response = curl_exec($curl);
// $err = curl_error($curl);

// curl_close($curl);

// if ($err) {
//   echo "cURL Error :" . $err;
// } else {
//   echo $response;
//   return $response;
// }


}

    











    public function getSandboxApi(Request $request){

       // $results = DB::select('select * from users where id = :id', ['id' => 1]);
       // return $results;





    // Authorization Start =======================================

$client_id = 'l727dc637e82584c4c817ff731e78a4449';//Api key
$client_secret = '0ae562e5f688415aa357a9ad7053efc9';//secrete key


$http = new Client();

    $response = $http->post('https://apis-sandbox.fedex.com/oauth/token', [
        'form_params' => [
            'grant_type' => 'client_credentials',
            'client_id' => $client_id,
            'client_secret' => $client_secret
        ],
    ]);

    $response_json =  json_decode((string) $response->getBody(), true);
    

    $authorization_token = $response_json['access_token'];

    // Authorization End =======================================




    // Postal Code Start ======================================================

    $client1 = new \GuzzleHttp\Client();

        $auth_token = "Bearer ".$authorization_token;

        $fromdata1 = array(
             'carrierCode'                  =>     'FDXE',
             'countryCode'                  =>     'US',
             'stateOrProvinceCode'          =>     'TN',
             'postalCode'                   =>     '38017',
             'shipDate'                     =>     '2022-05-29');

         $response1 = $client1->post('https://apis-sandbox.fedex.com/country/v1/postal/validate', [
     'headers'=>[

             'Authorization'=>$auth_token,
             'content-type' => 'application/json'
             
        ],
    \GuzzleHttp\RequestOptions::JSON =>$fromdata1 // or 'json' => [...]
]);
    $response_postal_code =  json_decode((string) $response1->getBody(), true);

    // Postal Code End ========================================================


    //Rates and Transit Times API Start=============================================


    $client2 = new \GuzzleHttp\Client();

        $auth_token = "Bearer ".$authorization_token;






        $fromdata2 = array(
                                "accountNumber"=>array(
                                    "value"=>"XfgPsslcRZnWG0WL"
                                ),



                                "requestedShipment"=>array(
                                                                "shipper"=>array(
                                                                                    "address"=>[
                                                                                                "postalCode"=> '65247',
                                                                                                "countryCode"=> "US"
                                                                                                ]
                                                                                ),


                                                                "recipient"=>array(
                                                                                    "address"=>[
                                                                                                "postalCode"=> '75063',
                                                                                                "countryCode"=> "US"
                                                                                                ]
                                                                                ),


                                                                "pickupType"=> "DROPOFF_AT_FEDEX_LOCATION",
                                                                "rateRequestType"=> [
                                                                                        "ACCOUNT",
                                                                                        "LIST"
                                                                                    ],
                                                                "requestedPackageLineItems"=>array(

                                                                                                
                                                                                                            "weight"=>array(
                                                                                                                                    "units"=> "LB",
                                                                                                                                    "value"=> '10'
                                                                                                                                )
                                                                                                

                                                                                              
                                                                                            )


                                                            )
                            );








        // echo '<pre>';
        // print_r($fromdata2);
        // echo "</pre>";
        // die;



        // -----------------------------------

//                   {
//   "accountNumber": {
//     "value": "XXXXX7364"
//   },
//   "requestedShipment": {
//     "shipper": {
//       "address": {
//         "postalCode": 65247,
//         "countryCode": "US"
//       }
//     },
//     "recipient": {
//       "address": {
//         "postalCode": 75063,
//         "countryCode": "US"
//       }
//     },
//     "pickupType": "DROPOFF_AT_FEDEX_LOCATION",
//     "rateRequestType": [
//       "ACCOUNT",
//       "LIST"
//     ],
//     "requestedPackageLineItems": [
//       {
//         "weight": {
//           "units": "LB",
//           "value": 10
//         }
//       }
//     ]
//   }
// }


        // -------------------------------------------




         $response1 = $client2->post('https://apis-sandbox.fedex.com/rate/v1/rates/quotes', [
     'headers'=>[

             'Authorization'=>$auth_token,
             'content-type' => 'application/json'
             
        ],
    \GuzzleHttp\RequestOptions::JSON =>$fromdata2 // or 'json' => [...]
]);
    $response_postal_code =  json_decode((string) $response1->getBody(), true);



//Rates and Transit Times API Start=============================================








    }

    
}
