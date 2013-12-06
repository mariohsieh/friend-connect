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

	/////////////// validation checks //////////////////
	// username check
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

	// email address check
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

	// password check
	function checkPassword(pass) {
		if (pass.length < 8) {
			return false;
		} else {
			return true;
		}
	}

	// confirm password check
	function confirmPassword(pass1, pass2) {
		if (checkPassword(pass1)) {
			if (pass1 === pass2) {
				return true;
			} else {
				return false;
			}
		}
	}

	// focus in status update
	$("#ruser, #remail, #rpass, #rpassconf").focus(function() {
		var temp = $(this).val();
		var id = $(this).attr("id");
		switch (id) {
			case 'ruser':
				if (!checkUsername(temp)) {
					$(this).next().css("background-color", "grey");
				} else {
					$(this).next().css("background-color", "green");
				}
				break;
			case 'remail':
				if (!checkEmail(temp)) {
					$(this).next().css("background-color", "grey");
				} else {
					$(this).next().css("background-color", "green");
				}
				break;
			case 'rpass':
				if (!checkPassword(temp)) {
					$(this).next().css("background-color", "grey");
				} else {
					$(this).next().css("background-color", "green");
				}
				break;
			case 'rpassconf':
				var temp2 = $("#rpass").val();
				if (!confirmPassword(temp2, temp)) {
					$(this).next().css("background-color", "grey");
				} else {
					$(this).next().css("background-color", "green");
				}
				break;				
			default:
				break;
		}
	});

	// focus out status update
	$("#ruser, #remail, #rpass, #rpassconf").focusout(function() {
		var temp = $(this).val();
		var id = $(this).attr("id");
		switch (id) {
			case 'ruser':
				if (temp == "" || temp == null) {
					$(this).next().css("background-color", "white");
				} else if (!checkUsername(temp)) {
					$(this).next().css("background-color", "grey");
				} else {
					$(this).next().css("background-color", "green");
				}
				break;
			case 'remail':
				if (temp == "" || temp == null) {
					$(this).next().css("background-color", "white");
				} else if (!checkEmail(temp)) {
					$(this).next().css("background-color", "grey");
				} else {
					$(this).next().css("background-color", "green");
				}
				break;
			case 'rpass':
				if (temp == "" || temp == null) {
					$(this).next().css("background-color", "white");
				} else if (!checkPassword(temp)) {
					$(this).next().css("background-color", "grey");
				} else {
					$(this).next().css("background-color", "green");
				}
				break;
			case 'rpassconf':
				var temp2 = $("#rpass").val();
				if (temp == "" || temp == null) {
					$(this).next().css("background-color", "white");
				} else if (!confirmPassword(temp2, temp)) {
					$(this).next().css("background-color", "grey");
				} else {
					$(this).next().css("background-color", "green");
				}
				break;
			default:
				break;
		}
	});

	// key press status update
	$("#ruser, #remail, #rpass, #rpassconf").keyup(function() {
		var temp = $(this).val();
		var id = $(this).attr("id");
		switch (id) {
			case 'ruser':
				if (checkUsername(temp)) {
					$(this).next().css("background-color", "green");
				} else {
					$(this).next().css("background-color", "grey");
				}
				break;
			case 'remail':
				if (checkEmail(temp)) {
					$(this).next().css("background-color", "green");
				} else {
					$(this).next().css("background-color", "grey");
				}
				break;
			case 'rpass':
				if (checkPassword(temp)) {
					$(this).next().css("background-color", "green");
				} else {
					$(this).next().css("background-color", "grey");
				}
				break;
			case 'rpassconf':
				var temp2 = $("#rpass").val();
				if (temp.length > 0 && temp2.length > 0) {
					if (confirmPassword(temp2, temp)) {
						$(this).next().css("background-color", "green");
					} else {
						$(this).next().css("background-color", "grey");
					}
				}
				break;
			default:
				break;
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

	$(document).on("click", ".clear", function() {
		$(".check-dot").css("background-color", "white");
	});

	$("form").submit(function() {
		$.post(
			$(this).attr('action'),
			$(this).serialize(),
			function(data) {
				$("#overlay").css("display", "block");
				$("#alerts").css("display", "block");
				//console.log(data);
				for (var x in data) {
					$("#alerts").prepend("<p>"+data[x]+"</p>");
				}
			},
			"json"
		);
		return false;
	});

	$(document).on("click", ".alert-but", function() {
			$("#alerts p").empty();
			$("#overlay").css("display", "none");
			$("#alerts").css("display", "none");
			
	});

});



















