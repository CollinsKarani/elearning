 <?php
 include('../config/dbcon.php');
// include('session.php');
 
 
                            if (isset($_POST['change'])) {

                                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                move_uploaded_file($_FILES["image"]["tmp_name"], "../public/uploads/" . $_FILES["image"]["name"]);
                                $location = "uploads/" . $_FILES["image"]["name"];
								
								$conn->query("update  teacher set location = '$location' where teacher_id  = '$session_id' ")or die(mysql_error());
								
								?>
 
								<script>
								window.location = "dashboard.php";  
								</script>

                       <?php     }  ?>