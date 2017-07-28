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
    $first_buttons=array(array("type"=>"web_url","url"=>"https://www.generictemplatetesting.com","title"=>"View website when click"),array("type"=>"postback","title"=>"start chating","payload"=>"VIEW_WEBSITE_GTEMPLATE"));
    $first_element=array("title"=>"This is the first element in generic template","image_url"=>"https://yt3.ggpht.com/-yz_glt4VwG4/AAAAAAAAAAI/AAAAAAAAAAA/ODIt197blfI/s900-c-k-no-mo-rj-c0xffffff/photo.jpg","subtitle"=>"The first example with GoT image, because i like GoT :P","buttons"=>$first_buttons);
    $second_element=array("title"=>"This is the second element in generic template","image_url"=>"http://ll-c.ooyala.com/e1/c0djFjYjE6U5NGcro1cP7Hbb8zjf46jj/promo319951871","subtitle"=>"The second example with GoT image.","buttons"=>$first_buttons);
    $buttons_for_generic_template=array($first_element,$second_element);
    $msn->sendDefaultGenericTemplate($buttons_for_generic_template);
    $msn->sendMessageWithButton("This is the message that should be displayed in the box of button selection","Yes");
    $msn->sendMessageWithMultipleButtons("This is the message that should be displayed in the box of multiple button selection",array(array("type"=>"postback","title"=>"I am agree","payload"=>"ACCEPTING"),array("type"=>"postback","title"=>"I am not agree","payload"=>"NOT_ACCEPTING")));
  }
?>
