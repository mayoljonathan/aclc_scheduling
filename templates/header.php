<div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary"><i class="fa fa-bars"></i> </a>
        </div>

        <?php 
            $fullname = $_SESSION['user']['fullname'];
            $user_type = $_SESSION['user']['user_type'];
            $sy_code = $_SESSION['user']['sy_code'];
        ?>
        <div>
            <input type="hidden" name="user_fullname" id="user_fullname" value="<?php echo $fullname; ?>">
            <input type="hidden" name="user_type" id="user_type" value="<?php echo $user_type; ?>">
            <input type="hidden" name="sy_code" id="sy_code" value="<?php echo $sy_code; ?>">
        </div>


        <ul class="nav navbar-top-links navbar-right">
            <li>
                <a data-toggle="dropdown" class="dropdown-toggle">
                    <strong class="text-muted">School Year</strong> 
                    <span class="block sy_codeholder"><?php echo $sy_code; ?> <b class="caret"></b></span> 
                </a>
                <ul class="dropdown-menu animated fadeInDown m-t-xs" style="min-width: 130px;">
                    <?php
                        if($user_type == 'ADMIN'){
                            $getSy = $dbConn->query("SELECT * FROM tbl_schoolyear");
                            while($row = $getSy->fetch(PDO::FETCH_ASSOC)){ ?>
                            <li><a class="header_sy" data-sy_code="<?php echo $row['schoolyear_code']; ?>"><?php echo $row['schoolyear_code']; ?></a></li>
                            <?php } ?>
                    <?php }else{ ?>
                    <?php
                        $getSy = $dbConn->query("SELECT * FROM tbl_schoolyear WHERE schoolyear_status = '1' ");
                        while($row = $getSy->fetch(PDO::FETCH_ASSOC)){ ?>
                        <li><a class="header_sy" data-sy_code="<?php echo $row['schoolyear_code']; ?>"><?php echo $row['schoolyear_code']; ?></a></li>
                    <?php }} ?>
                </ul>

            </li>
            <li>
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <span class="thumb-sm avatar pull-left">
                    <img alt="image" class="img-circle" src="resources/default.png" style="width:40px;margin-right:10px;margin-top:-5px;" />
                </span>
                    <strong class="text-muted"><?php echo ucwords($fullname); ?></strong> 
                    <span class="text-xs block"><?php echo $user_type; ?> <b class="caret"></b></span> 
                </a>
                <ul class="dropdown-menu animated fadeInDown m-t-xs">
                <?php if($user_type == 'ADMIN' || $user_type == 'SECRETARY'){ ?>
                    <li><a href="#settings" id="sb_settings"><i class="fa fa-cogs"></i> Settings</a></li>
                    <li class="divider"></li>
                <?php } ?>
                    <li><a href="#" id="logout"><i class="fa fa-sign-out"></i> Log out</a></li>
                </ul>
            </li>
        </ul>

    </nav>
</div>

<script>
    $('.header_sy').on('click',function(){
        var sy_code = $(this).data('sy_code');
        $.post('templates/changeSY.php',{sy_code:sy_code},function(data){
            if(data.response=='success'){
                $('#sy_code').val(sy_code);
                $('.sy_codeholder').html(sy_code+' <b class="caret"></b>');

                setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 2000
                    };
                    $.when(toastr.success('School Year has been changed to <b>'+sy_code+'</b>. <br><br>Reloading current view after 2 seconds.')).done(function(){
                        setTimeout(function(){
                            location.reload();
                        },2000);
                    });
                }, 200);
            }else{
                setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 4000
                    };
                    toastr.error('Something error happened. <br>Ask assistance for system administrator');
                }, 200);
            }
        },'json');
    });
</script>