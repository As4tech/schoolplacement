<?php
require("session.php");
require("encryption.php");
require("connect.php");
$oldpass=$_GET['pass'];
$user=mysqli_query($conn,"SELECT * FROM users WHERE username='$_SESSION[username]'");
$cuser=mysqli_fetch_array($user);
$cpass=$cuser['upassword'];
$cdpass=decript($cpass);
if($oldpass==$cdpass)
{
					echo'			  
                    <div class="field item form-group">
											<label class="col-form-label col-md-3 col-sm-3  label-align">New Password<span class="required">*</span></label>
											<div class="col-md-6 col-sm-6">
												<input class="form-control" type="password" id="password1" name="password" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).{6,16}" required />
												
												<span style="position: absolute;right:15px;top:7px;" onclick="hideshow()" >
													<i id="slash" class="fa fa-eye-slash"></i>
													<i id="eye" class="fa fa-eye"></i>
												</span>
											</div>
										</div>
                                        
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Repeat password<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="password" name="cpassword" data-validate-linked="password" required="required" /></div>
                                        </div>
										<div class="col-md-6 offset-md-3">
                                                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                                                    
                                                </div>
                    ';
}else{
    echo'
    <div class="col-md-6 offset-md-3">
    <button   class="btn btn-danger">PASSWORD DOES NOT MATCH</button>
    
</div>
    ';
}
					
?>