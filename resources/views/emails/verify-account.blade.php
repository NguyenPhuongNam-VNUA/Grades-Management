<h3>Hi: {{ $lecture->fullname }} </h3>

<p>
    <a href="{{ route('login.verify', $token) }}">Bấm vào đây để xác thực</a>
</p>