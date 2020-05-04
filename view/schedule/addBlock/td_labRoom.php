<?php require '../../../library/config.php'; ?>
<?php 
    extract($_REQUEST);
?>

<select class="chosen-select" name="lab_room[<?php echo $row; ?>]" required>
    <option readonly></option>
    <optgroup label="LABORATORY">
        <?php

        $sql = $dbConn->query("SELECT * FROM tbl_room WHERE room_type='LABORATORY' AND room_status='1' ");
        while($row = $sql->fetch(PDO::FETCH_ASSOC)) { 
        	extract($row);
        ?>
            <option value="<?php echo strtoupper($room_name); ?>" ><?php echo strtoupper($room_name); ?></option>

        <?php } ?>
    </optgroup>
</select>

<script>
    $(document).ready(function(){
        $(".chosen-select").chosen({ width:"100%" });
    });
</script>