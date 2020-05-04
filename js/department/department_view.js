$(document).ready(function(){
	//ADD NEW DEPARTMENT
	$(document).on('click', '#btn_addDepartment',function(){
		$("#form_submitDepartment").trigger("reset");
		$('#department_id,#department_nameDup').val("");
		$("#modal_departmentForm").modal({backdrop:'static', show: true});
		$("#modal_departmentForm").modal("show");
		$('#modal_departmentTitle').text('ADD NEW DEPARTMENT');

		$('#department_head,#department_headLabel').hide();
		$("#btn_submitDepartment").text("Submit");
	});

	// EDIT DEPARTMENT
	$(document).on('click', '#btn_editDepartment',function(){
		$("#form_submitDepartment").trigger("reset");
		showLoading();
		var department_id = $(this).val();
		var department_name = $(this).data('department_name');

		$.post("services/department/GetRow.php",{department_id:department_id,department_name:department_name},function(data){
			if(data[0]["response"]=="success"){
				
				$('#department_head').empty();
				$('#department_head').append($('<option>', {value: "",text: "" }).trigger('chosen:updated'));

				// appends all faculty members in that department in the select
				for(var i=1;i < data.length; i++){
					if(data[i].mi!=""){
						data[i].mi = data[i].mi+".";
					}
					$('#department_head').append($('<option>', {
						value: data[i].faculty_id,
					    text: ucwords(data[i].lastname) +", "+ ucwords(data[i].firstname)+" "+ ucwords(data[i].mi)
					})).trigger('chosen:updated');

				}
				// hidden
				$("#department_id").val(data[1].department_id);
				$("#department_nameDup").val(data[1].department_name);

				// set values
				$("#department_name").val(strtoupper(data[1].department_name));
				$("#department_head").val(strtoupper(data[1].department_head));
	        	// $("#department_head option[value='"+data[1].department_head+"']").prop("selected",true).trigger("chosen:updated");

				$("#modal_departmentForm").modal({backdrop:'static', show: true});
				$("#modal_departmentForm").modal("show");
				$('#modal_departmentTitle').text('EDIT DEPARTMENT ('+strtoupper(data[1].department_name)+')');
				$('#department_head,#department_headLabel').show();
				$("#btn_submitDepartment").text("Update");
				hideLoading();
			}else if(data[0]["response"]=="empty"){
				$('#department_head').empty();
				$('#department_head').append($('<option>', {value: "",text: "No faculty members in this department" }));

				// hidden
				$("#department_id").val(data[0].department_id);
				$("#department_nameDup").val(data[0].department_name);
				// set values
				$("#department_name").val(strtoupper(data[0].department_name));

				$("#modal_departmentForm").modal({backdrop:'static', show: true});
				$("#modal_departmentForm").modal("show");
				$('#modal_departmentTitle').text('EDIT DEPARTMENT ('+strtoupper(data[0].department_name)+')');
				$('#department_head,#department_headLabel').show();
				$("#btn_submitDepartment").text("Update");
				hideLoading();
			}else{
				hideLoading();
				alert('Error');
			}
		},"json");
	
	});
});




