<?php
require_once('../inc/lecturer_session.php');
require_once('../inc/lecturer_header.php'); ?>

<?php $get_id = $_GET['id']; ?>
    <body>
		<?php include('navbar_teacher.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('class_sidebar.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
						<div class="pull-right">
						
							<a id="print" onclick="window.print()"  class="btn btn-success"><i class="icon-print"></i> Print Student List</a>
						</div>
					  	 <!-- breadcrumb -->
	<?php $class_query = $conn->query("select * from teacher_class
	LEFT JOIN class ON class.class_id = teacher_class.class_id
	LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
	where teacher_class_id = '$get_id'");
	$class_row = mysqli_fetch_array($class_query);
	?>

	<ul class="breadcrumb">
		<li><a href="#"><?php echo $class_row['class_name']; ?></a> <span class="divider">/</span></li>
		<li><a href="#"><?php echo $class_row['subject_code']; ?></a> <span class="divider">/</span></li>
		<li><a href="#">School Year: <?php echo $class_row['school_year']; ?></a> <span class="divider">/</span></li>
		<li><a href="#"><b>My Students</b></a></li>
	</ul>
	<!-- end breadcrumb -->
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-right">
					
								</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
						
												<table cellpadding="0" cellspacing="0" border="0" class="table" id="">
							
										<thead>
										        <tr>
										            <th>Reg Number</th>
												<th>Firstname</th>
												<th>Lastname</th>
												</tr>
												
										</thead>
										<tbody>
											
												<?php
														$my_student = $conn->query("SELECT * FROM teacher_class_student
														LEFT JOIN student ON student.student_id = teacher_class_student.student_id 
														INNER JOIN class ON class.class_id = student.class_id where teacher_class_id = '$get_id' order by lastname ")or die(mysql_error());
														while($row = mysqli_fetch_array($my_student)){
														$id = $row['teacher_class_student_id'];
														?>                          
										<tr id="del<?php echo $id; ?>">
									       <td><?php echo $row['username']; ?></td>
										 <td><?php echo $row['firstname']; ?></td>
                                         <td><?php  echo $row['lastname']; ?></td>
                             
                             

                               
                                </tr>
                         
						 <?php } ?>
						   
                              
										</tbody>
									</table>
										
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
            </div>
		<?php include('../footer.php'); ?>
        </div>
		<?php include('../script.php'); ?>
    </body>
</html>