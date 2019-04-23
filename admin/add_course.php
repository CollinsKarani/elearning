<?php  include('../inc/admin_session.php'); ?>
<?php  include('../inc/admin_header.php'); ?>
    <body>
		<?php include('navbar.php') ?>
        <div class="container-fluid">
            <div class="row-fluid">

					<?php include('sidebar_dashboard.php'); ?>
                <!--/span-->
		
						<div class="span9" id="content">
		                    <div class="row-fluid">
							
		                        <!-- block -->
		                        <div class="block">
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">Add Course</div>
		                            </div>
		                            <div class="block-content collapse in">
									<a href="courses.php"><i class="icon-arrow-left"></i> Back</a>
									    <form class="form-horizontal" method="post">
									        <div class="control-group">
											<label class="control-label" for="inputEmail">Programme: </label>
											<div class="controls">
											<select name="programme" id="programme">
											    <option value="">~~Select programme~~</option>
                                                <?php
                                                   $prog=$conn->query("SELECT * FROM class");
                                                   while($row=mysqli_fetch_assoc($prog)){
                                                       ?>
                                                   <option value="<?php echo $row['class_id'] ?>"><?php echo $row['class_name']; ?></option>
                                                       <?php
                                                   }
                                                ?>
											</select>
											</div>
										</div>


                                        <div class="control-group">
											<label class="control-label" for="inputEmail">Study Level: </label>
											<div class="controls">
											<select name="studylevel" id="studylevel">
											    <option value="">~~Select Level of study~~</option>
                                                <?php
                                                   $prog=$conn->query("SELECT * FROM tbl_studylevel");
                                                   while($row=mysqli_fetch_assoc($prog)){
                                                       ?>
                                                   <option value="<?php echo $row['level_id']; ?>"><?php echo $row['level_name']; ?></option>
                                                       <?php
                                                   }
                                                ?>
											</select>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="inputEmail">Course Code</label>
											<div class="controls">
											<input type="text" name="subject_code" id="inputEmail" placeholder="Course Code">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Course Title</label>
											<div class="controls">
											<input type="text" class="span8" name="title" id="inputPassword" placeholder="Course Title" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Number of Units</label>
											<div class="controls">
											<input type="text" class="span1" name="unit" id="inputPassword" required>
											</div>
										</div>
											<div class="control-group">
											<label class="control-label" for="inputPassword">Semester</label>
											<div class="controls">
												<select name="semester">
													<option></option>
													<option value="1">1st</option>
													<option value="2">2nd</option>
												</select>
											</div>
										</div>
								
										<div class="control-group">
											<label class="control-label" for="inputPassword">Description</label>
											<div class="controls">
													<textarea name="description" id="ckeditor_full"></textarea>
											</div>
										</div>
												
																		
											
										<div class="control-group">
										<div class="controls">
										
										<button name="save" type="submit" class="btn btn-info"><i class="icon-save"></i> Save</button>
										</div>
										</div>
										</form>
										
										<?php
										if (isset($_POST['save'])){
										    $program =$_POST['programme'] ;
                                            $level = $_POST['studylevel'];
										$subject_code = $_POST['subject_code'];
										$title = $_POST['title'];
										$unit = $_POST['unit'];
										$description = $_POST['description'];
										$semester = $_POST['semester'];
										
										
										$query = $conn->query("select * from subject where subject_code = '$subject_code' ");
										$count = mysqli_num_rows($query);

										if ($count > 0){ ?>
										<script>
										alert('Data Already Exist');
										</script>
										<?php
										}else{
										$conn->query("INSERT into subject (subject_code,program_id,level_id,subject_title,description,unit,semester) values('$subject_code','$program','$level','$title','$description','$unit','$semester')");
									   //$conn->query("INSERT into activity_log (date,username,action) values(NOW(),'$user_username','Add Subject $subject_code')");

										?>
										<script>
										window.location = "courses.php";
										</script>
										<?php
										}
										}
										
										?>
									
								
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