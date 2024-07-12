<?php 
require("session.php");
?>
<html lang="en">
  <head>
    <?php 
	require("topmenu.php");
	?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <?php 
			require("connect.php");
			$level=mysqli_query($conn,"select * from accesslevel");
			if($_SESSION['level']=="Super Admin")
			{
			require("sidebar.php");
			}else
			{
				require("sidebartwo.php");
			}
			?>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <?php 
		require("topnav.php");
		?>
        <!-- /top navigation -->
            
		 
			
        <!-- page content -->
        <div class="right_col" role="main">
          <?php  
          require("connect.php");
          if($_SESSION['level']=="Super Admin")
          {?>
           
            <form action="" method="POST" style="padding-left:30px">
            <div class="col-md- col-sm-3" style="margin-left:200px">
							  <select name="schlname"  class="form-control">
							  <option></option>
                <?php
                  $level=mysqli_query($conn,"SELECT * from schoolinfo");
                  while($levelarray=mysqli_fetch_array($level))
                  {
                    echo"<option>$levelarray[schoolname]</option>";
                  }
							  ?>
							  </select>
						</div>
			<button class="btn btn-primary" name="submit">Submit</button>
			</form>';
              <?php }
              else{?>

                 <?php }
          ?>
 
              <div class="col-md-12 col-sm-12 ">
              
                

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
       
     </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>               
            
                <div class="x_panel">
                  <div class="x_title">
                    
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                    </ul>
					<?php
          if(isset($_POST['schlname']))
				  {
					  $schlname=$_POST['schlname'];
					  echo"<h2 style='color:blue;font-weight:bold;text-transform:uppercase;font-size:30px'>ADMITTED STUDENTS of $schlname </h2>";
				  }else
				  {
					  
				  }
				  ?>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                   <table id="datatable-buttons" cellspacing="0" class="table table-striped table-bordered" style="width:100%">
                      <?php 
					  if(isset($_POST['submit']))
					  {
							  echo"<thead>
                        <tr>
                        <th>#</th>
                        <th>SCHOOL NAME</th>
                        <th>INDEX NUMBER</th>
                        <th>STUDENT NAME</th>
                        <th>GENDER</th>
                        <th>AGGREGATE</th>
                        <th>PROGRAM</th>
                        <th>TRACK</th>
                        <th>STATUS</th>
                        <th>HOUSE</th>
                        <th>ACTION</th>
                        </tr>
                      </thead>
					  <tbody>";
					  
					
					require("connect.php");
					require("encryption.php");
					$members=mysqli_query($conn,"select * from students where schlname='$schlname'");
          $ar=mysqli_fetch_array($members);
          $scc=$ar['schlname'];
          $scl=urlencode(encript($scc));
					$count=1;
					while($viewenrolment=mysqli_fetch_array($members))
						{
              $sindex=urlencode(encript($viewenrolment['id']));
              $scl=urlencode(encript($viewenrolment['schlname']));
							echo"<tr>";
              echo"<td>".$count++."</td>";
              echo"<td>$viewenrolment[schlname]</td>";
              echo"<td>$viewenrolment[studentindex]</td>";
              echo"<td>$viewenrolment[studname]</td>";
              echo"<td>$viewenrolment[gender]</td>";
              echo"<td>$viewenrolment[aaggregate]</td>";
              echo"<td>$viewenrolment[programme]</td>";
              echo"<td>$viewenrolment[track]</td>";
              echo"<td>$viewenrolment[sstatus]</td>";
              echo"<td>$viewenrolment[house]</td>";
              echo"<td><a onclick='return confirm(\"Modify Record\")' href='editenrol.php?id=$sindex&scl=$scl' class='fa fa-edit' class='fa fa-edit' style='color:blue;font-size:25px;'></a>
              <button onclick='modalfunction(\"$viewenrolment[codepic]\",\"$viewenrolment[studname]\")' id='$viewenrolment[studentindex]' type='button' name='pic' class='btn btn-primary' style='font-size:20px;color:white;font-weight:bold' data-toggle='modal' data-target='.bs-example-modal-lg'>View</button>             
              </td>";

							echo"</tr>";  
						}
            echo"<a class='btn btn-primary' onclick='return confirm(\"Empty School data\")' href='empt.php?scl=$scl'>Clear Records</a>";
					}
          elseif($_SESSION['level']=="Super Admin")
          {?>
            <thead >
                        <tr>
                        <th>#</th>
                        <th>SCHOOL NAME</th>
                        <th>INDEX NUMBER</th>
                        <th>STUDENT NAME</th>
                        <th>GENDER</th>
                        <th>AGGREGATE</th>
                        <th>PROGRAM</th>
                        <th>TRACK</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                        </tr>
                      </thead>
					  <tbody>
					  
					<?php 
					require("connect.php");
                    require("encryption.php");
					$date=date('Y-m-d');
					$studs=mysqli_query($conn,"select * from students");
					$count=1;
					while($venrolment=mysqli_fetch_array($studs))
					{
            $sindex=urlencode(encript($venrolment['id']));
            $scl=urlencode(encript($venrolment['schlname']));
                        echo"<tr>";
                          echo"<td>".$count++."</td>";
                          echo"<td>$venrolment[schlname]</td>";
                          echo"<td>$venrolment[studentindex]</td>";
                          echo"<td>$venrolment[studname]</td>";
                          echo"<td>$venrolment[gender]</td>";
                          echo"<td>$venrolment[aaggregate]</td>";
                          echo"<td>$venrolment[programme]</td>";
                          echo"<td>$venrolment[track]</td>";
                          echo"<td>$venrolment[sstatus]</td>";
                          echo"<td><a onclick='return confirm(\"Modify Record\")' href='editenrol.php?id=$sindex&scl=$scl' class='fa fa-edit' style='color:blue;font-size:25px;font-weight:bold'></a>
                          <a onclick='return confirm(\"Delete Record\")' href='delenrol.php?id=$sindex' class='fa fa-trash' style='color:red;font-size:25px;font-weight:bold'></a>
                          <button onclick='modalfunction(\"$venrolment[codepic]\",\"$venrolment[studname]\")' id='$venrolment[studentindex]' type='button' name='pic' class='btn btn-primary' style='font-size:20px;color:white;font-weight:bold' data-toggle='modal' data-target='.bs-example-modal-lg'>View</button></td>";
                          echo"</tr>";
          }
          echo"<a class='btn btn-primary' onclick='return confirm(\"Empty table\")' href='empt.php'>Clear Records</a>";
        }
					else
					{?>
                      <thead >
                        <tr>
                        <th>#</th>
                        <th>SCHOOL NAME</th>
                        <th>INDEX NUMBER</th>
                        <th>STUDENT NAME</th>
                        <th>GENDER</th>
                        <th>AGGREGATE</th>
                        <th>PROGRAM</th>
                        <th>TRACK</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                        </tr>
                      </thead>
					  <tbody>
					  
					<?php 
					require("connect.php");
          require("encryption.php");
					$date=date('Y-m-d');
					$studs=mysqli_query($conn,"select * from students where schlname='$_SESSION[schlname]'");
					$count=1;
					while($venrolment=mysqli_fetch_array($studs))
					{
            $sindex=urlencode(encript($venrolment['id']));
            $scl=urlencode(encript($venrolment['schlname']));
                        echo"<tr>";
                          echo"<td>".$count++."</td>";
                          echo"<td>$venrolment[schlname]</td>";
                          echo"<td>$venrolment[studentindex]</td>";
                          echo"<td>$venrolment[studname]</td>";
                          echo"<td>$venrolment[gender]</td>";
                          echo"<td>$venrolment[aaggregate]</td>";
                          echo"<td>$venrolment[programme]</td>";
                          echo"<td>$venrolment[track]</td>";
                          echo"<td>$venrolment[sstatus]</td>";
                          echo"<td><a onclick='return confirm(\"Modify Record\")' href='editenrol.php?id=$sindex&scl=$scl' class='fa fa-edit' style='color:blue;font-size:25px;font-weight:bold'></a>
                          <a onclick='return confirm(\"Delete Record\")' href='delenrol.php?id=$sindex' class='fa fa-trash' style='color:red;font-size:25px;font-weight:bold'></a>
                          <button onclick='modalfunction(\"$venrolment[codepic]\",\"$venrolment[studname]\")' id='$venrolment[studentindex]' type='button' name='pic' class='btn btn-primary' style='font-size:20px;color:white;font-weight:bold' data-toggle='modal' data-target='.bs-example-modal-lg'>View</button></td>";
                          echo"</tr>";
					}
					}
					?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
                </div>
              </div>


              

             
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <?php 
		require("footer.php");
		?>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <script>
    
      function modalfunction(id,name){
        $("#myModalLabel").html(name);
        $(".modal-body").html("<img src='./enrolcode_pic/"+id+"' style='width:100%;height:50%;'></img>");
      }
    </script>

  </body>
</html>