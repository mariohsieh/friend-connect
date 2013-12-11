$(document).ready(function() {

	//set variables
	var users = new Array();
	var profile = new Array();
	var tempID = $("#profile-id").html();

	// toggle profile list or profile wall
	$(document).on("click", ".menu-choice", function() {
		var menuChoice = $(this).html();

		if (menuChoice == "Friends List") {
			$("#action_key").val("friendsList");
			$.post(
				$("form").attr('action'),
				$("form").serialize(),
				function(data) {
					friendsDisplay(data);
				},
				"json"
			);
		} else {
			$("#action_key").val("wall");
		}
	});

	function friendsDisplay(list) {
		users = list;
	
		$("#results").html("");

		$("#results").append(function() {
			var content = "<table id='friends-table'><thead><tr><th id='username' class=''>Username</th><th id='status' class=''>Status</th><th id='relationship' class=''>Relationship</th></tr></thead><tbody>";
			for (var x in list) {
				content += "<tr><td class='user pointer' id='"+list[x]['id']+"'>"+list[x]['username']+"</td><td>\""+list[x]['status']+"\"</td><td>Friend</td></tr>";
			}
			content += "</tbody></table>";
			return content;
		});
		setProfileUser(tempID, users);
	}

	function setProfileUser(id, allusers) {
		for (var x in allusers ) {
			if (id == allusers[x]['id']) {
				$("#display-user").html(allusers[x]['username']+"'s profile");
				$("#display-status").html("\""+allusers[x]['status']+"\"");
				$("#display-email").html("Email: " + allusers[x]['email']);
				$("#display-created").html("Member since " + allusers[x]['created_at']);
				//profile['id'] = allusers[x]['id'];
			}
		}
	}

	// change profile view
	$(document).on("click", ".user", function() {
		tempID = $(this).attr("id");
		setProfileUser(tempID, users);
	});

	$(".menu-choice").click();	
	//console.log(users);

});






