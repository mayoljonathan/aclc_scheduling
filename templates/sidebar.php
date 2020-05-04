<?php $user_type = $_SESSION['user']['user_type']; ?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> 
                    <span>
                        <a href=""><img alt="image" src="resources/ACLC-Logo.png" style="margin-left: 15px;width:130px;height:150px;" /></a>
                        <h3 class="logo-title">ACLC Scheduling System</h3>
                    </span>
                    
                </div>
                <div class="logo-element">
                    <a href=""><img alt="image" src="resources/ACLC-Logo.png" style="width:50px;height:50px;" /></a>
                </div>
            </li>

            <?php if($user_type == 'ADMIN' || $user_type == 'SECRETARY'){ ?>
            <li id="li_home">
                <a href="#home" id="sb_home"><i class="fa fa-home"></i> <span class="nav-label">Home</span></a>
            </li>
            <?php } ?>
            <?php if($user_type == 'REGISTRAR' || $user_type == 'ADMIN' || $user_type == 'SECRETARY'){ ?>
                <li id="li_subject">
                    <a href="#subject" id="sb_subject"><i class="fa fa-th-large"></i> <span class="nav-label">Subject</span></a>
                </li>
            <?php } ?>
            <?php if($user_type == 'SECRETARY' || $user_type == 'ADMIN'){ ?>
                <li id="li_schedule">
                    <a href="#"><i class="fa fa-calendar"></i> <span class="nav-label">Schedule</span> <span class="fa arrow"></span></a>
                    <ul id="ul_schedule" class="nav nav-second-level">
                        <li><a href="#schedule_list" id="sb_scheduleList">Schedule List</a></li>
                        <li><a href="#add_block" id="sb_addBlock">Add Block Schedule</a></li>
                    </ul>
                </li>
            <?php } ?>
            
            <?php if($user_type == 'REGISTRAR' || $user_type == 'ADMIN'){ ?>
            <li id="li_course">
                <a href="#course" id="sb_course"><i class="fa fa-graduation-cap"></i> <span class="nav-label">Course</span></a>
            </li>
            <?php } ?>
            <?php if($user_type == 'HR' || $user_type == 'ADMIN' || $user_type == 'SECRETARY'){ ?>
            <li id="li_department">
                <a href="#department" id="sb_department"><i class="fa fa-sitemap"></i> <span class="nav-label">Department</span></a>
            </li>
            <li id="li_faculty">
                <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Faculty</span> <span class="fa arrow"></span></a>
                <ul id="ul_faculty" class="nav nav-second-level">
                    <li><a href="#instructor_list" id="sb_instructorList">Instructor List</a></li>
                    <li><a href="#instructor_load" id="sb_instructorLoad">Instructor's Load</a></li>
                </ul>
            </li>
            <?php } ?>
            <?php if($user_type == 'ADMIN' || $user_type == 'SECRETARY'){ ?>
                <li id="li_room">
                    <a href="#room" id="sb_room"><i class="i i-logout"></i> <span class="nav-label">Room</span></a>
                </li>
                <li id="li_report">
                    <a href="#report" id="sb_report"><i class="fa fa-file-text"></i> <span class="nav-label">Reports</span></a>
                </li>
                <li id="li_user">
                    <a href="#user" id="sb_user"><i class="i i-users3"></i> <span class="nav-label">User</span></a>
                </li>
                <li id="li_settings">
                    <a href="#settings" id="sb_settings"><i class="fa fa-cogs"></i> <span class="nav-label">Settings</span></a>
                </li>
            <?php } ?>
            
            
            
        </ul>

    </div>
</nav>