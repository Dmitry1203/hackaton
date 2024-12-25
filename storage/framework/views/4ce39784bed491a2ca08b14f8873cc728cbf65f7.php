<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
    <?php if(!session('success') && !session('emailNotExist')): ?>
    Восстановление пароля. Шаг 1
    <?php else: ?>
    Восстановление пароля. Шаг 2
    <?php endif; ?>
    </title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/css/vendor.css">
    <link rel="stylesheet" href="/css/main.css">
</head>
<body class="auth restore">
    <div class="auth-layout">
        <div class="auth-form-section">
            <a href="<?php echo e(Route('login')); ?>" class="go-back-link button button__large">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_967_13774)">
                        <path d="M15.41 16.59L10.83 12L15.41 7.41L14 6L8 12L14 18L15.41 16.59Z" />
                    </g>
                    <defs>
                        <clipPath id="clip0_967_13774">
                            <rect width="24" height="24" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
                Вернуться назад
            </a>
            <form
                class="auth-form"
                id="pass-form"
                name="pass-form"
                action="<?php echo e(Route('password.store')); ?>"
                method="POST"
                autocomplete="off"
                novalidate
            >
            <?php echo csrf_field(); ?>
            <div class="logo">
                <img src="/images/logo.svg" alt="Зелёная школа">
            </div>
            <div class="form-title">
                <h3>Восстановление пароля</h3>
            </div>
            <?php if(!session('success') && !session('emailNotExist')): ?>
                <div class="form-note body-text-large">Укажите E-mail, который был использован при регистрации в проекте «Зелёная Школа». На него будет отправлено письмо с инструкцией по восстановлению пароля.</div>
            <?php endif; ?>
            <?php if(session('success')): ?>
                <div class="form-note body-text-large text-center">На указанный E-mail отправлено письмо с инструкцией по восстановлению пароля.</div>
                <div class="form-inner">
                    <div class="form-actions">
                        <a href="<?php echo e(Route('login')); ?>" class="login-button button button__block button__outline button__large">Войти</a>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(session('emailNotExist')): ?>
                <div class="form-note body-text-large text-danger text-center">Указанный E-mail не зарегистрирован в проекте «Зелёная Школа».</div>
            <?php endif; ?>
            <?php if(!session('success')): ?>
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
                                value="<?php echo e(session('email')); ?>"
                            >
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="submit-button button button__block button__filled button__large">
                            <span class="loader"></span>
                            <span>Восстановить пароль</span>
                        </button>
                    </div>
                </div>
            <?php endif; ?>
            </form>
        </div>
    </div>
    <script src="/js/vendor.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>
<?php /**PATH C:\OSPanel\domains\green\resources\views/site/password.blade.php ENDPATH**/ ?>