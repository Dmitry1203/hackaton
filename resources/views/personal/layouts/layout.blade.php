<!doctype html>
<html lang="ru">
<head>
    <title>{{ $title ?? 'Заголовок страницы' }}</title>
    <link rel="icon" href="/favicon/icon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/favicon/apple-touch-icon.png">
    <link rel="manifest" href="/manifest.webmanifest">
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="robots" content="NOINDEX, NOFOLLOW">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/css/vendor.css">
    <link rel="stylesheet" href="/css/main.css?<?=sha1(microtime(1))?>">
</head>
<body class="profile">
    <div class="wrapper">

        <header class="header header-mobile">
            <a class="open-menu">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21 10H3" stroke-width="2" stroke-linecap="square" stroke-linejoin="round" />
                <path d="M21 6H3" stroke-width="2" stroke-linecap="square" stroke-linejoin="round" />
                <path d="M21 14H3" stroke-width="2" stroke-linecap="square" stroke-linejoin="round" />
                <path d="M21 18H3" stroke-width="2" stroke-linecap="square" stroke-linejoin="round" />
                </svg>
            </a>
            <div class="page-title">
                <h4>{{ $title ?? 'Заголовок страницы' }}</h4>
            </div>
            <div class="panel">
                <div class="user-icon">
                    @if (empty(auth()->user()->avatar) )
                        <img src = "/images/avatar-default.png">
                    @else
                        <img src="{{ asset("storage/images/avatars/".auth()->user()->avatar) }}"
                        alt="{{ auth()->user()->name }}">
                    @endif
                </div>
            </div>
        </header>

		{{-- Левое меню работает как компонент, чтобы иметь возможность спрашивать количество непрочитанных уведомлений --}}

		<x-main-menu />

        {{ $content ?? '' }}

    </div>

    <script src="/js/vendor.js"></script>
    <script src="/js/main.js?@php echo sha1(microtime(1)) @endphp"></script>
    @if (Route::currentRouteName() === 'personal.profile.edit')
        <script src="/js/password.js"></script>
    @endif
</body>
</html>
