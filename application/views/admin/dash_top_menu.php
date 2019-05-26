<div class="row">
	<div class="col-sm-12">
		<!-- Basic navigation menu -->
		<nav class="navbar navbar-inverse">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <a class="navbar-brand" href="#">RBLOGCMS</a>
			    </div>
			    <ul class="nav navbar-nav">
			      <li><a href="<?php echo site_url(); ?>"><span class="glyphicon glyphicon-eye-open"></span> Visit Page</a></li>
				      <li class="dropdown">
				        	<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-pencil"></span> Content
				        	<span class="caret"></span></a>
					        <ul class="dropdown-menu">
					          <li><a href="<?php echo site_url('admin/new_post'); ?>">New Post</a></li>
					          <li><a href="<?php echo site_url('admin/createCategory'); ?>">Add Category</a></li>
					          <li><a href="<?php echo site_url('admin/list_posts'); ?>">View Posts</a></li>
					          <li><a href="<?php echo site_url("admin/category"); ?>">View Categories</a></li>
					        </ul>
				      </li>
			         <li class="dropdown">
				        	<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Users
				        	<span class="caret"></span></a>
					        <ul class="dropdown-menu">
					          <li><a href="<?php echo site_url('admin/users'); ?>">See All Users</a></li>
					          <li><a href="#">Control Comments</a></li>
					        </ul>
				      </li>
				      <li class="dropdown">
				        	<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-picture"></span> Media
				        	<span class="caret"></span></a>
					        <ul class="dropdown-menu">
					          <li><a href="<?php echo site_url("admin/upload"); ?>">Upload file</a></li>
					          <li><a href="<?php echo site_url("admin/media_upload"); ?>">See Uploaded files</a></li>
					        </ul>
				      </li>
			    </ul>
			    <ul class="nav navbar-nav navbar-right">
			      <li class="dropdown">
			        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-cog"></span>
			        <span class="caret"></span></a>
			        <ul class="dropdown-menu">
			          <li><a href="<?php echo site_url(); ?>">Visit Page</a></li>
			          <li><a href="<?php echo site_url("login/logout"); ?>">LogOut</a></li>
			        </ul>
			      </li>
			    </ul>
			  </div>
		</nav> 
	</div>

</div>