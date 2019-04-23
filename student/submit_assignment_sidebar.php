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
                                        $assignment_id  = $_POST['id'];
                                        $name  = $_POST['name'];
                                        $get_id = $_POST['get_id'];

                                    //Sanitize the POST values
                                    $filedesc =$_POST['desc'];
                                    //$subject= clean($_POST['upname']);
                                    //Check that we have a file
if ((!empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0)) {
    //Check if the file is JPEG image and it's size is less than 350Kb
    $filename = basename($_FILES['uploaded_file']['name']);

    $ext = substr($filename, strrpos($filename, '.') + 1);

    if (($ext != "exe") && ($_FILES["uploaded_file"]["type"] != "application/x-msdownload")) {
        //Determine the path to which we want to save this file
        //$newname = dirname(__FILE__).'/upload/'.$filename;
        $newname = "../public/uploads/". $filename;
	$name_notification  = 'Submit Assignment file name'." ".'<b>'.$name.'</b>';
        //Check if the file with the same name is already exists on the server
        if (!file_exists($newname)) {
            //Attempt to move the uploaded file to it's new place
            if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $newname))) {
                //successful upload
                // echo "It's done! The file has been saved as: ".$newname;
                $conn->query("INSERT INTO student_assignment (fdesc,floc,assignment_fdatein,fname,assignment_id,student_id) VALUES ('$filedesc','$newname',NOW(),'$name','$assignment_id','$session_id')")or die(mysql_error());
				$conn->query("insert into teacher_notification (teacher_class_id,notification,date_of_notification,link,student_id,assignment_id) value('$get_id','$name_notification',NOW(),'view_submit_assignment.php','$session_id','$assignment_id')")or die(mysql_error());
                echo '<div class="alert alert-success"> Assignment succesfully uploaded.</div>';
            }
            else{
              echo '<div class="alert alert-danger">Error while uploading data..</div>';
            }
        }
    }

}

                                    }
                                    ?>
						<form id="add_assignment"   method="post" enctype="multipart/form-data">
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">File</label>
                            <div class="controls">
				
									
								<input name="uploaded_file"  class="input-file uniform_on" id="fileInput" type="file" required>
                         
                                <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                                <input type="hidden" name="id" value="<?php echo $post_id; ?>"/>
                                <input type="hidden" name="get_id" value="<?php echo $get_id; ?>"/>
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

                                <button name="Upload" type="submit" value="Upload" class="btn btn-success" /><i class="icon-upload-alt"></i>&nbsp;Upload</button>
                            </div>
                        </div>
                    </form>
								</div>
                            </div>
                        </div>


	</div>
</div>