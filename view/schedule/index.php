<?php require_once '../../library/config.php'; ?>

<div class="row border-bottom white-bg dashboard-header">
    <h2>Schedule Masterlist
        <div>
            <button id="btn_openSubject" class="btn btn-success pull-right">Open Subject for Irregular</button>
        </div>
    </h2>
    
    <div class="radio radio-info radio-inline">
        <input type="radio" id="scheduleTabular_view" name="schedule_style" checked>
        <label for="scheduleTabular_view"> Tabular View </label> &nbsp;&nbsp;
    
        <input type="radio" id="scheduleRoom_view" name="schedule_style">
        <label for="scheduleRoom_view"> By Rooms </label>
    </div>

    
</div>

<div class="page-wrapper">
	<div id="schedule_tabular"></div>
	<div id="schedule_room"></div>
    <div id="room"></div>

    <?php 
    // require '../../view/schedule/modal_scheduleForm.php'; ?>
    <?php require 'modal_openSubject.php'; ?>
</div>
