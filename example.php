<?php
  include("Messenger.php");
  $accesstoken="YOURACCESSTOKEN";
  $page_id=7778878888;//YOUR PAGE_ID
  $msn=new Messenger($accesstoken,$page_id,json_decode(file_get_contents('php://input'), true));
  $msn->init();
  $msn->sendMessage("This should be sending to the user after he/she interact with your bot");
?>
