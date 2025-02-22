<!DOCTYPE html>
<html>
<head>
    <title>Gửi Email</title>
</head>
<body>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@error('name')
    <div class="text-danger">{{ $message }}</div>
@enderror
    <form action="{{ route('send.mail') }}" method="POST">
        @csrf
        <input type="text" name="name"  value="{{ old('name') }}" placeholder="Tên của bạn" required>
        <input type="email" name="email" placeholder="Email của bạn" required>
        <input type="text" name="subject" placeholder="Tiêu đề" required>
        <textarea name="message" placeholder="Nội dung" required></textarea>
        <button type="submit">Gửi Email</button>
    </form>
</body>
</html>
