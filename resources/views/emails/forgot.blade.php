<html>
<head>
</head>
<body>

Dear {{ $content['name'] }},<br><br>

Here your updated account login credentials:<br>
Email: {{ $content['email'] }}<br>
Password: {{ $content['password'] }}<br><br>

Kindly login your account and reset your current password.  <br><br>

For any further queries/assistance, kindly mail us at {{ $content['support_email'] }}> <br><br>

Regards,<br>
{{ $content['team_name'] }}<br>
{{ $content['site_name'] }}
<br>
<hr>
</body>
</html>
 