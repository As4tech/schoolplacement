<?php 
function validateimg($image)
{
$imgname=$image['image']['name'];
$imgtemp=$image['image']['tmp_name'];
$imgtype=$image['image']['type'];
$imgsize=$image['image']['size'];

if(empty($imgname)){
 return "please select a file";
}
$finfo=new finfo(FILEINFO_MIME_TYPE);
$filetype= $finfo->file($imgtemp);

$imgallowedtype=["image/jpg","image/jpeg","image/png","image/gif"];
if(!in_array($filetype,$imgallowedtype)){
return "Your chosen file is not a valid image type";
}
$maxsize=2*1024*1024;//2MB
if($imgsize > $maxsize){
    return "Image must not be lager than 2MB";
}

$str="0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
$length=50;
$shufledstr=str_shuffle($str);
$newname=substr($shufledstr,0,$length);

$extension=pathinfo($imgname,PATHINFO_EXTENSION);
$imgname=$newname.".".$extension;

$images=glob("enrolcodepic/*.*");
if(in_array("enrolcode_pic/".$imgname,$images)){
    return "image already exist in the folder";
}

$movefile=move_uploaded_file($imgtemp,"enrolcode_pic/".$imgname);
if($movefile==false){
    return "File not saved. please try Again";
}
return "success";
} 
?>