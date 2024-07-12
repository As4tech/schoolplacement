<?php 
require("studsecret.php");
require("connect.php");
$region=$_GET['region'];
if(isset($_GET["region"])){
    echo'
           <div class="col-12">
            <label class="input-label">District</label><span id="" class="required">
            <div class="field item form-group"> 
            <select name="district" id="" class="form-control" required>';
               echo"<option> </option>";
                $dist=mysqli_query($conn,"SELECT * FROM districts where region='$region'");
                WHILE($distarray=mysqli_fetch_array($dist))
                {
                    echo
                    "
                    <option>$distarray[district]</option>
                    ";
                }
                echo'</select> </div></div>
       
        ';
}else{
    ?>
    
    
<?php
}
?>