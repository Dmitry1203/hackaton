<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Вход</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body class="auth login">
    <div class="auth-layout">
        <div class="page-wrapper">
            <div class="auth-promo-section">
                <?php if(session('success')): ?>
                <div class="callout">
                    <h5>Регистрация прошла успешно!</h5>
                    <p>На указанный email был отправлен пароль для входа в личный кабинет.</p>
                </div>
                <?php endif; ?>
                <h1>Зелёная Школа: Онлайн школа</h1>
                <div class="auth-promo-title title-text-small">
                    «Зелёная Школа» — это проектно-ориентированный проект для подростков от 14 до 18 лет по созданию
                    школьных городских садов
                </div>
            </div>
            <div class="auth-form-section">

                <form id="auth-form" name="auth-form" class="auth-form" action="<?php echo e(Route('user.auth')); ?>" method="POST"
                    autocomplete="off" novalidate>
                    <?php echo csrf_field(); ?>

                    <div class="logo">
                        <img src="./images/logo.svg" alt="Зелёная школа">
                    </div>
                    <div class="form-title">
                        <h3>Вход</h3>
                    </div>

                    <div class="form-inner">
                        <div class="form-block">
                            <div class="form-group">
                                <label for="email" class="body-text-large">Электронная почта</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                                    data-required="1" value="<?php echo session('email'); ?>">
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="error-message body-text-small"><?php echo $message; ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="password" class="body-text-large">Пароль</label>
                                <div class="input-group">
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Пароль" data-required="1">
                                    <div class="password-toggle"></div>
                                </div>
                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="error-message body-text-small"><?php echo $message; ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button class="submit-button button button__block button__filled button__large">
                                <span class="loader"></span>
                                <span>Войти</span>
                            </button>

                            <?php if(session('authFail')): ?>
                            <div class="body-text-large pb-3 text-danger text-center">Ошибка авторизации</div>
                            <?php endif; ?>

                            <div class="form-actions-wrapper body-text-large">
                                <span>или</span>
                            </div>
                            <a href="<?php echo e(Route('register')); ?>"
                                class="register-link button button__block button__outline button__large">Зарегистрироваться</a>
                            <a href="<?php echo e(Route('password')); ?>"
                                class="restore-link button button__link button__small">Забыли пароль?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="js/vendor.js"></script>
    <script src="js/main.js"></script>
</body>

</html><?php /**PATH C:\OSPanel\domains\green\resources\views/site/login.blade.php ENDPATH**/ ?>