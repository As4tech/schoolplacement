<?php
class models{
  
  public static function curlpost($url,$data){
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>$data,
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}
   
    public static function dbview($pdo,$table,$fields,$condition)
    {
        try{
            $query=$pdo->prepare("select  $fields  from $table where $condition");
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute();
            $results=$query->fetchAll();
            $json=json_encode($results);
            return $json;
          }
          catch(PDOException $e)
          {
            return $e->getCode();
          }        
    }



    public static function update($pdo,$table,$fields,$condition)
    {
        try{
            $query=$pdo->prepare("update $table  set $fields  where $condition");
            $query->execute();
            if($query){
                return "updated";
            }
          
          }
          catch(PDOException $e)
          {
            return $e->getCode();
          }
                   
    }

    
    public static function delete($pdo,$table,$condition)
    {
        try{
            $query=$pdo->prepare("delete from $table where $condition");
            $query->execute();
            $error=$query->errorInfo();
            if($error[1]==null)
            return 1000;
            return $error[2];
          }
          catch(PDOException $e)
          {
            return $e->getCode();
          }
                   
    }


    public static function dbinsert($pdo,$table,$datas)
    {
      $columns=null;
      $val=null;
      foreach($datas as $key => $valued)
        {
            $val.=":$key,";
            $columns.="$key,";
            $datas[$key]=htmlentities($valued);
        }

        $columns=trim($columns,",");
        $val=trim($val,",");    
        try{
        $query=$pdo->prepare("insert into $table($columns)values($val)");
        $query->execute($datas);
        $error=$query->errorInfo();
          if($error[1]==null)
          return $error[0];
          return $error[1];
        }
        catch(PDOException $e)
        {
          return $e->getCode();	
        }
    }
    public static function sms($senderid,$message,$contact)
    {
    $key="dFNXenVmcHlNam94S25sTkdPUWU";
    $url="https://sms.kologsoft.com/sms/api?action=send-sms&api_key=dFNXenVmcHlNam94S25sTkdPUWU&to=0543963092&from=WULSEC&sms=$message";
   // https://sms.kologsoft.com/sms/api?action=send-sms&api_key=dFNXenVmcHlNam94S25sTkdPUWU&to=PhoneNumber&from=SenderID&sms=YourMessage
    //$url="https://sms.kologsoft.com/sms/api?action=send-sms&api_key=$key&to=$contact&from=SenderID&sms=".urlencode($message);
    $curl=curl_init();
    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt($curl,CURLOPT_URL,$url);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
    $response=curl_exec($curl);
    curl_close($curl);
    $json=json_decode($response);
      }

}



?>