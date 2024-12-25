<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Регистрация</title>
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
    <link rel="stylesheet" href="css/main.css">
</head>
<body class="auth register">
    <div class="auth-layout">
        <div class="auth-form-section">

            @if($isAuth)

            <div class="form-title">
            <h5>Вы уже зарегистрированы</h5>
            </div>

            <a href="{{ Route('personal.profile')}}"
                    class="mt-5 register-link button button__block button__outline button__large">Мой профиль</a>

            @else

            <form
                id="register-form"
                name="register-form"
                class="auth-form"
                action="{{ Route('user.store') }}"
                method="POST"
                autocomplete="off"
                novalidate
            >
                @csrf

                <div class="logo">
                    <img src="/images/letshack-logo.png" alt="ЛЕТС ХАК">
                </div>

                <div class="auth-form-content">

                    {{--
                    <div class="form-title">
                        <h3>Регистрация</h3>
                    </div>
                    <div class="form-note body-text-regular">Для регистрации заполните обязательные поля в форме ниже. На e-mail, указанный при регистрации, мы пришлем пароль для входа в личный кабинет.
                    </div>
                    <div class="form-inner">
                        <div class="form-block">
                            <div class="form-group">
                                <label for="name" class="body-text-large">Имя*</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Имя"
                                    value="{{ old('name') }}" data-required="1" maxlength="32">
                                @error('name')
                                <p class="error-message body-text-small">{!! $message !!}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="surname" class="body-text-large">Фамилия*</label>
                                <input type="text" name="surname" id="surname" class="form-control"
                                    placeholder="Фамилия" value="{{ old('surname') }}" data-required="1" maxlength="32">
                                @error('surname')
                                <p class="error-message body-text-small">{!! $message !!}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone" class="body-text-large">Телефон*</label>
                                <input type="tel" name="phone" id="phone" class="form-control"
                                    placeholder="+7 (___) ___-__-__" value="{{ old('phone') }}" data-required="1">
                                @error('phone')
                                <p class="error-message body-text-small">{!! $message !!}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email" class="body-text-large">Электронная почта*</label>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                                    value="{{ old('email') }}" data-required="1">
                                @error('email')
                                <p class="error-message body-text-small">{!! $message !!}</p>
                                @enderror
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
                                    <a href="./policy.pdf" target="_blank">Пользовательского соглашения.</a>
                                </p>
                            </div>

                            <div class="form-actions-wrapper body-text-large">
                                <span>или</span>
                            </div>

                            <a href="{{ Route('login') }}"
                                class="login-button button button__block button__outline button__large">Войти</a>
                        </div>
                    </div>

                    --}}

                </div>
            </form>

            @endif

        </div>
    </div>

    <script src="js/vendor.js"></script>
    <script src="js/main.js"></script>
</body>

</html>