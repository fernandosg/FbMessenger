<?php
  class Messenger{
    var $access_token;
    var $id_page;
    var $input;
    var $sender;
    var $message;
    var $url;
    var $handler;

    /*
      Receiving configuration variables
    */
    function __construct($access_token,$id_page,$input){
      $this->access_token=$access_token;
      $this->id_page=$id_page;
      $this->input=$input;
      $this->url = 'https://graph.facebook.com/v2.6/'.$id_page.'/messages?access_token='.$access_token;
    }

    /* Creating some necessary variables */
    function init(){
      if(isset($_REQUEST['hub_challenge'])) {
        $challenge = $_REQUEST['hub_challenge'];
        $hub_verify_token = $_REQUEST['hub_verify_token'];
        echo $challenge;
      }else{
        $this->sender = $input['entry'][0]['messaging'][0]['sender']['id'];
        $this->message = $input['entry'][0]['messaging'][0]['message']['text'];
        $this->handler = curl_init($this->url);
      }
    }
    /*
      Send a message. This method only send a simple message text
    */
    function sendMessage($message_to_reply){
      $info_to_send = '{
        "recipient":{
          "id":"' . $this->sender . '"
        },
        "message":{
          "text":"'.$message_to_reply.'"
        }
      }';

      curl_setopt($this->handler, CURLOPT_POST, 1);
      curl_setopt($this->handler, CURLOPT_POSTFIELDS, $info_to_send);
      curl_setopt($this->handler, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      if (!empty($this->input['entry'][0]['messaging'][0]['message'])) {
        $result = curl_exec($this->handler);
      }
    }
  }
?>
