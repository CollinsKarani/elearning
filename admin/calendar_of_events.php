<?php  include('../inc/admin_session.php'); ?>
<?php  include('../inc/admin_header.php'); ?>
    <body>
		<?php include('navbar.php') ?>
        <div class="container-fluid">
            <div class="row-fluid">

					<?php include('sidebar_dashboard.php'); ?>
                <!--/span-->
                <!--/span-->
                <div class="span9" id="content">
								        <div id="block_bg" class="block">
                
								<div class="block-content collapse in">
										<div class="span8">
							<!-- block -->
										<div class="navbar navbar-inner block-header">
											<div class="muted pull-left">Calendar</div>
										</div>
															<div id='calendar'></div>		
										</div>
										
										<div class="span4">
												<?php include('add_class_event.php'); ?>
										</div>	
							<!-- block -->
						
										</div>
                                </div>		
                </div>
            </div>
    
         <?php include('footer.php'); ?>
        </div>
	<?php include('script.php'); ?>
	<?php include('admin_calendar_script.php'); ?>
    </body>

</html>