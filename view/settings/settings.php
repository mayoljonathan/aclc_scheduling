<?php require_once '../../library/config.php'; ?>
<br>
<div class="tabs-container">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#tab1">School Year</a></li>
        <li class=""><a data-toggle="tab" href="#tab2">Backup Database</a></li>
        <li class=""><a data-toggle="tab" href="#tab3">Restore Database</a></li>
    </ul>

    <div class="tab-content">
    	<div id="tab1" class="tab-pane active">
            <div class="panel-body animated fadeIn">
                <?php require 'schoolyear.php'; ?>
            </div>
        </div>
        <div id="tab2" class="tab-pane">
            <div class="panel-body animated fadeIn">
               	<?php require 'backup-db.php'; ?>
        	</div>
    	</div>
    	<div id="tab3" class="tab-pane">
            <div class="panel-body animated fadeIn">
               	<?php require 'restore-db.php'; ?>
        	</div>
    	</div>
    </div>
</div>

