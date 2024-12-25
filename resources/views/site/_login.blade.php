<!DOCTYPE html>
<head><title>Вход</title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="MobileOptimized" content="320">
    <meta name="HandheldFriendly" content="True">
    <meta name="keywords" content="Зеленая школа 2022">
    <meta name="description" content="Зеленая школа 2022">
    <meta name="robots" content= "index,all">
    <link rel="stylesheet" href="/css/vendor.css">
</head>
<body class="hold-transition login-page">
	<div class="login-box">
        @if (session('success'))
            <div class="callout callout-success">
                <h5>Регистрация прошла успешно!</h5>
                <p>На указанный email был отправлен пароль для входа в личный кабинет.</p>
            </div>
        @endif

		<div class="card card-outline card-success">
		<div class="card-header text-center"><h2>Зеленая школа 2022</h2></div>
		<div class="card-body">

            <form
                id="auth-form"
                name="auth-form"
                action="{{ Route('user.auth') }}"
                method="POST"
                autocomplete="off"
            >
            @csrf
			<div class="input-group mt-2">
				<input
                    type="email"
                    name="email"
                    id="email"
                    class="form-control"
                    placeholder="Email"
                    value="{!! session('email') !!}"
				>
				<div class="input-group-append">
					<div class="input-group-text">
					<div class="iconify btn__icon" data-icon="mdi:email-check-outline"></div>
					</div>
				</div>
			</div>
            @error('email')
                <div class="text-danger">{!! $message !!}</div>
            @enderror

			<div class="input-group mt-4">
				<input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control"
                    placeholder="Пароль"
				>
				<div class="input-group-append">
					<div class="input-group-text">
					<div class="iconify btn__icon" data-icon="mdi:lock-check-outline"></div>
					</div>
				</div>
			</div>
            @error('password')
                <div class="text-danger">{!! $message !!}</div>
            @enderror

			<div class="row mt-4 mb-2">
				<div class="col-12">
				    <button type="submit" class="btn btn-success btn-block mt-1">Войти</button>
				</div>
			</div>
            </form>
            <div class="text-center p-2">
                <a href="{{ Route('register')}}" class="p-3">Регистрация</a>
                <a href="{{ Route('password')}}" class="p-3">Забыли пароль?</a>
            </div>
		</div>
	</div>
    @if (session('authFail'))
        <div class="p-3 warning-note text-danger text-center">Ошибка авторизации</div>
    @endif
</div>
<script src="/js/vendor.js"></script>
<script src="/js/iconify.min.js"></script>
</body>
</html>