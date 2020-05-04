<?php require '../../library/config.php'; ?>
<?php require '../../services/global/convertYear.php'; ?>

<?php 
	extract($_REQUEST);
?>

<div class="table-responsive animated fadeIn">
	<?php 
		$getCourses = $dbConn->query("SELECT course_name,course_abbr,course_noYears FROM tbl_course WHERE course_abbr='".$course_abbr."'");
		while($gc = $getCourses->fetch(PDO::FETCH_ASSOC)) { 
		$course_name = $gc['course_name'];
		$course_abbr = $gc['course_abbr'];
		$course_years = $gc['course_noYears'];
	?>
		<a href="#subject" id="subjectProspectus_view" class="pull-left"><h2><i class="fa fa-chevron-left"></i>&nbsp;Back</h2></a>
		<div class="pull-right">
			<h1 id="header_course" data-course="<?php echo $course_abbr; ?>"><?php echo strtoupper($course_name); ?></h1>
		</div>
		<?php 
			$course_semester = 2;
			
			for($currentYear = 1; $currentYear <= $course_years; $currentYear++){
				for($currentSem = 1; $currentSem <= $course_semester; $currentSem++){
					
		?>
					<table class="table table-striped table-bordered table-hover" id="table_prospectus">
						<tr style="background-color: lightsteelblue;">
							<th colspan="6"><h3><?php echo convertYear($currentYear); ?></h3></th>
							<th colspan="2"><h3 class="pull-right"><?php echo ($currentSem=='1') ? 'FIRST SEMESTER' : 'SECOND SEMESTER' ; ?></h3></th>
						</tr>
						<tr style="background-color: gainsboro;">
							<th style="width:75px;">Subject Code</th>
							<th style="width:*;">Subject Title</th>
							<th style="width:60px;">Lec</th>
							<th style="width:60px;">Lab</th>
							<th style="width:60px;">Units</th>
							<th style="width:150px;">Pre-Requisites</th>
							<th style="width:80px;">Status</th>
							<th style="width:95px;">Action</th>
						</tr>
						<tbody>
						<?php 
							$getSubjectsByCourse = $dbConn->query("SELECT * FROM tbl_subject WHERE (course_abbr = '".$course_abbr."') AND (year_level = '".$currentYear."') AND (semester = '".$currentSem."') ");
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
								<td style="width:80px;text-align:center;"><?php echo ($subject_status==1)? '<b><font color="#17b566">Active</font></b>' : '<b><font color="red">Inactive</font></b>' ; ?></td>
								<td style="width:95px;">
									<button id="btn_editSubject" class="btn btn-success btn-sm" value="<?php echo $subject_id; ?>"><i class="fa fa-edit"></i></button>
									<?php echo ($subject_status==1)? '<button id="btn_inactiveSubject" value="'.$subject_id.'" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>' : '<button id="btn_activeSubject" value="'.$subject_id.'" class="btn btn-primary btn-sm"><i class="fa fa-check"></i></button>'; ?>
								</td>
							</tr>
						<?php } ?>
						</tbody>
						<tfoot>
							<tr class="prospectus_footer">
								<td colspan="4">&nbsp;</td>
								<td class="semester_totalUnits"><b><?php echo ($totalUnits_sem!= 0) ? $totalUnits_sem : 0; ?></b></td>
								<td colspan="3">&nbsp;</td>
							</tr>
						</tfoot>
					</table>
					
			<?php 
				$totalUnits_sem = 0;

				}
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


