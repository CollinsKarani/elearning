						<!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"><h4><i class="icon-plus-sign"></i> Add Class</h4></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post" id="add_class">
										<div class="control-group">
											<label>Programme Name:</label>
                                          <div class="controls">
											<input type="hidden" name="session_id" value="<?php echo $session_id; ?>">
                                            <select name="class_id" id="class_id" class="" required>
                                             	<option value="">~~Select Programme~~~</option>
											<?php
											$query = $conn->query("select * from class order by class_name");
											while($row = mysqli_fetch_array($query)){
											?>
											<option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>
										
										<div class="control-group">
											<label>Unit Name:</label>
                                          <div class="controls">
                                            <select name="subject_id" id="subject_id"  class="" required>
                                             	   <option value ="">--Select Unit Name--</option>

                                            </select>
                                          </div>
                                        </div>

                                        	<div class="control-group">
											<label>Current Semester:</label>
                                            <div class="controls">

											<input id="" class="span5" readonly="readonly" type="text" class="" name="school_year" value="Semester 2" >
                                            </div>
                                            </div>

										<div class="control-group">
											<label>School Year:</label>
                                          <div class="controls">
											<?php
											$query = $conn->query("select * from school_year order by school_year DESC");
											$row = mysqli_fetch_array($query);
											?>
											<input id="" class="span5" readonly="readonly" type="text" class="" name="school_year" value="<?php  echo $row['school_year']; ?>" >
                                          </div>
                                        </div>
											<div class="control-group">
                                          <div class="controls">
												<button name="save" class="btn btn-success"><i class="icon-save"></i> Save</button>
                                          </div>
                                        </div>
                                </form>
								
            <script>
			jQuery(document).ready(function($){
				$("#add_class").submit(function(e){
					e.preventDefault();
					var _this = $(e.target);
					var formData = $(this).serialize();
					$.ajax({
						type: "POST",
						url: "add_class_action.php",
						data: formData,
						success: function(html){
						if(html=="true")
						{
						$.jGrowl("Class Already Exist", { header: 'Add Class Failed' });
						}else{
							$.jGrowl("Classs Successfully  Added", { header: 'Class Added' });
							var delay = 500;
							setTimeout(function(){ window.location = 'dashboard.php'  }, delay);  
						}
						}
					});
				});
			});
			</script>		

								</div>
                            </div>
                        </div>
                        <!-- /block -->
						
