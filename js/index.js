$(document).ready(function(){
	var txt = ["JOBS", "COURSES", "OPPORTUNITIES"];
	var counter = 0;
	var inst = setInterval(change, 1000);

	function change() {
		$('.left .container .bottom-line').text(txt[counter]);
		counter++;
		if(counter > 2){
			counter = 0;
		}
	}

	$('.login-div span').click(function(){
		$('.login-div').hide();
		$('.company-div').css({'display':'inline-block'});
	});

	$('.company-div span').click(function(){
		$('.company-div').hide();
		$('.login-div').css({'display':'inline-block'});
	});


	$('#from').submit(function () {
		if ($.trim($("#email").val()) === "" || $.trim($("#password").val()) === "") {
     	   location.href = 'index?error=1';
        return false;
    	}
	});


	//The Follow Button
	$('.suggested .cover button').click(function(){
		$(this).css({'background-color': '#00aced', 'color': '#fff'});
		$(this).text('Following');
	});	

	$('.feed-inside').click(function () {
		$(this).children().find('.hidden').slideDown(100);
	});


	//Click applied bitch
	$('.feed-inside button').click(function(){
		$(this).text('Applied');
	});

	//Showing the new vacany form
	$('button.create').click(function(){
		$('.suggested table').slideDown(100);
		$(this).hide();
	});

	//Sending a notification 
	$('.search-results button').click(function(){

		var id = $(this).attr("id");

		var job_id = $(this).attr("job_id");
		var company_name = $(this).attr("company_name");
		var name = $(this).attr("name");
		
		$.ajax({
			url : 'candidate.php',
			type : 'POST',
			data : { job_id : job_id, company_name : company_name, name : name},
			success: function (msg) {
				$('#'+id).text(msg);
				$('#'+id).css({
					'background-color': '#00ff00',
					'border-color': '#00ff00'
				});
			}
		});


	});


	//Pressing the done button
	$('#done').click(function () {
		history.replaceState(null, null, company);
	});
});