
function insertData(eventName,eventType,holderName,Email,phoneNumber,guestName,local,date,time,Descrip)
{
	// sends the variables on the right to the insertData.php file to be inserted into the database
	var posting = $.post("insertData.php",{
		event_name  : eventName,
		event_type  : eventType,
		holder_name : holderName,
		email       : Email,
		phone_number: phoneNumber,
		guest_name  : guestName,
		local       : local,
		date		: date,
		time        : time,
		descrip     : Descrip
	
	},
	// alerts the html page when the data is successfully inserted
	function (data)
	{
		$('#result').html(data);
	});
	

	// alerts when data is not inserted successfully
	posting.fail(function(){alert("failed");});
}


// form.html is ready when this function executes
$(document).ready(function(){
	
	// submits data when "submit" button is clicked
	$('#submit').click(function(){
		
		// collects the input off of the id's from the input tags in the form.html file
		var eN   = $('#eventname').val();
		var eT   = $('#course').val();
		var hN   = $('#holdername').val();
		var e    = $('#email').val();
		var pH   = $('#phonenumber').val();
		var gN   = $('#guestname').val();
		var Loc  = $('#location').val();
		var d    = $('#date').val();
		var t    = $('#time').val();
		var desc = $('#description').val();
		
		// calls function to insert data on the user's input
		insertData(eN,eT,hN,e,pH,gN,Loc,d,t,desc);
		

		
		
	});
	
});
