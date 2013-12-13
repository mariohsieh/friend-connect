$(document).ready(function() {

	//set variables
	var users = new Array();
	var profile = new Array();
	var tempID = $("#profile-id").html();
	var loggedID = $("#profile-id").html();

	////////////////////////////  functions ////////////////////////////
	// display users
	function friendsDisplay(list) {
		users = list;
	
		$("#results").html("");

		$("#results").append(function() {
			var content = "<table id='friends-table'><thead>";
			content += "<tr>";
			content += "<th id='username' class=''>Username</th>";
			content += "<th id='status' class=''>Status</th>";
			content += "<th id='relationship'>Relationship</th>";
			content += "</tr></thead><tbody>";

			// loop to print users
			for (var x in list) {
				if (list[x]['id'] != loggedID) {
					content += "<tr>";
					content += "<td class='user pointer' id='"+list[x]['id']+"'>"+list[x]['username']+"</td>";
					content += "<td>\""+list[x]['status']+"\"</td>";
					//if ( ) {
					content += "<td id='add"+list[x]['id']+"' class='friendship pointer'>Add Friend</td>";
					content += "</tr>";
				}
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
				if (allusers[x]['status'] == "") {
					$("#display-status").html("click to add status");
				} else {
					$("#display-status").html("\""+allusers[x]['status']+"\"");
				}
				$("#display-email").html("Email: " + allusers[x]['email']);
				$("#display-created").html("Member since " + allusers[x]['created_at']);
				profile['id'] = allusers[x]['id'];
			}
		}
	}

	// submit function
	function formSubmit() {
		$.post(
			$("form").attr('action'),
			$("form").serialize(),
			function(data) {
				friendsDisplay(data);
			},
			"json"
		);
		//return false;
	}

	//////////////////////// event functions ///////////////////////////

	// change profile view
	$(document).on("click", ".user", function() {
		tempID = $(this).attr("id");
		//console.log(tempID);
		setProfileUser(tempID, users);
	});

	// hover states for status
	$(document).on("mouseenter", "#display-status", function() {
		if (tempID == loggedID) {
			//alert("hi");
			$(this).css("cursor", "pointer");
		}
	});

	$(document).on("mouseleave", "#display-status", function() {
		$(this).css("cursor", "text");
	});

	// show edit status box
	$(document).on("click", "#display-status", function() {
		if (tempID == loggedID) {
			$("#overlay").fadeIn("fast");
			$(this).css("visibility", "hidden");
			var content = "<input id='edit-status' placeholder='How are you feeling?' type='text' name='edit_status' class='edit' />";
			content += "<div id='edit-submit' class='pointer edit'>update</div>";
			content += "<input type='hidden' name='edit_id' value='"+ profile['id'] + "' class='edit' />";

			$(this).prev().after(content);
		
			if ($(this).html() != "click to add status") {
				var temp = $(this).html();
				var statuslength = temp.length;
				temp = temp.slice(1,statuslength-1);
				$("#edit-status").val(temp);
			}
		}
	});

	// update status
	$(document).on("click", "#edit-submit", function() {
		$("#action_key").val("editStatus");
		formSubmit();
		$("#overlay").css("display", "none");
		$("#display-status").css("visibility", "visible");
		$(".edit").remove();
	});

	// toggle profile list or profile wall
	$(document).on("click", ".menu-choice", function() {
		if ($(this).attr("id") == "friendsList") {
			$("#action_key").val("friendsList");
		} else {
			$("#action_key").val("wall");
		}

		formSubmit();
	});

	// add a friend
	$(document).on("click", ".friendship", function() {
		//alert('hi');
		var temp = $(this).attr('id');
		temp = temp.slice(3);
		//console.log(temp);
		$("#action_key").before("<input id='user_id' type='hidden' name='user_id' value='"+loggedID+"' />");
		$("#action_key").before("<input id='friend_id' type='hidden' name='friend_id' value='"+temp+"' />");
		$("#action_key").val("addFriend");
		formSubmit();
		//console.log($("#user_id").val());
		//console.log($("#friend_id").val());
	});

	/////////// actions on page load ///////////////
	$("#action_key").val("friendsList");
	formSubmit();
	//$(".menu-choice").click();
});











