<?php
  include("Messenger.php");
  $accesstoken="YOURACCESSTOKEN";
  $page_id=7778878888;//YOUR PAGE_ID
  $msn=new Messenger($accesstoken,$page_id,json_decode(file_get_contents('php://input'), true));
  $msn->init();
  if($msn->isPostbackLike("ACCEPTING")){
    $msn->sendMessage("Thanks for accepting");
  }else if($msn->isPostbackLike("NOT_ACCEPTING")){
    $msn->sendMessage("Maybe the next time =/");
  }else{
    $msn->sendMessageWithButton("This is the message that should be displayed in the box of button selection","Yes");
    $msn->sendMessageWithMultipleButtons("This is the message that should be displayed in the box of multiple button selection",array(array("type"=>"postback","title"=>"I am agree","payload"=>"ACCEPTING"),array("type"=>"postback","title"=>"I am not agree","payload"=>"NOT_ACCEPTING")));
  }
?>
