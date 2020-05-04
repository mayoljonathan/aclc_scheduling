function toStandardTime(time){
	var timeLength = time.toString().length;
	
	if(timeLength == 4){
		var hour 	= time.toString().slice(0,1);
		var minute 	= time.toString().slice(2);
	}else if(timeLength == 5){
		var hour 	= time.toString().slice(0,2);
		var minute 	= time.toString().slice(3);
	}

	if(hour < 12){
        if(hour == 0){
        	hour = 12;
     	}

 		time = hour+":"+minute+" AM";
        
  	}else if(hour == 12 && minute == 0){
		time = hour+":"+minute+" NN";
	}else{
 		if(hour != 12){
        	hour -= 12;
     	}
         
     	time =  hour+":"+minute+" PM";
    }

    return time;
}