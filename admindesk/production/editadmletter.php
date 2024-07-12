<?php
require("secured.php");
require("connect.php");
require("encryption.php");
$id=$_GET['id'];
$aid=decript($id);
$letter=mysqli_query($conn,"select * from admisletter where id='$aid'");
$letarray=mysqli_fetch_array($letter);
?>
<html lang="en">
    
  <head>
	<?php 
        require("formhead.php");
    ?>
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
			<?php 
			require("sidebar.php");
			?>
			</div>

			<!-- top navigation -->
			<?php
			require("topnav.php");
			?>
			<!-- /top navigation -->

			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					
					<div class="clearfix"></div>
                    <form class="" enctype="multipart/form-data" action="" method="post" novalidate>
                        <?php 
                        
                        if(isset($_POST['update']))
						{
                            $admisletter=mysqli_real_escape_string($conn,$_POST['letter']);
                            $schlname=mysqli_real_escape_string($conn,$_POST['schlname']);
							$headname=mysqli_real_escape_string($conn,$_POST['hname']);
							$srefrence=mysqli_real_escape_string($conn,$_POST['refrence']);
							$letter=$_FILES['picture']['name'];
							$lethead=$_FILES['picture']['tmp_name'];
							$location="letter/";
							move_uploaded_file($lethead,"$location".$letter);
                            $tdate=mysqli_real_escape_string($conn,$_POST['tdate']);
							
							$picname=$_FILES['pic']['name'];
							$headsign=$_FILES['pic']['tmp_name'];
							$location="signatures/";
							move_uploaded_file($headsign,"$location".$picname);
							if(!empty($lethead) AND !empty($headsign))
							{
								require("connect.php"); 
								$admission=mysqli_query($conn,"select * from admisletter where schoolname='$schlname'")or die(mysqli_error($conn));
								$cletters=mysqli_num_rows($admission);
								if($cletters=="1")
								{
								$update=mysqli_query($conn,"update admisletter set schoolname='$schlname',letter='$admisletter',headname='$headname',headsign='$picname',refrence='$srefrence',letterhead='$letter',tdate='$tdate' WHERE id='$aid'");
									if($update)
									{
									echo"<script>
									alert('RECORD SUCCESSFULLY UPDATED');
									window.location='viewletter.php';
									</script>";
									}else
									{
										echo"<script>
										alert('FAILED UPDATING RECORD');
										window.location='viewletter.php';
										</script>";
									}  
								
								
								}
							}elseif(!empty($lethead) AND empty($headsign))
							{
								move_uploaded_file($_FILES['picture']['tmp_name'],"$location".$letter);
								require("connect.php"); 
								$admission=mysqli_query($conn,"select * from admisletter where schoolname='$schlname'")or die(mysqli_error($conn));
								$cletters=mysqli_num_rows($admission);
								if($cletters=="1")
								{
								$update=mysqli_query($conn,"update admisletter set schoolname='$schlname',letter='$admisletter',headname='$headname',refrence='$srefrence',letterhead='$letter',tdate='$tdate' WHERE id='$aid'");
									if($update)
									{
									echo"<script>
									alert('RECORD SUCCESSFULLY UPDATED WITHOUT HEAD SIGNATURE');
									window.location='viewletter.php';
									</script>";
									}else
									{
										echo"<script>
										alert('FAILED UPDATING RECORD');
										window.location='viewletter.php';
										</script>";
									}  
								
								
								}
							}elseif(!empty($headsign) AND empty($lethead))
							{
								move_uploaded_file($_FILES['pic']['tmp_name'],"$location".$picname);
								require("connect.php"); 
								$admission=mysqli_query($conn,"select * from admisletter where schoolname='$schlname'")or die(mysqli_error($conn));
								$cletters=mysqli_num_rows($admission);
								if($cletters=="1")
								{
								$update=mysqli_query($conn,"update admisletter set schoolname='$schlname',letter='$admisletter',headname='$headname',headsign='$picname',refrence='$srefrence',tdate='$tdate' WHERE id='$aid'");
									if($update)
									{
									echo"<script>
									alert('RECORD SUCCESSFULLY UPDATED WITHOUT LETTER HEAD');
									window.location='viewletter.php';
									</script>";
									}else
									{
										echo"<script>
										alert('FAILED UPDATING RECORD');
										window.location='viewletter.php';
										</script>";
									}  
								
								
								}
							}
							else
							{
								$ediit=mysqli_query($conn,"update admisletter set schoolname='$schlname',letter='$admisletter',headname='$headname',refrence='$srefrence',tdate='$tdate' WHERE id='$aid'");
									if($ediit)
									{
									echo"<script>
									alert('RECORD UPDATED');
									window.location='viewletter.php';
									</script>";
									}
							}
							
                        }
                        ?>
					<div class="col-md-12 col-sm-12 ">
						<div class="x_panel">
							
							<div class="x_content">
								<div id="alerts"></div>
								<div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor-one">
									<div class="btn-group">
										<a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
										<ul class="dropdown-menu">
										</ul>
									</div>

									<div class="btn-group">
										<a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
										<ul class="dropdown-menu">
											<li>
												<a data-edit="fontSize 5">
													<p style="font-size:17px">Huge</p>
												</a>
											</li>
											<li>
												<a data-edit="fontSize 3">
													<p style="font-size:14px">Normal</p>
												</a>
											</li>
											<li>
												<a data-edit="fontSize 1">
													<p style="font-size:11px">Small</p>
												</a>
											</li>
										</ul>
									</div>

									<div class="btn-group">
										<a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
										<a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
										<a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
										<a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
									</div>

									<div class="btn-group">
										<a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
										<a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
										<a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
										<a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
									</div>

									<div class="btn-group">
										<a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
										<a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
										<a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
										<a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
									</div>

									<div class="btn-group">
										<a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
										<div class="dropdown-menu input-append">
											<input class="span2" placeholder="URL" type="text" data-edit="createLink" />
											<button class="btn" type="button">Add</button>
										</div>
										<a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
									</div>

									<div class="btn-group">
										<a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
										<input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
									</div>

									<div class="btn-group">
										<a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
										<a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
									</div>
								</div>

					        <div><textarea name="letter" id="descr"  class="editor-wrapper"  style="width:100%; height:50%"><?php echo $letarray['letter'] ?></textarea></div><br>
								<div class="field item form-group">
								<label class="col-form-label col-md-3 col-sm-3  label-align">Select School<span
                                class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                      
                                        <select name="schlname" class="form-control">
                                        <option><?php echo $letarray['schoolname'] ?></option>
                                        <?php
                                        require("connect.php");
                                        $level=mysqli_query($conn,"SELECT * FROM schoolinfo");
                                        WHILE($levelarray=mysqli_fetch_array($level))
                                        {
                                            echo
                                            "
                                            <option required>$levelarray[schoolname]</option>
                                            ";
                                        }
                                        ?>
                                            
                                            
                                        </select>
                                    </div>
                                </div>
								<div class="field item form-group">
									<label class="col-form-label col-md-3 col-sm-3  label-align">Headmaster Name<span class="required">*</span></label>
									<div class="col-md-6 col-sm-6">
										<input class="form-control" value="<?php echo $letarray['headname'] ?>" data-validate-length-range="6" data-validate-words="2" name="hname" placeholder="" required="required" />
									</div>
								</div>
								<div class="field item form-group">
									<label class="col-form-label col-md-3 col-sm-3  label-align">Headmaster Signature<span class="required">*</span></label>
									<div class="col-md-6 col-sm-6">
									<input class="form-control" type="file" name="pic" class='optional' /></div>
								</div>
								<div class="field item form-group">
								<label class="col-form-label col-md- col-sm-3  label-align">Letter Heading<span class="required">*</span></label>
								<div class="col-md-6 col-sm-6">
								<textarea id="message" style="width:100%" required="required" class="field item form-group" name="refrence" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10"><?php echo $letarray['refrence'] ?></textarea>
								</div>
								</div>
								<div class="field item form-group">
									<label class="col-form-label col-md-3 col-sm-3  label-align">School Letter Head<span class="required">*</span></label>
									<div class="col-md-6 col-sm-6">
										<input class="form-control" type="file" name="picture" class='optional' /></div>
								</div>
								<label class="col-form-label col-md-3 col-sm-3  label-align">Date<span
										class="required">*</span></label>
									<div class="col-md-6 col-sm-6">
										<input class="form-control" value="<?php echo $letarray['tdate'] ?>" class='date' type="date" name="tdate" required='required'></div>
									</div>
								<div class="ln_solid"></div>
                                <button type='submit' style="margin-left:19rem;font-weight:bold" name="update" class="btn btn-success">Update</button>
							
							</div>
						</div>
					</div>
                    </form>
					</div>
				</div>
			</div>
			<!-- /page content -->

			<!-- footer content -->
			<footer>
			<?php 
                require("indexfoot.php");
               ?>
			</footer>
			<!-- /footer content -->
		</div>
	</div>

	<!-- jQuery -->
	<script src="../vendors/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script>
		let letter=$("#editor-one").val;
	</script>
	<script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<!-- FastClick -->
	<script src="../vendors/fastclick/lib/fastclick.js"></script>
	<!-- NProgress -->
	<script src="../vendors/nprogress/nprogress.js"></script>
	<!-- bootstrap-progressbar -->
	<script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
	<!-- iCheck -->
	<script src="../vendors/iCheck/icheck.min.js"></script>
	<!-- bootstrap-daterangepicker -->
	<script src="../vendors/moment/min/moment.min.js"></script>
	<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
	<!-- bootstrap-wysiwyg -->
	<script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
	<script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
	<script src="../vendors/google-code-prettify/src/prettify.js"></script>
	<!-- jQuery Tags Input -->
	<script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
	<!-- Switchery -->
	<script src="../vendors/switchery/dist/switchery.min.js"></script>
	<!-- Select2 -->
	<script src="../vendors/select2/dist/js/select2.full.min.js"></script>
	<!-- Parsley -->
	<script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
	<!-- Autosize -->
	<script src="../vendors/autosize/dist/autosize.min.js"></script>
	<!-- jQuery autocomplete -->
	<script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
	<!-- starrr -->
	<script src="../vendors/starrr/dist/starrr.js"></script>
	<!-- Custom Theme Scripts -->
	<script src="../build/js/custom.min.js"></script>

</body></html>
