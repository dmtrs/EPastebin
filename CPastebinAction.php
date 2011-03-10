<?php
class CPastebinAction extends CAction
{
    public function run()
    {
        if(isset($_POST)) {
            $params =  http_build_query($_POST);
            $url = 'http://pastebin.com/api/api_post.php';
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_POST, true); 
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
            curl_setopt($ch, CURLOPT_VERBOSE, 1); 
            curl_setopt($ch, CURLOPT_NOBODY, 0); 

            $response = curl_exec($ch);
            $success = (strpos($response, "Bad") === 0 ) ? false : true;
            $message = ($success) ? CHtml::link($response, $response) : $response ;
                
            $data = array(
                "success"=>$success,
                "message"=>$message
            );
            echo CJSON::encode($data);
        }
    }
}
