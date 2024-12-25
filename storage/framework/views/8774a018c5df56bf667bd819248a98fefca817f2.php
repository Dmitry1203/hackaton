<!doctype html>
<html lang="ru">
<head>
    <title><?php echo e($title ?? 'Заголовок страницы'); ?></title>
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="robots" content="NOINDEX, NOFOLLOW">
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/css/vendor.css">
    <link rel="stylesheet" href="/css/main.css">
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
                <h4><?php echo e($title ?? 'Заголовок страницы'); ?></h4>
            </div>
            <div class="panel">
                <div class="user-icon">
                    <img src = "/images/avatar-default.png">
                </div>
            </div>
        </header>

        <?php if (isset($component)) { $__componentOriginalc8f5d71e4b5328a8784b3ce5bb03552dc9b367f0 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\MainSponsorMenu::class, []); ?>
<?php $component->withName('main-sponsor-menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc8f5d71e4b5328a8784b3ce5bb03552dc9b367f0)): ?>
<?php $component = $__componentOriginalc8f5d71e4b5328a8784b3ce5bb03552dc9b367f0; ?>
<?php unset($__componentOriginalc8f5d71e4b5328a8784b3ce5bb03552dc9b367f0); ?>
<?php endif; ?>

        <?php echo e($content ?? ''); ?>


    </div>

    <script src="/js/vendor.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>
<?php /**PATH C:\OSPanel\domains\green\resources\views/sponsor/layouts/layout.blade.php ENDPATH**/ ?>