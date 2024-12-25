<!DOCTYPE html>
<html lang="ru">
<head>
    <title>
    @if (!session('success') && !session('emailNotExist'))
    Восстановление пароля. Шаг 1
    @else
    Восстановление пароля. Шаг 2
    @endif
    </title>
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
    <link rel="stylesheet" href="/css/vendor.css">
    <link rel="stylesheet" href="/css/main.css?<?=sha1(microtime(1))?>">
</head>
<body class="auth restore">

    @if($isAuth)

    <div class="text-center">
        <div class="form-title">
        <h5>Вы авторизованы</h5>
        </div>

        <a href="{{ Route('personal.profile')}}"
                class="mt-5 register-link button button__block button__outline button__large">Мой профиль</a>
    </div>

    @else

    <div class="auth-layout">

        <div class="auth-form-section">

            <form
                class="auth-form"
                id="pass-form"
                name="pass-form"
                action="{{ Route('password.store') }}"
                method="POST"
                autocomplete="off"
                novalidate
            >
            @csrf
            <div class="logo">
                <img src="/images/letshack-logo.png" alt="ЛЕТС ХАК">
            </div>
            <div class="form-title">
                <h3>Восстановление пароля</h3>
            </div>
            @if (!session('success') && !session('emailNotExist'))
                <div class="form-note body-text-large">
                Укажите E-mail, который Вы указали при регистрации.
                На него будет отправлено письмо с инструкцией по восстановлению пароля.</div>
            @endif
            @if (session('success'))
                <div class="form-note body-text-large text-center">На указанный E-mail отправлено письмо с инструкцией по восстановлению пароля.</div>
                <div class="form-inner">
                    <div class="form-actions">
                        <a href="{{ Route('login') }}" class="login-button button button__block button__outline button__large">Войти</a>
                    </div>
                </div>
            @endif
            @if (session('emailNotExist'))
                <div class="form-note body-text-large text-danger text-center">Указанный E-mail не зарегистрирован.</div>
            @endif
            @if (!session('success'))
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
                                value="{{ session('email') }}"
                            >
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="submit-button button button__block button__filled button__large">
                            <span class="loader"></span>
                            <span>Восстановить пароль</span>
                        </button>

                        <div class="form-actions-wrapper body-text-large">
                            <span>или</span>
                        </div>

                        <a href="{{ Route('login')}}" class="submit-button button button__block button__outline button__large">Войти</a>

                    </div>

                </div>
            @endif

            </form>
        </div>
    </div>

    @endif

    <script src="/js/vendor.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>
