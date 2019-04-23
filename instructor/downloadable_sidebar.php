<div class="span3" id="">
	<div class="row-fluid">
				      <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"><h4><i class="icon-plus-sign"></i> Add Downloadable</h4></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                                         <?php
                                    if(isset($_POST['Upload'])){
                                      $uploaded_by_query = mysql_query("select * from teacher where teacher_id = '$session_id'")or die(mysql_error());
                                    $uploaded_by_query_row = mysql_fetch_array($uploaded_by_query);
                                    $uploaded_by = $uploaded_by_query_row['firstname']."".$uploaded_by_query_row['lastname'];

                                    $id_class=$_POST['id_class'];
                                    $name=$_POST['name'];
                                    //Sanitize the POST values
                                    $filedesc = $_POST['desc'];

                                    //upload random name/number
                                    $rd2 = mt_rand(1000, 9999) . "_File";

                                    //Check that we have a file
                                    if ((!empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0)) {
                                        //Check if the file is JPEG image and it's size is less than 350Kb
                                        $filename = basename($_FILES['uploaded_file']['name']);

                                        $ext = substr($filename, strrpos($filename, '.') + 1);

                                        if (($ext != "exe") && ($_FILES["uploaded_file"]["type"] != "application/x-msdownload")) {
                                            //Determine the path to which we want to save this file
                                            //$newname = dirname(__FILE__).'/upload/'.$filename;
                                            $newname = "../public/uploads/" . $rd2 . "_" . $filename;
                                    		$name_notification  = 'Add Downloadable Materials file name'." ".'<b>'.$name.'</b>';
                                            //Check if the file with the same name is already exists on the server
                                            if (!file_exists($newname)) {
                                                //Attempt to move the uploaded file to it's new place
                                                if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $newname))) {

                                                    $qry2 = "INSERT INTO files (fdesc,floc,fdatein,teacher_id,class_id,fname,uploaded_by) VALUES ('$filedesc','$newname',NOW(),'$session_id','$id_class','$name','$uploaded_by')";
                                    				$conn->query("insert into notification (teacher_class_id,notification,date_of_notification,link) value('$get_id','$name_notification',NOW(),'downloadable_student.php')")or die(mysql_error());

                                                    $result2 = $conn->query($qry2);
                                                       echo "<div class='alert alert-success'>File successfully submitted.</div>";
                                                }
                                                else{
                                                        echo "<div class='alert alert-success'>Error occured while uploading..</div>"; 
                                                }
                                            }
                                        }
                                        }
                                  //  }

//mysqli_close();



                                        }

                                    ?>
								<form class="" id="add_downloadble" method="post" enctype="multipart/form-data" name="upload" >
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">File</label>
                            <div class="controls">
				
									
								<input name="uploaded_file"  class="input-file uniform_on" id="fileInput" type="file" required>
                         
                                <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                                <input type="hidden" name="id" value="<?php echo $session_id ?>"/>
                                <input type="hidden" name="id_class" value="<?php echo $get_id; ?>">
                            </div>
                        </div>
                        <div class="control-group">
                      
                            <div class="controls">
                                <input type="text" name="name" Placeholder="File Name"  class="input" required>
                            </div>
                        </div>
                        <div class="control-group">
                          
                            <div class="controls">
                                <input type="text" name="desc" Placeholder="Description"  class="input" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">

                                <button name="Upload" type="submit" value="Upload" class="btn btn-info" /><i class="icon-upload-alt"></i>&nbsp;Upload</button>
                            </div>
                        </div>
                    </form>

											<script>
			jQuery(document).ready(function($){
				$("#add_downloadble").submit(function(e){
					$.jGrowl("Uploading File Please Wait......", { sticky: true });
					e.preventDefault();
					var _this = $(e.target);
					var formData = new FormData($(this)[0]);
					$.ajax({
						type: "POST",
						url: "upload_save.php",
						data: formData,
						success: function(html){
							$.jGrowl("File Successfully  Added", { header: 'File Added' });
							window.location = 'downloadable.php<?php echo '?id='.$get_id; ?>';
						},
						cache: false,
						contentType: false,
						processData: false
					});
				});
			});
			</script>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
						

	</div>
</div>