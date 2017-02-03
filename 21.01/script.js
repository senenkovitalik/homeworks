function sendComment() {
	var name = document.getElementById("name").value;
	var email = document.getElementById("email").value;
	var comment = document.getElementById("textarea").value;
	var date = new Date().toLocaleString();

	if (comment === "") {
		alert("Напишіть, будь-ласка, що небудь!");
		return;
	}
	if (name === "") { name = "Anonymous"; }
	if (email === "") { email = "None"; }

	var data = {
		'type': 	'comment',
		'name': 	name,
		'email': 	email,
		'comment': 	comment,
		'date': 	date
	};
	var jsonData = JSON.stringify(data);

	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText) {
				printComment(name, email, comment, date);
			} else {
				alert("Проблеми з сервером або Ви ввели заборонені слова. Будь-ласка, спробуйте ще раз.");
			}
		}
	};
	xmlhttp.open("POST", "serverside.php?q=" + jsonData, true);
	xmlhttp.send();
}

function printComment(name, email, comment, date) {
	var comments = document.getElementById("comments");
	var div = document.createElement("div");
	div.innerHTML =
		'<div class=\"comnt\"><b>'+name+'</b><br>' +
		'<b>'+email+'</b><br>' +
		'<span>'+comment+'</span><br>' +
		'Posted at '+date +
		'</div>';
	comments.insertBefore(div, comments.firstChild); 
}

function addSwarewords() {
	var words = document.getElementById("swarewords").value;

	var data = {
		'type': 	'swareword',
		'words': 	words
	};
	var jsonData = JSON.stringify(data);

	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText) {
				location.reload();
			} else {
				alert("Some problems with server.");
			}
		}
	};
	xmlhttp.open("POST", "serverside.php?q=" + jsonData, true);
	xmlhttp.send();
}