<?php 
require("secured.php");
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
          

              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                    </ul>
                   
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                   <form action="" method="">
                   <table id="datatable-buttons" cellspacing="0" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          
                          <th>#</th>
                          <th>ACCESS NAME</th>
                          <th>ACTION</th>
                        </tr>
                      </thead>
					  <tbody>
					  
					<?php 
					require("connect.php");
					$access=mysqli_query($conn,"select * from accesslevel order by tdate DESC")or die(mysqli_error($conn));
					$count=1;
					while($vaccess=mysqli_fetch_array($access))
					{
						//$count=1;
						echo"<tr>";
						echo"<td>".$count++."</td>";
                          echo"<td>$vaccess[levelname]</td>";
						  echo"<td><a onclick='return confirm(\"Modify Record\")' href='editaccess.php?id=$vaccess[id]' class='fa fa-edit' style='color:blue;font-size:25px;font-weight:bold'></a>
						  <a onclick='return confirm(\"Record Will be deleted\")' href='delaccess.php?id=$vaccess[id]' class='fa fa-trash' style='color:red;font-size:25px;font-weight:bold'></a>
						  </td>";  
                        echo"</tr>";
					}
					?>
                      </tbody>
                    </table>
					</form>
					<a href='' style="margin-left:12px" class="btn btn-primary">BACK</a>
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
	let url="./controller/forms.php";
	
	</script>
  </body>
</html>