<?php

$form=$_GET["form"];
$img_id=$_GET["id"];
$url=$_SERVER['HTTP_HOST'];

if ($form=="json"&&$img_id=="") {
    $img_id=rand(1,2400);
    header('Content-Type:application/json; charset=utf-8');
    exit("{'code':200,'version':'v1','license':'By Xuan','imgurl':'https://$url/img/$img_id.png'}");
}elseif ($form==""&&$img_id=="") {
    $img_id=rand(1,2400);
    header('content-type:image/png;');
    $content=file_get_contents("./$img_id.png");
    echo $content;
}elseif ($form=="json") {
    $img_id=intval($img_id);
    if (is_int($img_id)&&$img_id>=1&&$img_id<=2400) {
        header('Content-Type:application/json; charset=utf-8');
        exit("{'code':200,'version':'v1','license':'By Xuan',imgurl:'https://$url/img/$img_id.png'}");
    }else {
        echo($img_id);
        header('Content-Type:application/json; charset=utf-8');
        exit("{'code':404,'version':'v1','license':'By Xuan','message':'Error'}");
    }
    
}else{
    $img_id=intval($img_id);
    if (is_int($img_id)&&$img_id>=1&&$img_id<=2400) {
        header('content-type:image/png;');
        $content=file_get_contents("./$img_id.png");
        echo $content;
    }else {
        header('Content-Type:application/json; charset=utf-8');
        exit("{'code':404,'version':'v1','license':'By Xuan','message':'Error'}");
    }
    
}


?>