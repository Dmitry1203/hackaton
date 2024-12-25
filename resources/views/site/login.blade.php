<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Вход</title>
    <link rel="icon" href="/favicon/icon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/favicon/apple-touch-icon.png">
    <link rel="manifest" href="/manifest.webmanifest">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="ЛЕТС ХАК">
    <meta name="description" content="Образовательный интенсив и хакатон «Как участвовать и побеждать в хакатонах»">
    <meta name="robots" content="index,all">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/main.css?<?=sha1(microtime(1))?>">
</head>
<body class="auth login">
    <div class="auth-layout">
        <div class="page-wrapper">
            <div class="auth-promo-section">
                <h1>ЛЕТС ХАК</h1>
                <div class="auth-promo-title title-text-small">
                Образовательный интенсив и хакатон
                <br>«Как участвовать и побеждать в хакатонах»
                </div>

                @if($isAuth)

                    <a href="{{ Route('personal.profile')}}"
                        class="mt-5 register-link button button__block button__outline button__large">Мой профиль</a>

                @endif

            </div>

            @if(!$isAuth)

            <div class="auth-form-section">

                <form
                    id="auth-form"
                    name="auth-form"
                    class="auth-form"
                    action="{{ Route('user.auth') }}"
                    method="POST"
                    autocomplete="off"
                    novalidate
                >
                    @csrf

                    <div class="logo">
                        <img src="./images/letshack-logo.png" alt="ЛЕТС ХАК">
                    </div>

                    <div class="form-title">
                        <h3>Вход</h3>
                    </div>

                    <div class="form-inner">
                        <div class="form-block">
                            <div class="form-group">
                                <label for="email" class="body-text-large">Электронная почта</label>
                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    class="form-control"
                                    placeholder="Email"
                                    data-required="1"
                                    value="{!! session('email') !!}"
                                    >
                                @error('email')
                                <p class="error-message body-text-small">{!! $message !!}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="body-text-large">Пароль</label>
                                <div class="input-group">
                                    <input
                                        type="password"
                                        name="password"
                                        id="password"
                                        class="form-control"
                                        placeholder="Пароль"
                                        data-required="1"
                                        style="width:300px"
                                    >
                                    <div class="password-toggle"></div>
                                </div>
                                @error('password')
                                <p class="error-message body-text-small">{!! $message !!}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-actions">
                            <button class="submit-button button button__block button__filled button__large">
                                <span class="loader"></span>
                                <span>Войти</span>
                            </button>

                            @if (session('authFail'))
                            <div class="body-text-large pb-3 text-danger text-center">Ошибка авторизации</div>
                            @endif

                            {{--
                            <div class="form-actions-wrapper body-text-large">
                                <span>или</span>
                            </div>

                            <a href="{{ Route('register')}}"
                                class="register-link button button__block button__outline button__large">Зарегистрироваться</a>

                            --}}

                            <a href="{{ Route('password')}}"
                                class="restore-link button button__link button__small">Забыли пароль?</a>
                        </div>
                    </div>
                </form>
            </div>

            @endif

        </div>
    </div>
    <script>
        window.onload = function () {
            window.history.pushState(null, "", window.location.href);
            window.onpopstate = function () {
                window.history.pushState(null, "", window.location.href);
            };
        };
    </script>
    <script src="js/vendor.js"></script>
    <script src="js/main.js?<?=sha1(microtime(1))?>"></script>
</body>

</html>