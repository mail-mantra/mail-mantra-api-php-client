<?php

namespace MailMantra;

class Smtp
{
    private const API_BASE_URL = 'https://smtp1.mailmantra.com/api';
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

    public function mail($to, $subject, $body, $attachments = null)
    {
        try {
            $post_data = array(
                'api_key' => $this->authKey,
                'to' => $to,
                'subject' => $subject,
                'message' => $body
            );

            if(is_array($attachments) && count($attachments)) {
                $post_data['attachments'] = $attachments;
            }

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => self::API_BASE_URL . '/mail/v1',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => http_build_query($post_data),
            ));

            $output = curl_exec($curl);

            //Print error if any
            if(curl_errno($curl)) {
                // echo 'error:' . curl_error($ch);
                $result['status'] = 201;
                $result['message'] = 'Internal Error'; // 'Curl Error..';
            }
            else {

                curl_close($curl);

                // {"message":"376466724f44313832333830","type":"success"}
                // {"message":"Authentication failure","type":"error"}
                $output_arr = json_decode($output, true);

                if(json_last_error_msg() === "No error") {
                    if((string)$output_arr['status'] === '0') {
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
                        'message' => json_last_error_msg(),
                        'output' => $output,
                    ];
                }
            }

        }
        catch(\Exception $exception) {
            $result = [
                'status' => 204,
                'message' => $exception->getMessage()
            ];
        }

        $this->result = $result;

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

}