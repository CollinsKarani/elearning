 <?php
require_once('../inc/lecturer_session.php');
require_once('../inc/lecturer_header.php'); ?>
    <body>
		<?php include('navbar_teacher.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('teacher_sidebar.php'); ?>
                <div class="span6" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->

					     <ul class="breadcrumb">
						<?php
						$sy = $_POST['school_year'];
						
						$school_year_query = $conn->query("select * from school_year where  school_year = '$sy'");
						$school_year_query_row = mysqli_fetch_array($school_year_query);
						$school_year = $school_year_query_row['school_year'];
						?>
							<li><a href="#"><b>My Class</b></a><span class="divider">/</span></li>
							<li><a href="#"><?php echo $school_year_query_row['school_year']; ?></a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								
  										<ul	 id="da-thumbs" class="da-thumbs">
										<?php $query =$conn->query("select * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										where teacher_id = '$session_id' and school_year = '$school_year' ");
										while($row = mysqli_fetch_array($query)){
										$id = $row['teacher_class_id'];
				
										?>
											<li>
												<a href="my_students.php<?php echo '?id='.$id; ?>">
														<img src ="<?php echo $row['thumbnails'] ?>" width="124" height="140" class="img-polaroid">
													<div>
													<span>
													<p><?php echo $row['class_name']; ?></p>
													
													</span>
													</div>
												</a>
												<p class="class"><?php echo $row['subject_code']; ?></p>
												<p class="subject"><?php echo $row['subject_title']; ?></p>
												<a  href="#<?php echo $id; ?>" data-toggle="modal"><i class="icon-trash"></i> Remove</a>	
											
											</li>
										<?php include("delete_class_modal.php"); ?>

			
									<?php } ?>
									</ul>
						
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                       	<script type="text/javascript">
									$(document).ready( function() {
										$('.remove').click( function() {
										var id = $(this).attr("id");
											$.ajax({
											type: "POST",
											url: "delete_class.php",
											data: ({id: id}),
											cache: false,
											success: function(html){
											$("#del"+id).fadeOut('slow', function(){ $(this).remove();});
											$('#'+id).modal('hide');
											$.jGrowl("Your Class is Successfully Deleted", { header: 'Class Delete' });
											}
											});
											return false;
										});
									});
									</script>

                </div>
				<?php include('teacher_right_sidebar.php') ?>
            </div>
		<?php include('../footer.php'); ?>
        </div>
		<?php include('../script.php'); ?>
    </body>
</html>