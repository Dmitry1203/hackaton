<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Восстановление пароля. Шаг 3</title>
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
    <link rel="stylesheet" href="/css/main.css">
</head>
<body class="auth restore">
    <div class="auth-layout">
        <div class="auth-form-section">
            <form class="auth-form" novalidate>
                <div class="logo">
                    <img src="/images/letshack-logo.png" alt="ЛЕТС ХАК">
                </div>
                <div class="form-title">
                    <h3>Восстановление пароля</h3>
                </div>
                <div class="form-note body-text-large">{{ $msg }}</div>
                <div class="form-inner">
                    <div class="form-actions">
                        <a href="{{ Route('login') }}" class="login-button button button__block button__outline button__large">
                            Войти
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="/js/vendor.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>