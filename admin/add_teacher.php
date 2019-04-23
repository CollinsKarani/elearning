   <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Add Lecturer</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
								<!--
										<label>Photo:</label>
										<div class="control-group">
                                          <div class="controls">
                                               <input class="input-file uniform_on" id="fileInput" type="file" required>
                                          </div>
                                        </div>
									-->	
										
										  <div class="control-group">
											<label>Department:</label>
                                          <div class="controls">
                                            <select name="department"  class="" required>
                                             	<option></option>
											<?php
											$query = $conn->query("select * from department order by department_name");
											while($row = mysqli_fetch_array($query)){
											
											?>
											<option value="<?php echo $row['department_id']; ?>"><?php echo $row['department_name']; ?></option>
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="control-group">
                                          <div class="controls">
                                              <label for="">PF Number: </label>
                                            <input class="input focused" name="username" id="focusedInput" type="text" placeholder = "PF Number">
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="firstname" id="focusedInput" type="text" placeholder = "Firstname">
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="lastname" id="focusedInput" type="text" placeholder = "Lastname">
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
					
					
					    <?php
                            if (isset($_POST['save'])) {
                                $us = $_POST['username'];
                                $firstname = $_POST['firstname'];
                                $lastname = $_POST['lastname'];
                                $department_id = $_POST['department'];
                                $role=2;


								$query = $conn->query("select * from teacher where username = '$us'");
								$count = mysqli_num_rows($query);
								
								if ($count > 0){ ?>
								<script>
								alert('Data Already Exist');
								</script>
								<?php
								}else{

                               $result= $conn->query("INSERT into teacher (username,firstname,lastname,location,department_id)
								values ('$us','$firstname','$lastname','../public/uploads/NO-IMAGE-AVAILABLE.jpg','$department_id')
								");
                                  if($result){
                                     $last= $conn->insert_id;
                                      $conn->query("INSERT INTO tbl_login (id,username,password,role_id) VALUES('$last','$us','$us','$role')");
                                  }
                                ?>
								<script>
							 	window.location = "teachers.php"; 
								</script>
								<?php   }} ?>
						 
						 