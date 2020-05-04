$(document).ready(function(){
	//set Days
	$(document).on('change','#firstDay', function(){
		var row = $(this).attr("name");
		row = parseInt(row.replace(/[^0-9\.]/g, ''), 10);

		$('select[name="secondDay['+row+']"]').empty();
	    $('select[name="secondDay['+row+']"]').append($('<option>', {
		    value: "",
		    text: ""
		}));

	    var day;
	    var firstDay = $('select[name="firstDay['+row+']"]').find('option:selected').attr('id');

	    if(firstDay == "Monday"){
	    	day = 1;
	    }else if(firstDay == "Tuesday"){
	    	day = 2;
	    }else if(firstDay == "Wednesday"){
	    	day = 3;
	    }else if(firstDay == "Thursday"){
	    	day = 4;
	    }else if(firstDay == "Friday"){
	    	day = 5;
	    }else if(firstDay == "Saturday"){
	    	day = 6;
	    }

	    var totalDays = 6;
	    while(totalDays>day){
	    	day++;

	    	if(day == 1){
	    		secondDay = "Monday";
		    }else if(day == 2){
		    	secondDay = "Tuesday";
		    }else if(day == 3){
		    	secondDay = "Wednesday";
		    }else if(day == 4){
		    	secondDay = "Thursday";
		    }else if(day == 5){
		    	secondDay = "Friday";
		    }else if(day == 6){
		    	secondDay = "Saturday";
		    }

		    // Add the converted day to the dropdown list
	    	$('select[name="secondDay['+row+']"]').append($('<option>', {
			    value: secondDay,
			    text: secondDay
			}));
	    }

		$('select').trigger('chosen:updated');
	});
});

