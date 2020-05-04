<?php 
   function convertDay($day){
      
      if($day == "Monday"){
         $day = "M";
      }else if($day == "Tuesday"){
         $day = "T";
      }else if($day == "Wednesday"){
         $day = "W";
      }else if($day == "Thursday"){
         $day = "TH";
      }else if($day == "Friday"){
         $day = "F";
      }else if($day == "Saturday"){
         $day = "S";
      }

      return $day;
   }
?>