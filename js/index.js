$(document).ready(function() {
	// action choice on form submission
	$(document).on("click", ".submit", function() {
		var temp = $(this).attr("id");
		switch (temp) {
			case 'register':
				$("#action_key").val("register");
				break;	
			case 'login':
				$("#action_key").val("login");
				break;
			default:
				break;
		}
		//console.log($("#action_key").val());
	});

	// validation checks
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
/*
	$("#ruser").focus(function() {
		var temp = $(this).val();

		if (!checkUsername(temp)) {
			$(this).next().css("background-color", "grey");
		} else {
			$(this).next().css("background-color", "green");
		}
	});

	$("#ruser").focusout(function() {
		var temp = $(this).val();

		if (temp == "" || temp == null) {
			$(this).next().css("background-color", "white");
		} else if (!checkUsername(temp)) {
			$(this).next().css("background-color", "grey");
		} else {
			$(this).next().css("background-color", "green");
		}
	});
*/
	$("#ruser").keyup(function() {
		var temp = $(this).val();
		//console.log(temp);

		if (checkUsername(temp)) {
			$(this).next().css("background-color", "green");
		} else {
			$(this).next().css("background-color", "grey");
		}
	});

	function checkEmail(email) {
		email = email.trim();
		var pattern = /[@]/g;
		var result = email.match(pattern);

		if (email == "" || email == null) {
			return false;
		} else if (result != null && result.length > 1) {
			return false;
		} else {
			var atPosition = email.indexOf("@");
			var dotPosition = email.lastIndexOf(".");

			if (atPosition<1 || dotPosition<atPosition+2 || dotPosition+2 >= email.length) {
				return false;
			} else {
				return true;
			}
		}
	}

	$("#remail").keyup(function() {
		var temp = $(this).val();

		if (checkEmail(temp)) {
			$(this).next().css("background-color", "green");
		} else {
			$(this).next().css("background-color", "grey");
		}
	});

	function checkPassword(pass) {
		if (pass.length < 8) {
			return false;
		} else {
			return true;
		}
	}

	$("#rpass").keyup(function() {
		var temp = $("#rpass").val();

		if (checkPassword(temp)) {
			$(this).next().css("background-color", "green");
		} else {
			$(this).next().css("background-color", "grey");
		}			
	});

	function confirmPassword(pass1, pass2) {
		if (checkPassword(pass1)) {
			if (pass1 === pass2) {
				return true;
			} else {
				return false;
			}
		}
	}

	$("#rpassconf").keyup(function() {
		var temp = $("#rpass").val();
		var temp2 = $(this).val();
		if (temp.length > 0 && temp2.length > 0) {
			if (confirmPassword(temp,temp2)) {
				$("#01,#02, #03, #04").css("background-color", "green");
				//$(this).next().css("background-color", "green");
				//var temp3 = $(this).next().css("background-color");
				//if (temp3 = "green") {
				//	console.log("holla!");
				//}
			} else {
				$(this).next().css("background-color", "grey");
			}
		}
	});

/*
	function checkRegistration() {
		if ($("#01,#02, #03, #04").css("background-color") == "green") {
			console.log("holla!");
		}
	}

	$(".signin-box").keyup(function() {
		checkRegistration();
	});
*/

	$("form").submit(function() {
		$.post(
			$(this).attr('action'),
			$(this).serialize(),
			function(data) {
				$("#overlay").css("display", "block");
				$("#alerts").css("display", "block");
				console.log(data);
				for (var x in data) {
					$("#alerts").append("<p>"+data[x]+"</p>");
				}
			},
			"json"
		);
		return false;
	});

});



















