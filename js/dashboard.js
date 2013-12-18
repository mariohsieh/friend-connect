$(document).ready(function() {

	//set variables
	var users = new Array();
	var friends = new Array();
	var profile = new Array();
	var tempID = $("#profile-id").html();
	var loggedID = $("#profile-id").html();

	////////////////////////////  functions ////////////////////////////
	// display users
	function usersDisplay(list) {
		users = list['users'];
		friends = list['friends'];
		//console.log(users);		

		// print results table
		$("#results").html("");
		$("#results").append(function() {
			var content = "<table id='friends-table'><thead>";
			content += "<tr>";
			content += "<th id='username' class=''>Username</th>";
			content += "<th id='status' class=''>Status</th>";
			content += "<th id='relationship'>Relationship</th>";

			// loop to print users
			content += "</tr></thead><tbody>";
			for (var x in users) {
				if (users[x]['id'] != loggedID) {
					content += "<tr class='table-rows'>";
					content += "<td class='user pointer' id='"+users[x]['id']+"'>"+users[x]['username']+"</td>";
					content += "<td class='status'>\""+users[x]['status']+"\"</td>";
					content += "<td id='add"+users[x]['id']+"' class='add-friend pointer' >Add friend</td>";
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
				if (id == loggedID) {
					$("#display-user").html("My profile");
					$("#profileWall").html("My Wall");
				} else {
					$("#display-user").html(allusers[x]['username']+"'s profile");
					$("#profileWall").html(allusers[x]['username'] +"'s Wall");
				}
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

	function friendStatus() {
		if (tempID == loggedID) {
			var flist = new Array();
			for (var i in friends) {
				if (friends[i]['user_id'] == tempID) {
					flist.push(friends[i]['friend_id']);
				} else if (friends[i]['friend_id'] == tempID) {
					flist.push(friends[i]['user_id']);
				}
			}
			//console.log(flist);
			for (var i in flist) {
				$("#add"+flist[i]).removeClass().addClass("friend").html("Friend");
			}
		}
	}

	// display wall and its messages
	function displayWall(data) {
		$("#results").html("");
		var content = "<textarea class='message-input' name='message'></textarea>";
		content += "<input type='hidden' name='profile_id' value='"+tempID+"' />";
		content += "<div class='message-submit pointer'>Post!</div>";
		$("#results").append(content);
		console.log(data);
	}

	// submit function
	function formSubmit() {
		$.post(
			$("form").attr('action'),
			$("form").serialize(),
			function(data) {
				console.log(data);
				usersDisplay(data);
				friendStatus();
			},
			"json"
		);
		//return false;
	}
 
	//////////////////////// event functions ///////////////////////////

	// change profile view & show wall
	$(document).on("click", ".user", function() {
		tempID = $(this).attr("id");
		$("#friendsList").css("display", "none");
		$("#profileWall").addClass("center").css("width", "100%");
		$("#action_key").val("friendsList");
		setProfileUser(tempID, users);
		displayWall(tempID);
	});
	$(document).on("click", "#home", function() { //back to logged-in user
		tempID = loggedID;
		setProfileUser(tempID, users);
		$("#friendsList").css("display", "inline-block");
		$("#profileWall").removeClass("center").css("width", "49%");
		$("#action_key").val("friendsList");
		formSubmit();
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
		//console.log(tempID);
	});

	// toggle profile list or profile wall
	$(document).on("click", ".menu-choice", function() {
		if ($(this).attr("id") == "friendsList") {
			$("#action_key").val("friendsList");
			formSubmit();
		} else {
			$("#action_key").val("wall");
			//displayWall();		
		}

	});

	// add a friend
	$(document).on("click", ".add-friend", function() {
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

	// add message
	$(document).on("click", ".message-submit", function() {
		$("#action_key").before("<input type='hidden' name='poster_id' value='"+loggedID+"' />");
		$("#action_key").val("addMessage");		
		formSubmit();
	});

	/////////// actions on page load ///////////////
	$("#action_key").val("friendsList");
	formSubmit();
	//$(".menu-choice").click();
});











