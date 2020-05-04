<div class="wrapper">
    <div class="row">
    	<form method="POST" action="services/settings/restore-db.php" enctype="multipart/form-data">
    		<div class="col-md-12">
    			<p><strong>Note: </strong>Restoring a database automatically backups your current database.</p>
    		</div>
    		<div class="col-md-6">
    			<input type="file" name="db_file" class="form-control" required>
    		</div>
    		<div class="col-md-6">
    			<input type="submit" class="btn btn-success" value="Restore" />
    		</div>
    	</form>
     </div>
</div>
