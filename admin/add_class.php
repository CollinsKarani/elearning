   <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Add Programme</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
								    	<div class="control-group">
                                          <div class="controls">
                                           <select name="department" id="department">
                                               <option value="">Select department</option>
                                               <?php
                                                 $dep =$conn->query("SELECT * FROM department");
                                                 while($row=mysqli_fetch_assoc($dep)){
                                                     ?>
                                                <option value="<?php echo $row['department_id']; ?>"> <?php echo $row['department_name']; ?></option>
                                                     <?php
                                                 }
                                               ?>
                                           </select>
                                          </div>
                                        </div>

										<div class="control-group">
                                          <div class="controls">
                                            <input name="class_name" class="input focused" id="focusedInput" type="text" placeholder = "Programme Name" required>
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
                    </div><?php

if (isset($_POST['save'])){
    $dept= $_POST['department'];
$class_name = $_POST['class_name'];
$query = $conn->query("select * from class where class_name  = '$class_name' ");
$count = mysqli_num_rows($query);

if ($count > 0){ ?>
<script>
alert('Date Already Exist');
</script>
<?php
}else{
$conn->query("INSERT into class (department_id,class_name) values('$dept','$class_name')");
?>
<script>
window.location = "programme.php";
</script>
<?php
}
}
?>