$(document).ready(function() {
	$(".submit").click(function() {
		var temp = $(this).attr("id");
		switch (temp) {
			case 'register':
				$("#action_key").attr("value", "register");
				break;			
		}
		//console.log($("#action_key").val());
	});

	function checkUsername() {
		var temp = 
	}

/*
	$("form").submit(function() {
		$.post(
			$(this).attr('action'),
			$(this).serialize(),
			function(data) {
				//console.log(data.html);
			},
			"json"
		);
		return false;
	});
*/
});
