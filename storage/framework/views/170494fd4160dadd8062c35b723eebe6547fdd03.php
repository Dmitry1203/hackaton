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

<body class="auth register">
    <div class="auth-layout">
        <div class="auth-form-section">
            <form id="register-form" name="register-form" class="auth-form" action="<?php echo e(Route('user.store')); ?>"
                method="POST" autocomplete="off" novalidate>
                <?php echo csrf_field(); ?>

                <div class="logo">
                    <img src="/images/logo.svg" alt="Зелёная школа">
                </div>
                <div class="auth-form-content">
                    <div class="form-title">
                        <h3>Регистрация</h3>
                    </div>
                    <div class="form-note body-text-regular">Для регистрации на портале заполните обязательные поля в
                        форме ниже. На e-mail, указанный при регистрации, мы пришлем пароль для входа в личный кабинет.
                    </div>
                    <div class="form-inner">
                        <div class="form-block">
                            <div class="form-group">
                                <label for="name" class="body-text-large">Имя*</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Имя"
                                    value="<?php echo e(old('name')); ?>" data-required="1" maxlength="32">
                                <?php $__errorArgs = ['name'];
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
                                <label for="surname" class="body-text-large">Фамилия*</label>
                                <input type="text" name="surname" id="surname" class="form-control"
                                    placeholder="Фамилия" value="<?php echo e(old('surname')); ?>" data-required="1" maxlength="32">
                                <?php $__errorArgs = ['surname'];
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
                                <label for="phone" class="body-text-large">Телефон*</label>
                                <input type="tel" name="phone" id="phone" class="form-control"
                                    placeholder="+7 (___) ___-__-__" value="<?php echo e(old('phone')); ?>" data-required="1">
                                <?php $__errorArgs = ['phone'];
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
                                <label for="email" class="body-text-large">Электронная почта*</label>
                                <input type="email" name="email" id="email"
                                    class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Email"
                                    value="<?php echo e(old('email')); ?>" data-required="1">
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
                        </div>
                        <div class="form-actions">
                            <button type="submit"
                                class="submit-button button button__block button__filled button__large">
                                <span class="loader"></span>
                                Зарегистрироваться
                            </button>
                            <div class="form-footer">
                                <p class="body-text-small">Нажимая на кнопку "Зарегистрироваться", Вы принимаете условия
                                    <a href="#">Пользовательского
                                        соглашения.</a>
                                </p>
                            </div>
                            <div class="form-actions-wrapper body-text-large">
                                <span>или</span>
                            </div>
                            <a href="<?php echo e(Route('login')); ?>"
                                class="login-button button button__block button__outline button__large">Войти</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="js/vendor.js"></script>
    <script src="js/main.js"></script>
</body>

</html><?php /**PATH C:\OSPanel\domains\smolathon\resources\views/site/register.blade.php ENDPATH**/ ?>