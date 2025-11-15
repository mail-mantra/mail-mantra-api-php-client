<?php

namespace MailMantra;

class Kyc
{

    private const API_BASE_URL = 'https://kyc.mailmantra.com/api';
    /**
     * @var string
     */
    private $authKey;
    private $result;

    public function __construct($authKey = '')
    {
        $this->authKey = $authKey;
    }

    /**
     * @return string|string
     */
    public function getAuthKey(): string
    {
        return $this->authKey;
    }

    /**
     * @param string|string $authKey
     */
    public function setAuthKey(string $authKey = '')
    {
        $this->authKey = $authKey;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function balance(): array
    {
        $result = [];
        try {
            $postData = array(
                'api_key' => $this->authKey,
            );

            //API URL
            $url = self::API_BASE_URL . "/balance/v1";

            // init the resource
            $ch = curl_init();
            curl_setopt_array($ch, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $postData
                //,CURLOPT_FOLLOWLOCATION => true
            ));

            //Ignore SSL certificate verification
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


            //get response
            $output = curl_exec($ch); // '{ "type": "success", "message": "abc" }';

            //Print error if any
            if(curl_errno($ch)) {
                // echo 'error:' . curl_error($ch);
                $result['status'] = 301;
                $result['message'] = 'Internal Error'; // 'Curl Error..';
            }
            else {
                curl_close($ch);
                $output_arr = json_decode($output, true);

                if(json_last_error_msg() === "No error") {
                    $result = $output_arr;
                }
                else {
                    $result = [
                        'status' => 302,
                        'output' => $output,
                        'message' => json_last_error_msg()
                    ];
                }
            }
        }
        catch(\Exception $exception) {
            $result['status'] = 303;
            $result['message'] = $exception->getMessage();
        }

        $this->result = $result;

        return $this->result;
    }

    public function pan($pan_number): array
    {
        $result = [];
        try {
            $postData = array(
                'api_key' => $this->authKey,
                'pan_number' => $pan_number,
            );

            //API URL
            $url = self::API_BASE_URL . "/pan";

            // init the resource
            $ch = curl_init();
            curl_setopt_array($ch, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $postData
                //,CURLOPT_FOLLOWLOCATION => true
            ));

            //Ignore SSL certificate verification
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


            //get response
            $output = curl_exec($ch); // '{ "type": "success", "message": "abc" }';

            //Print error if any
            if(curl_errno($ch)) {
                // echo 'error:' . curl_error($ch);
                $result['status'] = 201;
                $result['message'] = 'Internal Error'; // 'Curl Error..';
            }
            else {
                curl_close($ch);
                $output_arr = json_decode($output, true);

                if(json_last_error_msg() === "No error" && is_array($output_arr)) {
                    if(isset($output_arr['status']) && (string)$output_arr['status'] === '0') {
                        $result = $output_arr;
                    }
                    elseif(isset($output_arr['status']) && isset($output_arr['message'])) {
                        $result = $output_arr;
                    }
                    else {
                        $result = [
                            'status' => 202,
                            'message' => 'Insufficient Output',
                            'output' => $output,
                        ];
                    }
                }
                else {
                    $result = [
                        'status' => 203,
                        'output' => $output,
                        'message' => json_last_error_msg()
                    ];
                }
            }
        }
        catch(\Exception $exception) {
            $result['status'] = 204;
            $result['message'] = $exception->getMessage();
        }

        $this->result = $result;

        return $this->result;
    }

    public function bav($account_number, $ifsc): array
    {
        $result = [];
        try {
            $postData = array(
                'api_key' => $this->authKey,
                'account_number' => $account_number,
                'ifsc' => $ifsc,
            );

            //API URL
            $url = self::API_BASE_URL . "/bav";

            // init the resource
            $ch = curl_init();
            curl_setopt_array($ch, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $postData
                //,CURLOPT_FOLLOWLOCATION => true
            ));

            //Ignore SSL certificate verification
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


            //get response
            $output = curl_exec($ch); // '{ "type": "success", "message": "abc" }';

            //Print error if any
            if(curl_errno($ch)) {
                // echo 'error:' . curl_error($ch);
                $result['status'] = 201;
                $result['message'] = 'Internal Error'; // 'Curl Error..';
            }
            else {
                curl_close($ch);
                $output_arr = json_decode($output, true);

                if(json_last_error_msg() === "No error" && is_array($output_arr)) {
                    if(isset($output_arr['status']) && (string)$output_arr['status'] === '0') {
                        $result = $output_arr;
                    }
                    elseif(isset($output_arr['status']) && isset($output_arr['message'])) {
                        $result = $output_arr;
                    }
                    else {
                        $result = [
                            'status' => 202,
                            'message' => 'Insufficient Output',
                            'output' => $output,
                        ];
                    }
                }
                else {
                    $result = [
                        'status' => 203,
                        'output' => $output,
                        'message' => json_last_error_msg()
                    ];
                }
            }
        }
        catch(\Exception $exception) {
            $result['status'] = 204;
            $result['message'] = $exception->getMessage();
        }

        $this->result = $result;

        return $this->result;
    }



    public function aadhaar($aadhaar_number): array
    {
        $result = [];
        try {
            $postData = array(
                'api_key' => $this->authKey,
                'aadhaar_number' => $aadhaar_number,
            );

            //API URL
            $url = self::API_BASE_URL . "/aadhaar";

            // init the resource
            $ch = curl_init();
            curl_setopt_array($ch, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $postData
                //,CURLOPT_FOLLOWLOCATION => true
            ));

            //Ignore SSL certificate verification
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


            //get response
            $output = curl_exec($ch); // '{ "type": "success", "message": "abc" }';

            //Print error if any
            if(curl_errno($ch)) {
                // echo 'error:' . curl_error($ch);
                $result['status'] = 201;
                $result['message'] = 'Internal Error'; // 'Curl Error..';
            }
            else {
                curl_close($ch);
                $output_arr = json_decode($output, true);

                if(json_last_error_msg() === "No error" && is_array($output_arr)) {
                    if(isset($output_arr['status']) && (string)$output_arr['status'] === '0') {
                        $result = $output_arr;
                    }
                    elseif(isset($output_arr['status']) && isset($output_arr['message'])) {
                        $result = $output_arr;
                    }
                    else {
                        $result = [
                            'status' => 202,
                            'message' => 'Insufficient Output',
                            'output' => $output,
                        ];
                    }
                }
                else {
                    $result = [
                        'status' => 203,
                        'output' => $output,
                        'message' => json_last_error_msg()
                    ];
                }
            }
        }
        catch(\Exception $exception) {
            $result['status'] = 204;
            $result['message'] = $exception->getMessage();
        }

        $this->result = $result;

        return $this->result;
    }



}