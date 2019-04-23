<?php require_once('../inc/lecturer_dashboard.php'); ?>
<?php $get_id = $_GET['id']; ?>
<?php

 $get_id1 = $_POST['id'];
 ?>
    <body>
		<?php include('navbar_teacher.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">


           <!---- Announcement sidebar -->
			   <div class="span3" id="sidebar">
	<img id="avatar" src="admin/<?php echo $row['location']; ?>" class="img-polaroid">
			<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
				<li class=""><a href="dasboard_teacher.php"><i class="icon-chevron-right"></i><i class="icon-chevron-left"></i>&nbsp;Back</a></li>
				<li class=""><a href="my_students.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-group"></i>&nbsp;My Students</a></li>
				<li class=""><a href="subject_overview.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-file"></i>&nbsp;Subject Overview</a></li>
				<li class=""><a href="downloadable.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-download"></i>&nbsp;Downloadable Materials</a></li>
				<li class=""><a href="assignment.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-book"></i>&nbsp;Assignments</a></li>
				<li class="active"><a href="announcements.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-info-sign"></i>&nbsp;Announcements</a></li>
				<li class=""><a href="class_calendar.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-calendar"></i>&nbsp;Class Calendar</a></li>
			    <li class=""><a href="class_quiz.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-list"></i>&nbsp;Quiz</a></li>
			</ul>
			<?php include('search_other_class.php'); ?>
</div>





                <div class="span9" id="content">
				
                     <div class="row-fluid">
					  <!-- breadcrumb -->
				
										<?php $class_query = $conn->query("select * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										where teacher_class_id = '$get_id'")or die(mysql_error());
										$class_row = mysqli_fetch_array($class_query);
										?>
				
					     <ul class="breadcrumb">
							<li><a href="#"><?php echo $class_row['class_name']; ?></a> <span class="divider">/</span></li>
							<li><a href="#"><?php echo $class_row['subject_code']; ?></a> <span class="divider">/</span></li>
							<li><a href="#"><b>Announcements</b></a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
						
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<a href="announcements.php<?php echo '?id='.$get_id; ?>"><i class="icon-arrow-left icon-large"></i> Back</a>
								<br>
								<br>
								<form method="post">
									 <?php
								 $query_announcement = $conn->query("select * from teacher_class_announcements
																	where teacher_id = '$session_id' and teacher_class_announcements_id = '$get_id1'  and  teacher_class_id = '$get_id' order by date DESC
																	");
								$row = mysqli_fetch_array($query_announcement);
								 $id = $row['teacher_class_announcements_id'];
								 ?>
								 <input type="hidden" name="id" value="<?php echo $id; ?>">
								<textarea name="content" id="ckeditor_full">
								<?php echo $row['content']; ?>
								</textarea>
								<br>
								<button name="post" class="btn btn-info"><i class="icon-check icon-large"></i> Post</button>
								</form>
                                </div>
								
								<?php
									if (isset($_POST['post'])){
									$content = $_POST['content'];
									$id = $_POST['id'];
									
									$conn->query("update teacher_class_announcements  set content = '$content' where teacher_class_announcements_id = '$id' ")or die(mysql_error());
									?>
									<script>
									 window.location = 'announcements.php<?php echo '?id='.$get_id; ?>'; 
									</script>
									<?php
									}
								?>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>
				
			


					<script type="text/javascript">
	$(document).ready( function() {

		
		$('.remove').click( function() {
		
		var id = $(this).attr("id");
			$.ajax({
			type: "POST",
			url: "remove_announcements.php",
			data: ({id: id}),
			cache: false,
			success: function(html){
			$("#del"+id).fadeOut('slow', function(){ $(this).remove();}); 
			$('#'+id).modal('hide');
			$.jGrowl("Your Post is Successfully Deleted", { header: 'Data Delete' });
		
			}
			}); 
			
			return false;
		});				
	});

</script>
					
                </div>
				
			
            </div>
			
		
		
		
			
		<?php include('../footer.php'); ?>
        </div>
		<?php include('../script.php'); ?>
    </body>
</html>