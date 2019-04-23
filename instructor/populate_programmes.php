<?php
include_once('../config/dbcon.php');

if(isset($_POST['fid'])) {
    // fetch state details
    $progid= $_POST['fid'];
    $stmt = $conn->query("SELECT * FROM subject WHERE program_id='$progid' ORDER BY subject_title ASC");

    echo '<option value="">Select Course Units Name</option>';
    while($row = mysqli_fetch_assoc($stmt)) {
        echo '<option value="'.$row['subject_id']. '">' .$row['subject_title']. '</option>';
    }
}


?>