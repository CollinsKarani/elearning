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
								$school_year_query =$conn->query("select * from school_year order by school_year DESC");
								$school_year_query_row = mysqli_fetch_array($school_year_query);
								$school_year = $school_year_query_row['school_year'];
								?>
								<li><a href="#">Message</a><span class="divider">/</span></li>
								<li><a href="#"><b>Inbox</b></a><span class="divider">/</span></li>
								<li><a href="#">School Year: <?php echo $school_year_query_row['school_year']; ?></a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  								
										<ul class="nav nav-pills">
										<li class="active">
										<a href="teacher_message"><i class="icon-envelope-alt"></i>inbox</a>
										</li>
										<li class="">
										<a href="sent_message"><i class="icon-envelope-alt"></i>Sent messages</a>
										</li>
										</ul>
										
									<?php
								 $query_announcement =$conn->query("select * from message
																	LEFT JOIN teacher ON teacher.teacher_id = message.sender_id
																	where  message.reciever_id = '$session_id' order by date_sended DESC
																	");
								 while($row = mysqli_fetch_array($query_announcement)){
								 $id = $row['message_id'];
								 ?>
											<div class="post"  id="del<?php echo $id; ?>">
											<div class="message_content">
											<?php echo $row['content']; ?>
											</div>
											
													<hr>
											Send by: <strong><?php echo $row['sender_name']; ?></strong>
											<i class="icon-calendar"></i> <?php echo $row['date_sended']; ?>
													<div class="pull-right">
													<a class="btn btn-link"  href="#<?php echo $id; ?>" data-toggle="modal" ><i class="icon-remove"></i> Remove </a>
												   		<!-- Modal -->
<div id="<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h3 id="myModalLabel">Remove Message</h3>
	</div>
		<div class="modal-body">
		<div class="alert alert-danger">
			Are you sure you want to Remove this  message?
		</div>
		</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
		<button   id="<?php echo $id; ?>" class="btn btn-danger remove" data-dismiss="modal" aria-hidden="true"><i class="icon-check icon-large"></i> Yes</button>
	</div>
</div>

													</div>
											</div>
											
								<?php } ?>
										
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
			url: "remove_inbox_message.php",
			data: ({id: id}),
			cache: false,
			success: function(html){
			$("#del"+id).fadeOut('slow', function(){ $(this).remove();}); 
			$('#'+id).modal('hide');
			$.jGrowl("Your Sent message is Successfully Deleted", { header: 'Data Delete' });	
			}
			}); 		
			return false;
		});				
	});
</script>
	

                </div>
				<?php include('create_message_teacher.php') ?>
            </div>
		<?php include('../footer.php'); ?>
        </div>
		<?php include('../script.php'); ?>
    </body>
</html>