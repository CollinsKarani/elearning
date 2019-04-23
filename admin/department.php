<?php  include('../inc/admin_session.php'); ?>
<?php  include('../inc/admin_header.php'); ?>
    <body>
		<?php include('navbar.php') ?>
        <div class="container-fluid">
            <div class="row-fluid">

					<?php include('sidebar_dashboard.php'); ?>
                <!--/span-->

				<div class="span3" id="adduser">
				   <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Add Department</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
								    	<div class="control-group">
                                        <div class="controls">
                                        <label for="" class="form-label">School:</label>
                                        <select name="pi" id="focusedInput">
                                            <option value="">~~Select School~~</option>
                                            <?php
                                          $query = $conn->query("select * from tbl_schools");

                                          while($row=mysqli_fetch_array($query)){
                                              ?>
                                             <option value="<?php echo $row['school_id']; ?>"><?php echo $row['school_name']; ?></option>
                                              <?php
                                          }

                                            ?>
                                        </select>
                                        </div>
                                        </div>

										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" id="focusedInput" name="d" type="text" placeholder = "Deparment">
                                          </div>
                                        </div>

											<div class="control-group">
                                          <div class="controls">
												<button name="save" class="btn btn-info"><i class="icon-plus-sign icon-large"></i></button>

                                          </div>
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>

					<?php
if (isset($_POST['save'])){
$pi = $_POST['pi'];
$d = $_POST['d'];


$query = $conn->query("select * from department where department_name = '$d' and school_id = '$pi' ");
$count = mysqli_num_rows($query);

if ($count > 0){ ?>
<script>
alert('Data Already Exist');
</script>
<?php
}else{
$conn->query("insert into department (department_name,school_id) values('$d','$pi')");
?>
<script>
window.location = "department.php";
</script>
<?php
}
}
?>
				</div>
                <div class="span6" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Department List</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<form action="delete_department.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<a data-toggle="modal" href="#department_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
									<?php include('modal_delete.php'); ?>
										<thead>
										  <tr>
												<th></th>
												<th>Department</th>
												<th>School Name</th>
												<th>Action</th>
										   </tr>
										</thead>
										<tbody>
													<?php
													$user_query = $conn->query("SELECT
    department.*, tbl_schools.school_name
FROM department  INNER JOIN tbl_schools
        ON (department.school_id = tbl_schools.school_id);");

													while($row = mysqli_fetch_array($user_query)){
													$id = $row['department_id'];
													?>
									
													<tr>
														<td width="30">
														<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
														</td>
														<td><?php echo $row['department_name']; ?></td>
														<td><?php echo $row['school_name']; ?></td>
														<td width="30"><a href="edit_department.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i></a></td>
													</tr>
												<?php } ?>
										</tbody>
									</table>
									</form>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>

</html>