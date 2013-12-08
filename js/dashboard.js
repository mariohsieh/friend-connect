$(document).ready(function() {




	$(document).on("click", ".menu-choice", function() {
		var temp = $(this).html();

		if (temp == "Friends List") {
			$("#action_key").val("friendsList");
		} else {
			$("#action_key").val("wall");
		}

		$.post(
			$("form").attr('action'),
			$("form").serialize(),
			function(data) {
				console.log(data);
			},
			"json"
		);
		//return false;
	});

});
