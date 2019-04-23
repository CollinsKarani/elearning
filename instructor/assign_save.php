<?php
require_once('../inc/lecturer_session.php');
//require("opener_db.php");
$id_class=$_POST['id_class'];
$name=$_POST['name'];
$filedesc=$_POST['desc'];
$get_id  = $_GET['id'];
$input_name = basename($_FILES['uploaded_file']['name']);
//echo $input_name ;


if ($input_name == ""){

			$name_notification  = 'Add Assignment file name'." ".'<b>'.$name.'</b>';
	   
                $conn->query("INSERT INTO assignment (fdesc,fdatein,teacher_id,class_id,fname) VALUES ('$filedesc',NOW(),'$session_id','$id_class','$name')")or die(mysql_error());
				 $conn->query("insert into notification (teacher_class_id,notification,date_of_notification,link) value('$get_id','$name_notification',NOW(),'assignment_student.php')")or die(mysql_error());
?>            
			<script>
			   	window.location = 'assignment.php<?php echo '?id='.$get_id;  ?>';
			</script>
<?php
}else{

//upload random name/number
	$rd2 = mt_rand(1000, 9999) . "_File";
    $filename = basename($_FILES['uploaded_file']['name']);
    $ext = substr($filename, strrpos($filename, '.') + 1);

   $newname = "../public/uploads/" . $rd2 . "_" . $filename;
   
		$name_notification  = 'Add Assignment file name'." ".'<b>'.$name.'</b>';
        //Check if the file with the same name is already exists on the server

            //Attempt to move the uploaded file to it's new place
            (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $newname));
                //successful upload
                // echo "It's done! The file has been saved as: ".$newname;		   
                $qry2 = "INSERT INTO assignment (fdesc,floc,fdatein,teacher_id,class_id,fname) VALUES ('$filedesc','$newname',NOW(),'$session_id','$id_class','$name')";
				$query = $conn->query("insert into notification (teacher_class_id,notification,date_of_notification,link) value('$get_id','$name_notification',NOW(),'assignment_student.php')")or die(mysql_error());
			   //$result = @mysql_query($qry);
                $result2 = $conn->query($qry2);
                if ($result2) {
                     ?>

                     <script>
window.location = 'assignment.php<?php echo '?id='.$get_id;  ?>';
					</script>
                        <?php
                }
}
				?>