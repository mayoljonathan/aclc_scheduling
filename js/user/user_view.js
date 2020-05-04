$(document).ready(function(){
	//ADD NEW USER
	$(document).on('click', '#btn_addUser',function(){
		$("#form_submitUser").trigger("reset");
		$('#user_id,#emp_idDup,#firstnameDup,#miDup,#lastnameDup').val("");
		$("#modal_userForm").modal({backdrop:'static', show: true});
		$("#modal_userForm").modal("show");
		$('#modal_userTitle').text('ADD NEW USER');
		$("#btn_submitUser").text("Submit");
	});
	
	// EDIT USER
	$(document).on('click', '#btn_editUser',function(){
		showLoading();

		$("#form_submitUser").trigger("reset");
		var user_id = $(this).val();

		$.post("services/user/GetRow.php",{user_id:user_id},function(data){
			if(data){
				var mi = "";
				if(data[0].mi!=""){
					mi = data[0].mi+".";
				}

				// hidden
				$("#user_id").val(data[0].user_id);
				$("#emp_idDup").val(data[0].emp_id);
				$("#usernameDup").val(data[0].username);
				$("#firstnameDup").val(data[0].firstname);
				$("#miDup").val(data[0].mi);
				$("#lastnameDup").val(data[0].lastname);

				$('#emp_id').val(data[0].emp_id);
				$('#firstname').val(data[0].firstname);
				$('#mi').val(data[0].mi);
				$('#lastname').val(data[0].lastname);
				$('#username').val(data[0].username);
				$('#password').val(data[0].password);
				$("#modal-user_type").val(data[0].user_type);

				$("#modal_userForm").modal({backdrop:'static', show: true});
				$("#modal_userForm").modal("show");
				$('#modal_userTitle').text('EDIT USER ('+ucwords(data[0].lastname)+", "+ucwords(data[0].firstname)+" "+strtoupper(mi)+')');
				$("#btn_submitUser").text("Update");
				hideLoading();
			}else{
				hideLoading();
				alert('Error');
			}
		},"json");
	
	});

});

