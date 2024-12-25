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
                    <?php if(empty(auth()->user()->avatar) ): ?>
                        <img src = "/images/avatar-default.png">
                    <?php else: ?>
                        <img src="<?php echo e(asset("storage/images/avatars/".auth()->user()->avatar)); ?>"
                        alt="<?php echo e(auth()->user()->name); ?>">
                    <?php endif; ?>
                </div>
            </div>
        </header>

		

		<?php if (isset($component)) { $__componentOriginalf2cb032ffc9fa6f03259be3da4f10e5d141613c3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\MainMenu::class, []); ?>
<?php $component->withName('main-menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf2cb032ffc9fa6f03259be3da4f10e5d141613c3)): ?>
<?php $component = $__componentOriginalf2cb032ffc9fa6f03259be3da4f10e5d141613c3; ?>
<?php unset($__componentOriginalf2cb032ffc9fa6f03259be3da4f10e5d141613c3); ?>
<?php endif; ?>

        <?php echo e($content ?? ''); ?>


    </div>

    <script src="/js/vendor.js"></script>
    <script src="/js/main.js?<?php echo sha1(microtime(1)) ?>"></script>
    <?php if(Route::currentRouteName() === 'personal.profile.edit'): ?>
        <script src="/js/password.js"></script>
    <?php endif; ?>
</body>
</html>
<?php /**PATH C:\OSPanel\domains\green\resources\views/personal/layouts/layout.blade.php ENDPATH**/ ?>