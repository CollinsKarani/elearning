<?php
require_once('../inc/lecturer_session.php');
require_once('../inc/lecturer_header.php'); ?>

    <body id="class_div">
		<?php include('navbar_teacher.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('teacher_sidebar.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->	
					     <ul class="breadcrumb">
								<?php
								$school_year_query = $conn->query("select * from school_year order by school_year DESC");
								$school_year_query_row = mysqli_fetch_array($school_year_query);
								$school_year = $school_year_query_row['school_year'];
								?>
								<li><a href="#"><b>My Class</b></a><span class="divider">/</span></li>
								<li><a href="#">School Year: <?php echo $school_year_query_row['school_year']; ?></a></li>
						</ul>
						 <!-- end breadcrumb -->
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="count_class" class="muted pull-right">

								</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span4">
                                    <?php
                                   if(isset($_POST['Upload'])){
                                       $name=$_POST['name'];
                        $filedesc=$_POST['desc'];

                        $input_name = basename($_FILES['uploaded_file']['name']);
                        echo $input_name ;
                        if ($input_name == ""){
                        				$id=$_POST['selector'];
                        				$N = count($id);
                        				for($i=0; $i < $N; $i++)
				{
						$conn->query("INSERT INTO assignment (fdesc,fdatein,teacher_id,class_id) VALUES ('$filedesc',NOW(),'$session_id','$id[$i]')")or die(mysql_error());
						$conn->query("insert into notification (teacher_class_id,date_of_notification,link) value('$id[$i]',NOW(),'assignment_student.php')")or die(mysql_error());
				 }
                }else{
			$rd2 = mt_rand(1000, 9999) . "_File";
			$filename = basename($_FILES['uploaded_file']['name']);
			$ext = substr($filename, strrpos($filename, '.') + 1);
		$newname = "../public/uploads/" . $rd2 . "_" . $filename;
		$name_notification  = 'Add Assignment file name'." ".'<b>'.$name.'</b>';
            (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $newname));
				$id=$_POST['selector'];
				$N = count($id);
				for($i=0; $i < $N; $i++)
				{
                $conn->query("INSERT INTO assignment (fdesc,floc,fdatein,teacher_id,fname,class_id) VALUES ('$filedesc','$newname',NOW(),'$session_id','$name','$id[$i]')")or die(mysql_error());
				$conn->query("insert into notification (teacher_class_id,notification,date_of_notification,link) value('$id[$i]','$name_notification',NOW(),'assignment_student.php')")or die(mysql_error());
				}
                echo '<div class="alert alert-success">Success uploads </div>';
                }
                
                }

				?>
										<form class="" id="add_downloadble" method="post" enctype="multipart/form-data" name="upload" >
												<div class="control-group">
													<label class="control-label" for="inputEmail">File</label>
													<div class="controls">
														<input name="uploaded_file"  class="input-file uniform_on" id="fileInput" type="file" >
														<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
														<input type="hidden" name="id" value="<?php echo $session_id ?>"/>
													</div>
												</div>
												<div class="control-group">
													<div class="controls">
														<input type="text" name="name" Placeholder="File Name"  class="input">
													</div>
												</div>
												<div class="control-group">
													<div class="controls">
													<textarea id="assigntextare" placeholder="Description" name="desc" required></textarea>
													</div>
												</div>

									</div>
									<div class="span8">
											
			<div class="alert alert-info">Check The Class you want to put this file.</div>
					
									<div class="pull-left">
							Check All <input type="checkbox"  name="selectAll" id="checkAll" />
								<script>
								$("#checkAll").click(function () {
									$('input:checkbox').not(this).prop('checked', this.checked);
								});
								</script>					
							</div>
											<table cellpadding="0" cellspacing="0" border="0" class="table" id="">

										<thead>
										        <tr>
												<th></th>
												<th>Class Name</th>
												<th>Subject Code</th>
												</tr>
												
										</thead>
										<tbody>
											
                              	<?php $query =$conn->query("select * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										where teacher_id = '$session_id' and school_year = '$school_year' ");
										$count = mysqli_num_rows($query);
										
									
										while($row = mysqli_fetch_array($query)){
										$id = $row['teacher_class_id'];
				
										?>                             
										<tr id="del<?php echo $id; ?>">
											<td width="30">
												<input id="" class="" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
											</td>
											<td><?php echo $row['class_name']; ?></td>
											<td><?php echo $row['subject_code']; ?></td>                                                                   
										</tr>
                         
						<?php } ?>
							
						   
                              
										</tbody>
									</table>
						
									
                                </div>
								<div class="span10">
								<hr>
									<center>
									<div class="control-group">
												<div class="controls">
													<button name="Upload" type="submit" value="Upload" class="btn btn-success" /><i class="icon-upload-alt"></i>&nbsp;Upload</button>
												</div>
									</div>
									</center>
             
						       </form>		
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
			

                </div>
							<?php/*  include('teacher_right_sidebar.php')  */?>
	
            </div>
		<?php include('../footer.php'); ?>
        </div>
		<?php include('../script.php'); ?>
    </body>
</html>