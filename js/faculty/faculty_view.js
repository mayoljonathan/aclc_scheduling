$(document).ready(function(){
	//ADD NEW INSTRUCTOR
	$(document).on('click', '#btn_addFaculty',function(){
		$("#form_submitFaculty").trigger("reset");
		$('#faculty_idDup,#firstnameDup,#miDup,#lastnameDup').val("");
		$("#modal_facultyForm").modal({backdrop:'static', show: true});
		$("#modal_facultyForm").modal("show");
		$('#modal_facultyTitle').text('ADD NEW INSTRUCTOR');
		$("#btn_submitFaculty").text("Submit");
	});
	// EDIT INSTRUCTOR
	$(document).on('click', '#btn_editFaculty',function(){
		$("#form_submitFaculty").trigger("reset");
		showLoading();
		var id = $(this).val();

		$.post("services/faculty/GetRow.php",{id:id},function(data){
			if(data){
				var mi = "";
				if(data[0].mi!=""){
					mi = data[0].mi+".";
				}
				// convert to uppercase
				data[0].firstname = ucwords(data[0].firstname);
				data[0].mi = ucwords(data[0].mi);
				data[0].lastname = ucwords(data[0].lastname);
				data[0].address = ucwords(data[0].address);

				// hidden duplicates
				$("#id").val(data[0].id);
				$('#faculty_idDup').val(data[0].faculty_id);
				$("#firstnameDup").val(data[0].firstname);
				$("#miDup").val(data[0].mi);
				$("#lastnameDup").val(data[0].lastname);

				$("#faculty_id").val(data[0].faculty_id);
				// general
				$("#firstname").val(data[0].firstname);
				$("#mi").val(data[0].mi);
				$("#lastname").val(data[0].lastname);
				if((data[0].gender)=='MALE'){
					$('#gender_male').prop('checked', true);
				}else{
					$('#gender_female').prop('checked', true);
				}
				$("#address").val(data[0].address);
				$("#email").val(data[0].email);
				$("#mobile").val(data[0].mobile);
				$("#department_id").val(data[0].department_id);
				if((data[0].faculty_type)=='FULL TIME'){
					$('#type_full').prop('checked', true);
				}else{
					$('#type_part').prop('checked', true);
				}

				$("#modal_facultyForm").modal({backdrop:'static', show: true});
				$("#modal_facultyForm").modal("show");
				$('#modal_facultyTitle').text('EDIT INSTRUCTOR ('+data[0].lastname+", "+data[0].firstname+" "+strtoupper(mi)+')');
				$("#btn_submitFaculty").text("Update");
				hideLoading();
			}else{
				hideLoading();
				alert('Error');
			}
		},"json");
	
	});
});

