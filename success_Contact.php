<!DOCTYPE html>
<html>
<head>
	<link href="StyleS.css" rel="stylesheet">
</head>
<body>
    
    <h1>הטופס נשלח בהצלחה</h1>
    
    <div> User name: <span id="user-name"></span></div>
	<div> Mail: <span id="Mail"></span></div>
	<div> Phone: <span id="Phone"></span></div>
	<div> Content: <span id="Content"></span></div>

	<script>
		const username = localStorage.getItem('user-name');
		const mail = localStorage.getItem('Mail');
		const phone = localStorage.getItem('Phone');
		const content = localStorage.getItem('Content');
		document.getElementById('user-name').textContent = username;
		document.getElementById('Mail').textContent = mail;
		document.getElementById('Phone').textContent = phone;
		document.getElementById('Content').textContent = content;
	</script>
</body>
</html>
