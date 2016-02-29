############################################################################
<html> 
       <head>
      <title>Simple</title> 
          <link type="text/css" rel="Stylesheet" href="jquery.validity.css" />  
          <script type="text/javascript" src="jquery.js"> </script>        
	  <script type="text/javascript" src="jquery.validity.js"> </script>                    
	  <script type="text/javascript">
  //        
 // This is where validation rules are assigned:    
//       
 $(function() {
    $("form").validity(function() { 
                  $("#vehicles")          
                  .require()
                  .match("number")  
                  .range(4, 12);  

                  $("#dob")
                  .require()
                  .match("date")
                  .lessThanOrEqualTo(new Date());
 	                               });
               });  
//
// That's it! 
// No more setup is necessary!
//                            
		</script>
		</head>
		<body>
<form method="get" action="simple.htm">
  Number of Vehicles: <input type="text" id="vehicles" name="vehicles" title="Vehicle Count" />
	<br /><br />
  Date of birth: <input type="text" id="dob" name="dob" title="Birthday" />(mm-dd-yyyy)
	<br /><br />
				<input type="submit" />
</form>
        </body>
</html>
############################################################################
Go to http://validity.thatscaptaintoyou.com/ for release notes.