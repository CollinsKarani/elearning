<?php  include('../inc/admin_session.php'); ?>
<?php  include('../inc/admin_header.php'); ?>
    <body>
		<?php include('navbar.php') ?>
        <div class="container-fluid">
            <div class="row-fluid">

					<?php include('sidebar_dashboard.php'); ?>
                <!--/span-->

                <div class="span9" id="content">
                     <div class="row-fluid">
					 <a href="" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> </a>
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Content</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<form action="delete_content.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<a data-toggle="modal" href="#content_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
									<?php include('modal_delete.php'); ?>									
									<thead>
										        <tr>

											     <th></th>
												 <th>Title</th>
												 <th></th>
                                   
												</tr>
												
										</thead>
										<tbody>

										</tbody>
									</table>
									</form>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>

</html>