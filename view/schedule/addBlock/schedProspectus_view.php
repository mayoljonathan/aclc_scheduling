<?php require '../../../library/config.php'; ?>
<?php require '../../../services/global/convertYear.php'; ?>

<?php 
	extract($_REQUEST);
	$sy_code = $_SESSION['user']['sy_code'];
	$length = strlen($sy_code);
	$currentSem = substr($sy_code, $length-1);
?>

<div class="table-responsive animated fadeIn">
	<?php 
		$getCourses = $dbConn->query("SELECT course_name,course_abbr,course_noYears FROM tbl_course WHERE course_abbr='".$course_abbr."' ");
		while($gc = $getCourses->fetch(PDO::FETCH_ASSOC)) { 
		$course_name = $gc['course_name'];
		$course_abbr = $gc['course_abbr'];
		$course_years = $gc['course_noYears'];
	?>
		<a href="#add_block" id="showCourse_view" class="pull-left"><h2><i class="fa fa-chevron-left"></i>&nbsp;Back</h2></a>
		<div class="pull-right">
			<h1 id="header_course" data-course="<?php echo $course_abbr; ?>"><?php echo strtoupper($course_name); ?></h1>
		</div>
		<?php 
			for($currentYear = 1; $currentYear <= $course_years; $currentYear++){
		?>
					<table class="table table-striped table-bordered table-hover">
						<tr style="background-color: lightsteelblue;">
							<th colspan="4"><h3><?php echo convertYear($currentYear); ?></h3></th>
							<th colspan="2"><h3 class="pull-right"><?php echo ($currentSem=='1') ? 'FIRST SEMESTER' : 'SECOND SEMESTER' ; ?></h3></th>
						</tr>
						<tr style="background-color: gainsboro;">
							<th style="width:75px;">Subject Code</th>
							<th style="width:*;">Subject Title</th>
							<th style="width:60px;">Lec</th>
							<th style="width:60px;">Lab</th>
							<th style="width:60px;">Units</th>
							<th style="width:150px;">Pre-Requisites</th>
						</tr>
						<tbody>
						<?php 
							$getSubjectsByCourse = $dbConn->query("SELECT * FROM tbl_subject WHERE (course_abbr = '".$course_abbr."') AND (year_level = '".$currentYear."') AND (semester = '".$currentSem."') AND (subject_status='1')");
							while($gsbc = $getSubjectsByCourse->fetch(PDO::FETCH_ASSOC)) {
								extract($gsbc);
								$total = $lec + $lab;
								if($subject_status==1){
									$totalUnits_sem += $total;
								}
						?>
							<tr>
								<td style="width:75px;"><?php echo strtoupper($subject_code); ?></td>
								<td style="width:*;"><?php echo ucwords($subject_title); ?></td>
								<td style="width:60px;text-align:center;"><?php echo $lec; ?></td>
								<td style="width:60px;text-align:center;"><?php echo $lab; ?></td>
								<td style="width:60px;text-align:center;"><?php echo $total; ?></td>
								<td style="width:150px;text-align:center;"><?php echo strtoupper($pre_requisite); ?></td>
							</tr>
						<?php } ?>
						</tbody>
						<tfoot>
							<tr class="prospectus_footer">
								<td>&nbsp;</td>
								<td style="border-left-style: inherit;border-right-style: inherit">
									<button id="btn_addBlockSchedule" data-course="<?php echo $course_abbr; ?>" data-year_level="<?php echo $currentYear; ?>" data-semester="<?php echo $currentSem; ?>" style="width:100%" class="btn btn-success"><span style="font-size:18px">Add Block Schedule</span></button>
								</td>
								<td colspan="2">&nbsp;</td>
								<td class="semester_totalUnits"><b><?php echo ($totalUnits_sem!= 0) ? $totalUnits_sem : 0; ?></b></td>
								<td colspan="3">&nbsp;</td>
							</tr>
						</tfoot>
					</table>
					
			<?php 
				$totalUnits_sem = 0;
			?>
			<hr style="margin-top: 30px;
				       margin-bottom: 30px;
				       border: 0;
				       border-top: 2px dashed grey;">
		<?php 
			}
		?>

	<?php } ?>
</div>

<script>
	$(document).on('click','#btn_addBlockSchedule',function(){
		var course_abbr = $(this).data('course');
		var year_level = $(this).data('year_level');
		var semester = $(this).data('semester');

		if(year_level == 1){
			year_level = year_level+"st Year";
		}else if(year_level == 2){
			year_level = year_level+"nd Year";
		}else if(year_level == 3){
			year_level = year_level+"rd Year";
		}else{
			year_level = year_level+"th Year";
		}

		$("#modal_blockSched").modal({backdrop:'static', show: true});
		$("#modal_blockSched").modal("show");
		$('#modal_blockSchedTitle').html('Add Block Schedule for <span id="blockCourse_abbr">'+strtoupper(course_abbr)+'</span> - '+year_level);
	});

	
</script>