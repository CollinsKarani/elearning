<?php  include('../inc/admin_session.php'); ?>
<?php  include('../inc/admin_header.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar_dashboard.php'); ?>
				<div class="span3" id="adduser">
				   <div class="row-fluid">
   <a href="admin_user.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add user</a>
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Edit User</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<?php
								$query = $conn->query("select * from users where user_id = '$get_id'");
								$row = mysqli_fetch_array($query);
								?>
								<form method="post">
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['firstname']; ?>" name="firstname" id="focusedInput" type="text" placeholder = "Firstname" required>
                                          </div>
                                        </div>

										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['lastname']; ?>"  name="lastname" id="focusedInput" type="text" placeholder = "Lastname" required>
                                          </div>
                                        </div>

											<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['username']; ?>"  name="username" id="focusedInput" type="text" placeholder = "Username" required>
                                          </div>
                                        </div>



											<div class="control-group">
                                          <div class="controls">
												<button name="update" class="btn btn-success"><i class="icon-save icon-large"></i></button>

                                          </div>
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
			<?php
if (isset($_POST['update'])){

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];


$conn->query("update users set username = '$username', firstname ='$firstname', lastname = '$lastname' where user_id = '$get_id' ");

$conn->query("insert into activity_log (date,username,action) values(NOW(),'$user_username','Edit User $username')");
?>
<script>
  //window.location = "admin_user.php";
</script>
<?php
}
?>
				</div>
                <div class="span6" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Admin Users List</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="delete_users.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<a data-toggle="modal" href="#user_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
									<?php include('modal_delete.php'); ?>
										<thead>
										  <tr>
												<th></th>
												<th>Name</th>
												<th>Username</th>
											
												<th></th>
										   </tr>
										</thead>
										<tbody>
													<?php
													$user_query = $conn->query("select * from users");
													while($row = mysqli_fetch_array($user_query)){
													$id = $row['user_id'];
													?>
									
												<tr>
												<td width="30">
												<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
												</td>
												<td><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></td>
	
												<td><?php echo $row['username']; ?></td>
											
												<td width="40">
												<a href="edit_user.php<?php echo '?id='.$id; ?>"  data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
												</td>
		
									
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