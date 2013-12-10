$(document).ready(function() {

	//set variables
	var users;

	// toggle profile list or profile wall
	$(document).on("click", ".menu-choice", function() {
		var temp = $(this).html();

		if (temp == "Friends List") {
			$("#action_key").val("friendsList");
			$.post(
				$("form").attr('action'),
				$("form").serialize(),
				function(data) {
					users = data;
					//console.log(data);
					//console.log(users);
					friendsDisplay(data);
				},
				"json"
			);
		} else {
			$("#action_key").val("wall");
		}
	});

	function friendsDisplay(list) {
		$("#results").html("");

		$("#results").append(function() {
			var content = "<table id='friends-table'><thead><tr><th id='username' class=''>Username</th><th id='status' class=''>Status</th><th id='relationship' class=''>Relationship</th></tr></thead><tbody>";
			for (var x in list) {
				content += "<tr><td>"+list[x]['username']+"</td><td>\""+list[x]['status']+"\"</td><td></td></tr>";
			}
			content += "</tbody></table>";
			return content;
		});
	}

	function setProfileUser(id, allusers) {
		for (var x in allusers ) {
			if (id == users[x]['id']) {
				profile['id'] = allusers[x]['id'];
				profile['username'] = allusers[x]['username'];
				profile['email'] = allusers[x]['email'];
				profile['status'] = allusers[x]['status'];
			}
		}
		//console.log(profile);
	}

	var profile = new Array();
	var temp = $("#profile-id").html();
	console.log(temp);
	$(".menu-choice").click();
	//console.log(users);
	//setProfileUser(temp, users);

});






