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

	function checkUsername(name) {
		name = name.trim();
		var pattern = /^[A-Za-z0-9]+$/g;
		var result = pattern.test(name);
		//console.log(result);		

		if (name == "" || name == null) {
			return false;
		} else if (name.length < 3) {
			return false;
		} else if (!result) {
			return false;			
		} else {
			return true;
		}
	}

	$("#ruser").keyup(function() {
		var temp = $(this).val();
		//console.log(temp);

		if (checkUsername(temp)) {
			$(this).next().css("background-color", "green");
		} else {
			$(this).next().css("background-color", "red");
		}
	});

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
