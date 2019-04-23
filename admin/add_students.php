   <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Add Student</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form id="add_student" method="post">
								
								        <div class="control-group">
                                          <div class="controls">
                                              <label for="">Programme Taken:</label>
                                            <select  name="class_id" class="" required>
                                             	<option></option>
											<?php
											$cys_query = $conn->query("select * from class order by class_name");
											while($cys_row = mysqli_fetch_array($cys_query)){

											?>
											<option value="<?php echo $cys_row['class_id']; ?>"><?php echo $cys_row['class_name']; ?></option>
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>


                                         <div class="control-group">
                                          <div class="controls">
                                              <label for="">Study Level:</label>
                                            <select  name="level_id" class="" required>
                                             	<option value="">~~Select the Level~~</option>
											<?php
											$cys_query = $conn->query("select * from tbl_studylevel order by level_name");
											while($cys_row = mysqli_fetch_array($cys_query)){

											?>
											<option value="<?php echo $cys_row['level_id']; ?>"><?php echo $cys_row['level_name']; ?></option>
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>


										<div class="control-group">
                                          <div class="controls">
                                              <label for="">Reg Number: </label>
                                            <input name="un" class="input focused" id="focusedInput" type="text" placeholder = "Reg Number" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                              <label for="">First Name: </label>
                                            <input name="fn" class="input focused" id="focusedInput" type="text" placeholder = "Firstname" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                              <label for="">Last Name: </label>
                                            <input  name="ln" class="input focused" id="focusedInput" type="text" placeholder = "Lastname" required>
                                          </div>
                                        </div>

                                        	<div class="control-group">
                                          <div class="controls">
                                              <label for="">Phone Number: </label>
                                            <input  name="phone" class="input focused" id="focusedInput" type="text" placeholder = "International Format" required>
                                          </div>
                                        </div>

                                        <div class="control-group">
                                          <div class="controls">
                                              <label for="">Email Address: </label>
                                            <input  name="email" class="input focused" id="focusedInput" type="text" placeholder = "Email Address" required>
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
                    </div>
					
			<script>
			jQuery(document).ready(function($){
				$("#add_student").submit(function(e){
					e.preventDefault();
					var _this = $(e.target);
					var formData = $(this).serialize();
					$.ajax({
						type: "POST",
						url: "save_student.php",
						data: formData,
						success: function(html){
							$.jGrowl("Student Successfully  Added", { header: 'Student Added' });
							$('#studentTableDiv').load('student_table.php', function(response){
								$("#studentTableDiv").html(response);
								$('#example').dataTable( {
									"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
									"sPaginationType": "bootstrap",
									"oLanguage": {
										"sLengthMenu": "_MENU_ records per page"
									}
								} );
								$(_this).find(":input").val('');
								$(_this).find('select option').attr('selected',false);
								$(_this).find('select option:first').attr('selected',true);
							});
						}
					});
				});
			});
			</script>		
