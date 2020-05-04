<?php require_once '../../library/config.php'; ?>
<br>
<div class="tabs-container">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#tab1">Class Schedule</a></li>
        <li class=""><a data-toggle="tab" href="#tab2">Instructor Load</a></li>
    </ul>

    <div class="tab-content">
    	<div id="tab1" class="tab-pane active">
            <div class="panel-body animated fadeIn">
               	<?php require 'class-schedule.php'; ?>
        	</div>
    	</div>
    	<div id="tab2" class="tab-pane">
            <div class="panel-body animated fadeIn">
               	<?php require 'instructor-load.php'; ?>
        	</div>
    	</div>
    </div>
</div>

