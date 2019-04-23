<?php  include('../inc/admin_session.php'); ?>
<?php  include('../inc/admin_header.php'); ?>
    <body>
		<?php include('navbar.php') ?>
        <div class="container-fluid">
            <div class="row-fluid">

					<?php include('sidebar_dashboard.php'); ?>
                <!--/span-->
                
                <div class="span9" id="content">
						<div class="row-fluid"></div>
						
                    <div class="row-fluid">
            
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Data Numbers</div>
                            </div>
                            <div class="block-content collapse in">
							        <div class="span12">

								
								<?php 
								$query_teacher = $conn->query("select * from teacher");
								$count_teacher = mysqli_num_rows($query_teacher);
								?>
								
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_teacher; ?>"><?php echo $count_teacher ?></div>
                                    <div class="chart-bottom-heading"><strong>Lecturers</strong>

                                    </div>
                                </div>
								
								<?php 
								$query_student = $conn->query("select * from student where status='Registered'");
								$count_student = mysqli_num_rows($query_student);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_student ?>"><?php echo $count_student ?></div>
                                    <div class="chart-bottom-heading"><strong>Quizes</strong>

                                    </div>
                                </div>
								
								
										<?php 
								$query_student = $conn->query("select * from student");
								$count_student = mysqli_num_rows($query_student);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_student ?>"><?php echo $count_student ?></div>
                                    <div class="chart-bottom-heading"><strong>Students</strong>

                                    </div>
                                </div>
								
								
								
								
							
								
									<?php 
								$query_class = $conn->query("select * from class");
								$count_class = mysqli_num_rows($query_class);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_class; ?>"><?php echo $count_class; ?></div>
                                    <div class="chart-bottom-heading"><strong>Programmes</strong>

                                    </div>
                                </div>
								
								
										<?php
								$query_file = $conn->query("select * from files");
								$count_file = mysqli_num_rows($query_file);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_file; ?>"><?php echo $count_file; ?></div>
                                    <div class="chart-bottom-heading"><strong>Downloadable File</strong>

                                    </div>
                                </div>
								
								
										<?php 
								$query_subject = $conn->query("select * from subject")or die(mysql_error());
								$count_subject = mysqli_num_rows($query_subject);
								?>

                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_subject; ?>"><?php echo $count_subject; ?></div>
                                    <div class="chart-bottom-heading"><strong>Courses</strong>

                                    </div>
                                </div>
						
						
                            </div>
                        </div>
                        <!-- /block -->
						
                    </div>
                    </div>
                
                
                 
                 
                </div>
            </div>
    
         <?php include('footer.php'); ?>
        </div>
	<?php include('script.php'); ?>
    </body>

</html>