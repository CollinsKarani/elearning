<?php
$page_link = pathinfo(curPageURL(),PATHINFO_FILENAME);
function curPageURL() {
 $pageURL = 'http';
 if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
?>
 <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li class="<?php if($page_link != '' && $page_link == 'dashboard'){echo 'active';}?>"> <a href="dashboard"><i class="icon-chevron-right"></i><i class="icon-home"></i>&nbsp;Dashboard</a> </li>
						<li class="<?php if($page_link != '' && $page_link == 'courses' || $page_link == 'add_course' ){echo 'active';}?>">
                            <a href="courses"><i class="icon-chevron-right"></i><i class="icon-list-alt"></i>Courses</a>
                        </li>
						<li class="<?php if($page_link != '' && $page_link == 'programme' || $page_link == 'edit_class'){echo 'active';}?>">
                            <a href="programme"><i class="icon-chevron-right"></i><i class="icon-group"></i>Programmes</a>
                        </li>
						
						<li class="<?php if($page_link != '' && $page_link == 'department' ||$page_link == 'edit_department'){echo 'active';}?>">
                            <a href="department"><i class="icon-chevron-right"></i><i class="icon-building"></i> Departments</a>
                        </li>
						<li class="<?php if($page_link != '' && $page_link == 'students' ||$page_link == 'edit_student' ||$page_link == 'unreg_students' ||$page_link == 'reg_students'){echo 'active';}?>">
                            <a href="students"><i class="icon-chevron-right"></i><i class="icon-group"></i> Students</a>
                        </li>
						<li class="<?php if($page_link != '' && $page_link == 'teachers'){echo 'active';}?>">
                            <a href="teachers"><i class="icon-chevron-right"></i><i class="icon-group"></i> Teachers</a>
                        </li>
						<li class="<?php if($page_link != '' && $page_link == 'downloadable'){echo 'active';}?>">
                            <a href="downloadable"><i class="icon-chevron-right"></i><i class="icon-download"></i> Downloadable Materials</a>
                        </li>
						<li class="<?php if($page_link != '' && $page_link == 'assignment'){echo 'active';}?>">
                            <a href="assignment"><i class="icon-chevron-right"></i><i class="icon-upload"></i> Uploaded Assignments</a>
                        </li>
						<li class="<?php if($page_link != '' && $page_link == 'content'){echo 'active';}?>">
                            <a href="content"><i class="icon-chevron-right"></i><i class="icon-file"></i> Content</a>
                        </li>
						<li class="<?php if($page_link != '' && $page_link == 'user_log'){echo 'active';}?>">
                            <a href="user_log"><i class="icon-chevron-right"></i><i class="icon-file"></i> User Log</a>
                        </li>
						<li class="<?php if($page_link != '' && $page_link == 'activity_log'){echo 'active';}?>">
                            <a href="activity_log"><i class="icon-chevron-right"></i><i class="icon-file"></i> Activity Log</a>
                        </li>
						<li class="<?php if($page_link != '' && $page_link == 'school_year'){echo 'active';}?>">
                            <a href="school_year"><i class="icon-chevron-right"></i><i class="icon-calendar"></i> School Year</a>
                        </li>
						<li class="<?php if($page_link != '' && $page_link == 'calendar_of_events'){echo 'active';}?>">
                            <a href="calendar_of_events"><i class="icon-chevron-right"></i><i class="icon-calendar"></i>Calendar of Events</a>
                        </li>
                    </ul>
                </div>