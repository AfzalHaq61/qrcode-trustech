<?php 
$ReqCheck = $Requirement->check([ 
    '../',
    './app/templates/env.txt',
]);
?>
<div class="content">
    <div class="row">
	    <div class="col-sm-12">
		    <!-- BEGIN DIRECTORY & FILE PERMISSION -->
			<table>
				<thead>
					<tr><th>Directory/File Permission</th><th width="100">Writable</th></tr>
				</thead>
				<tbody>
					<?php foreach ($ReqCheck['permissions'] as $key => $value) { ?>
					<tr><td><?php echo $key; ?></td><td><?php echo $value ?></td></tr>
					<?php } ?> 
				</tbody> 
			</table>
			<!-- ENDS DIRECTORY & FILE PERMISSION -->

			<!-- BEGIN CHECK EXTENSION -->
			<table>
				<thead>
					<tr><th>Load Extensions</th><th width="100">Status</th></tr>
				</thead>
				<tbody>
					<?php foreach ($ReqCheck['extensions'] as $key => $value) { ?>
					<tr><td><?php echo $key; ?></td><td><?php echo $value ?></td></tr>
					<?php } ?> 
				</tbody> 
			</table>
			<!-- ENDS EXTENSION -->

			<!-- BEGIN REQUIRE VERSION  -->
			<table>
				<thead>
					<tr><th>Load Version</th><th>Status</th></tr>
				</thead>
				<tbody>
					<?php foreach ($ReqCheck['versions'] as $key => $value) { ?>
					<tr><td><?php echo $key; ?></td><td><?php echo $value ?></td></tr>
					<?php } ?> 
				</tbody> 
			</table>
			<!-- ENDS REQUIRE VERSION -->
			 
			<a href="?step=installation" class="cbtn pull-right">Next <i class="fa fa-forward"></i></a>
		</div>
	</div>
</div>
