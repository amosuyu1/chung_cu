<!DOCTYPE html>
<html>
<head>
    <title>{{ $data['subject'] }}</title>
</head>
<body>
    <h2>Xin chào,</h2>
    <p>{{ $data['message'] }}</p>
    <p><strong>Người gửi:</strong> {{ $data['name'] }} ({{ $data['email'] }})</p>
</body>
</html>
