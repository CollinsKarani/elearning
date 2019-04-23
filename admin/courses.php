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
					 <a href="add_course.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add Course</a>
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Course List</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<form action="delete_course.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<a data-toggle="modal" href="#subject_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
									<?php include('modal_delete.php'); ?>
										<thead>
										  <tr>
											    <th></th>
												<th>Course Code</th>
												<th>Course Title</th>
												<th></th>
										   </tr>
										</thead>
										<tbody>
											
												<?php
											$subject_query = $conn->query("select * from subject");
											while($row = mysqli_fetch_array($subject_query)){
											$id = $row['subject_id'];
											?>

											<tr>
													<td width="30">
													<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
													</td>
													<td><?php echo $row['subject_code']; ?></td>
													<td><?php echo $row['subject_title']; ?></td>
												
													<td width="30"><a href="edit_subject.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil"></i> </a></td>
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