<!-- This is shared code for -->
<!-- left -->

<ul class="left-menu">	
	<li>
		<a class="btn btn-link">Content</a>
	</li>
	<li>
		<a href="<?php echo site_url('admin/new_post'); ?>" class="btn btn-link"><span class="glyphicon glyphicon-pencil"></span> New post</a>
	</li>
	<li>
		<a href="<?php echo site_url('admin/list_posts'); ?>" class="btn btn-link"><span class="glyphicon glyphicon-folder-close"></span> Posts</a>
	</li>
	<li>
		<a href="<?php echo site_url('admin/createCategory'); ?>" class="btn btn-link"><span class="glyphicon glyphicon-folder-open"></span> New Category</a>
	</li>
	<li>
		<a href="<?php echo site_url("admin/upload"); ?>" class="btn btn-link"><span class="glyphicon glyphicon-picture"></span> Media</a>
	</li>
</ul>
<br />
<ul class="left-menu">	
	<li>
		<a class="btn btn-link">Users</a>
	</li>
	<li>
		<a href="<?php echo site_url('admin/inbox'); ?>" class="btn btn-link"><span class="glyphicon glyphicon-send"></span> Inbox</a>
	</li>
	<li>
		<a href="<?php echo site_url('admin/users'); ?>" class="btn btn-link"><span class="glyphicon glyphicon-user"></span> Users</a>
	</li>
	<li>
		<a class="btn btn-link"><span class="glyphicon glyphicon-user"></span> User activity</a>
	</li>
	<li>
		<a class="btn btn-link"><span class="glyphicon glyphicon-comment"></span> Comments</a>
	</li>
</ul>
<br />
<ul class="left-menu">	
	<li>
		<a class="btn btn-link">System details</a>
	</li>
	<li>
		<a class="btn btn-link"><span class="glyphicon glyphicon-cog"></span> PHP Version <span class="system-data"><?php echo phpversion(); ?></span></a>
	</li>
	<li>
		<a class="btn btn-link"><span class="glyphicon glyphicon-folder-close"></span> ROOT folder <span class="system-data"><?php echo $_SERVER['DOCUMENT_ROOT']; ?></span></a>
	</li>
	<li>
		<a class="btn btn-link"><span class="glyphicon glyphicon-blackboard"></span> operating system <span class="system-data"><?php echo PHP_OS; ?></span></a>
	</li>
	<li>
		<a class="btn btn-link"><span class="glyphicon glyphicon-hdd"></span> Free space <span class="system-data"><?php echo number_format( diskfreespace("/") / 1024 / 1024, "2"); ?> MB</span></a>
	</li>
</ul>