<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Регистрация</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body class="auth register register-success">
    <div class="auth-layout">
        <div class="auth-form-section">
            <div class="auth-form">
                <div class="logo">
                    <img src="/images/logo.svg" alt="Зелёная школа">
                </div>
                <div class="auth-form-content">
                    <div class="form-title">
                        <h5>Регистрация прошла успешно!</h5>
                    </div>
                    <div class="form-note body-text-large">На указанный email был отправлен пароль для входа в личный
                        кабинет.</div>
                    <div class="form-inner">
                        <div class="form-actions">
                            <a href="<?php echo e(Route('login')); ?>" class="login-button button button__block button__outline button__large">
                                Войти
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/vendor.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
<?php /**PATH C:\OSPanel\domains\green\resources\views/site/success.blade.php ENDPATH**/ ?>