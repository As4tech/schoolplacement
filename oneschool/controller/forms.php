<?php 
SESSION_START();
require("../model/model.php");
//require("../connect.php");
require("../../admindesk/production/connect.php");
require("../encryption.php");
if(isset($_POST['loginbtn']))
{
    $tid=$_POST['accesscode'];
    $login=models::dbview($pdo,"students","*","tid='$tid' and paystatus='1' || enrollcode='$tid' and paystatus='1'");
    $json=json_decode($login);
    $count=count($json);
    if($count=="1"){
        	        $_SESSION['schlname']=$json[0]->schlname;
                    $ss=urlencode(encript($_SESSION['schlname']));
					$_SESSION['program']=$json[0]->programme;
                    $_SESSION['track']=$json[0]->track;
                    $_SESSION['status']=$json[0]->sstatus;
                    $_SESSION['gender']=$json[0]->gender;
                    $_SESSION['aggregate']=$json[0]->aaggregate;
					$_SESSION['indexnum']=$json[0]->studentindex;
                    $ii=urlencode(encript($_SESSION['indexnum']));
					$_SESSION['studentname']=$json[0]->studname;
                    $_SESSION['hse']=$json[0]->house;
                    $_SESSION['admstatus']=$json[0]->admstatus;
                    $_SESSION['religion']=$json[0]->religion;
                    $_SESSION['jhsaddress']=$json[0]->jhsaddress;
                    $_SESSION['region']=$json[0]->region;
                    $_SESSION['district']=$json[0]->district;
                    $_SESSION['pname']=$json[0]->pname;
                    $_SESSION['pcontact']=$json[0]->pcontact;
                    $_SESSION['hseaddress']=$json[0]->hseaddress;
					if($_SESSION['indexnum']=$json[0]->studentindex){
                        if($_SESSION['admstatus']==1){
                            $_SESSION['opuname']='101554@!&%3xxp';
                            $_SESSION['uname']='11aA554@!&%5';  
                            
                           echo  $as=$ii."||"."100"."||".$ss;
                          // echo 100;
                           
                           //$_SESSION['indexnum']=$json[0]->studentindex;
                        }
						else{
                            //echo 200;
                            $_SESSION['opuname']='101554@!&%3xxp';
                            $_SESSION['uname']='11aA554@!&%5';    
                            echo  $as=$ii."||"."200"."||".$ss; 
                        }
					}
				    //echo"<script>window.location='./stagetwo.php';</script>";
       // echo"<script>window.location='./studdashboard.php';</script>";    

    }else{
        echo "
        <script>
        alert('sorry wrong');
        </script>
        ";
    }
}
if(isset($_POST['verifybtn']))
{

	$indexnum=$_POST['indexnum'];
    $table="students";

    $view=models::dbview($pdo,$table,"tid","studentindex='$indexnum'");
    $json=json_decode($view);


    $tid= $json[0]->tid;    
	$url="https://paystack.com/pay/as4tech";
	$data=json_encode(array("tid"=>$tid));
    $curl=models::curlpost($url,$data);
    if($curl=="1"){
        $tidupdate=models::update($pdo,$table,"paystatus='1'","tid='$tid'");
        if($tidupdate=="updated")
        {
            echo $curl;
            //$sms=models::sms($senderid,$message,$contact);
        }
        else
        {
            echo 0;
        }
    }
	
}

if(isset($_POST['momobtn']))
{
    $phonenumber=$_POST['phonenumber'];
    $indexnum=$_POST['indexnum'];
    $table="students";
    $tid=rand(4,10000);
    $vtid=models::dbview($pdo,"$table","*","tid='$tid'");
    $jjson=json_decode($vtid);
    $ctid=count($jjson);
    if($ctid=="1"){
        $tid=rand(4,10000);
        }
    $upated=models::update($pdo,$table,"tid='$tid',paynum='$phonenumber'","studentindex='$indexnum'");
    if($upated=="updated")
    {
        $data=json_encode(array("contact"=>$phonenumber,"mamount"=>0,"amount"=>0.1,"tid"=>$tid,"staff"=>"Mutaka"));
        $url="https://paystack.com/pay/as4tech";
        $curl=models::curlpost($url,$data);
        echo $curl;
    } 
   

}


			if(isset($_POST['checkform']))
			{
				$schlname=$_POST['schlname'];
				$indexnum=$_POST['indexnum'];
				$stud=models::dbview($pdo,"students","*","studentindex='$indexnum' and schlname='$schlname'");
				$json=json_decode($stud);
				$count=count($json);
				if($count==1)
				{
                    echo 1000;
				 	//$_SESSION['schlname']=$json[0]->schlname;
				 	//$_SESSION['indexnum']=$json[0]->studentindex;
				 	//$_SESSION['studentname']=$json[0]->studname;
                    
				//     echo"<script>window.location='./stagetwo.php';</script>";
				 }
				else
				{
                    echo 2000;

					// echo
					// "
					// <script>
					// alert('Sorry Incorrect Index Number Or Wrong School Selection');
					// window.location='index.php';
					// </script>
					// ";
				}
			}
           
			?>