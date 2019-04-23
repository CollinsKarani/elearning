<?php
require_once('../inc/student_session.php');
require_once('../inc/header_student.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body>
        <?php include('navbar_student.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
               	<?php include('student_sidebar_more.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">

                       <!-- breadcrumb -->

                                        <?php $class_query =$conn->query("select * from teacher_class
                                        LEFT JOIN class ON class.class_id = teacher_class.class_id
                                        LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
                                        where teacher_class_id = '$get_id'");
                                        $class_row = mysqli_fetch_array($class_query);
                                        ?>

                         <ul class="breadcrumb">
                            <li><a href="#"><?php echo $class_row['class_name']; ?></a> <span class="divider">/</span></li>
                            <li><a href="#"><?php echo $class_row['subject_code']; ?></a> <span class="divider">/</span></li>
                            <li><a href="#">School Year: <?php echo $class_row['school_year']; ?></a> <span class="divider">/</span></li>
                            <li><a href="#"><b>My attendance</b></a></li>
                        </ul>
                         <!-- end breadcrumb -->


                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">

                                <div id="" class="muted pull-right"><span class="badge badge-info"></span></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  											<table class="table table-striped table-condensed table-hover">
                                        <thead>
                                                <tr>
                                                <th>Date Upload</th>
                                                <th>File Name</th>
                                                <th>Description</th>
                                                <th></th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                          <td>cgcgcgcgcgcgccgc</td>
                                          <td>cgcgcgcgcgcgccgc</td>
                                          <td>cgcgcgcgcgcgccgc</td>
                                          <td>cgcgcgcgcgcgccgc</td>
                                         </tr>
                                        </tbody>
                                    </table>

                                </div>











                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
            </div>
        <?php include('../footer.php'); ?>
        </div>
        <?php include('../script.php'); ?>
    </body>
</html>