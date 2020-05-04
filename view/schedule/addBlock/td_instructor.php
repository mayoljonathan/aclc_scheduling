<?php require '../../../library/config.php'; ?>
<?php 
	extract($_REQUEST);
?>

<select class="chosen-select" name="faculty_id[<?php echo $row; ?>]" required>
	<option disabled selected></option>
	<?php 
		$sql = $dbConn->query("SELECT department_id,department_name FROM tbl_department WHERE department_status='1' ");
		while($row = $sql->fetch(PDO::FETCH_ASSOC)){
			extract($row);
	?>
		<optgroup label="<?php echo $department_name ?>">

			<?php 
				$getInstructors = $dbConn->query("SELECT * FROM tbl_faculty WHERE department_id='".$department_id."' AND faculty_status='1' ORDER BY lastname ASC");
				while($gi = $getInstructors->fetch(PDO::FETCH_ASSOC)){
					extract($gi);
					if($mi!=""){
						$mi = $mi.".";
					}
					$fullname=$lastname;

					if($faculty_type=="FULL TIME"){
						$ft = "[FULL] ";
					}else{
						$ft = "[PART] ";
					}
			?>
	           	<option value="<?php echo $faculty_id; ?>" ><?php echo $ft.$fullname; ?></option>
	        <?php 
	        	} 
	        ?>
			</optgroup>
		<?php 
			} 
		?>

</select>

<script>
    $(document).ready(function(){
        $(".chosen-select").chosen({ width:"100%" });
    });
</script>