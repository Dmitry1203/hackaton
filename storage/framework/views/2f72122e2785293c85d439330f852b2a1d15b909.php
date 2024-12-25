<aside class="menu mobile-menu">
  <div class="menu-header body-text-medium">
    <div class="logo">
      <a href="<?php echo e(Route('personal.index')); ?>" class="logo-link">
        <img src="/images/logo.svg" alt="Зелёная школа">
      </a>
    </div>
    <a class="close-menu">
      <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd"
          d="M2.66854 2.66854C2.8516 2.48549 3.1484 2.48549 3.33146 2.66854L13.3315 12.6685C13.5145 12.8516 13.5145 13.1484 13.3315 13.3315C13.1484 13.5145 12.8516 13.5145 12.6685 13.3315L2.66854 3.33146C2.48549 3.1484 2.48549 2.8516 2.66854 2.66854Z" />
        <path fill-rule="evenodd" clip-rule="evenodd"
          d="M13.3315 2.66854C13.5145 2.8516 13.5145 3.1484 13.3315 3.33146L3.33146 13.3315C3.1484 13.5145 2.8516 13.5145 2.66854 13.3315C2.48549 13.1484 2.48549 12.8516 2.66854 12.6685L12.6685 2.66854C12.8516 2.48549 13.1484 2.48549 13.3315 2.66854Z" />
      </svg>
    </a>
  </div>
  <nav class="menu-nav body-text-medium">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <?php if(Route::currentRouteName() === 'personal.index'): ?>
        <li class="nav-item active">
      <?php else: ?>
        <li class="nav-item">
      <?php endif; ?>

        <a href="<?php echo e(Route('personal.index')); ?>" class="nav-link">

          <svg class="stroke-hover" width="24" height="24" viewBox="0 0 24 24" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M4.29289 4.29289C4.10536 4.48043 4 4.73478 4 5V7C4 7.26522 4.10536 7.51957 4.29289 7.70711C4.48043 7.89464 4.73478 8 5 8H19C19.2652 8 19.5196 7.89464 19.7071 7.70711C19.8946 7.51957 20 7.26522 20 7V5C20 4.73478 19.8946 4.48043 19.7071 4.29289C19.5196 4.10536 19.2652 4 19 4H5C4.73478 4 4.48043 4.10536 4.29289 4.29289Z"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path
              d="M4.29289 12.2929C4.10536 12.4804 4 12.7348 4 13V19C4 19.2652 4.10536 19.5196 4.29289 19.7071C4.48043 19.8946 4.73478 20 5 20H11C11.2652 20 11.5196 19.8946 11.7071 19.7071C11.8946 19.5196 12 19.2652 12 19V13C12 12.7348 11.8946 12.4804 11.7071 12.2929C11.5196 12.1054 11.2652 12 11 12H5C4.73478 12 4.48043 12.1054 4.29289 12.2929Z"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path
              d="M16.2929 12.2929C16.1054 12.4804 16 12.7348 16 13V19C16 19.2652 16.1054 19.5196 16.2929 19.7071C16.4804 19.8946 16.7348 20 17 20H19C19.2652 20 19.5196 19.8946 19.7071 19.7071C19.8946 19.5196 20 19.2652 20 19V13C20 12.7348 19.8946 12.4804 19.7071 12.2929C19.5196 12.1054 19.2652 12 19 12H17C16.7348 12 16.4804 12.1054 16.2929 12.2929Z"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <p>Главная</p>
        </a>
      </li>

      <?php if(Route::currentRouteName() === 'personal.profile'): ?>
        <li class="nav-item active">
      <?php else: ?>
        <li class="nav-item">
      <?php endif; ?>

        <a href="<?php echo e(Route('personal.profile')); ?>" class="nav-link">
          <svg class="stroke-hover" width="24" height="24" viewBox="0 0 24 24" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M14.8284 9.82843C15.5786 9.07828 16 8.06087 16 7C16 5.93913 15.5786 4.92172 14.8284 4.17157C14.0783 3.42143 13.0609 3 12 3C10.9391 3 9.92172 3.42143 9.17157 4.17157C8.42143 4.92172 8 5.93913 8 7C8 8.06087 8.42143 9.07828 9.17157 9.82843C9.92172 10.5786 10.9391 11 12 11C13.0609 11 14.0783 10.5786 14.8284 9.82843Z"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path
              d="M7.05025 16.0503C8.36301 14.7375 10.1435 14 12 14C13.8565 14 15.637 14.7375 16.9497 16.0503C18.2625 17.363 19 19.1435 19 21H5C5 19.1435 5.7375 17.363 7.05025 16.0503Z"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <p>Мой профиль</p>
        </a>
      </li>

      <?php if(Route::currentRouteName() === 'personal.teams'): ?>
        <li class="nav-item active">
      <?php else: ?>
        <li class="nav-item">
      <?php endif; ?>
        <a href="<?php echo e(Route('personal.teams')); ?>" class="nav-link">
          <svg class="stroke-hover" width="24" height="24" viewBox="0 0 24 24" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M17 20H22V18C22 17.3765 21.8057 16.7686 21.4441 16.2606C21.0826 15.7527 20.5718 15.37 19.9827 15.1658C19.3937 14.9615 18.7556 14.9459 18.1573 15.121C17.5589 15.2962 17.03 15.6534 16.644 16.143M17 20H7M17 20V18C17 17.344 16.874 16.717 16.644 16.143M16.644 16.143C16.2726 15.215 15.6318 14.4195 14.804 13.8591C13.9762 13.2988 12.9996 12.9993 12 12.9993C11.0004 12.9993 10.0238 13.2988 9.196 13.8591C8.36825 14.4195 7.72736 15.215 7.356 16.143M7 20H2V18C2.00005 17.3765 2.19434 16.7686 2.55586 16.2606C2.91739 15.7527 3.42819 15.37 4.01725 15.1658C4.60632 14.9615 5.24438 14.9459 5.84274 15.121C6.4411 15.2962 6.97003 15.6534 7.356 16.143M7 20V18C7 17.344 7.126 16.717 7.356 16.143M15 7C15 7.79565 14.6839 8.55871 14.1213 9.12132C13.5587 9.68393 12.7956 10 12 10C11.2044 10 10.4413 9.68393 9.87868 9.12132C9.31607 8.55871 9 7.79565 9 7C9 6.20435 9.31607 5.44129 9.87868 4.87868C10.4413 4.31607 11.2044 4 12 4C12.7956 4 13.5587 4.31607 14.1213 4.87868C14.6839 5.44129 15 6.20435 15 7ZM21 10C21 10.5304 20.7893 11.0391 20.4142 11.4142C20.0391 11.7893 19.5304 12 19 12C18.4696 12 17.9609 11.7893 17.5858 11.4142C17.2107 11.0391 17 10.5304 17 10C17 9.46957 17.2107 8.96086 17.5858 8.58579C17.9609 8.21071 18.4696 8 19 8C19.5304 8 20.0391 8.21071 20.4142 8.58579C20.7893 8.96086 21 9.46957 21 10ZM7 10C7 10.5304 6.78929 11.0391 6.41421 11.4142C6.03914 11.7893 5.53043 12 5 12C4.46957 12 3.96086 11.7893 3.58579 11.4142C3.21071 11.0391 3 10.5304 3 10C3 9.46957 3.21071 8.96086 3.58579 8.58579C3.96086 8.21071 4.46957 8 5 8C5.53043 8 6.03914 8.21071 6.41421 8.58579C6.78929 8.96086 7 9.46957 7 10Z"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <p>Команды</p>
        </a>
      </li>

      <?php if(Route::currentRouteName() === 'personal.timeline'): ?>
        <li class="nav-item active">
      <?php else: ?>
        <li class="nav-item">
      <?php endif; ?>

        <a href="<?php echo e(Route('personal.timeline')); ?>" class="nav-link">
          <svg class="stroke-hover" width="24" height="24" viewBox="0 0 24 24" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M12 6V12L16 14" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <p>Таймлайн</p>
        </a>
      </li>

      <?php if(Route::currentRouteName() === 'personal.courses'): ?>
        <li class="nav-item active">
      <?php else: ?>
        <li class="nav-item">
      <?php endif; ?>

        <a href="<?php echo e(Route('personal.courses')); ?>" class="nav-link">
          <svg class="stroke-hover" width="24" height="24" viewBox="0 0 24 24" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M12 14L21 9L12 4L3 9L12 14Z" stroke="#7C8DB0" />
            <path
              d="M12.0001 14L18.1601 10.578C18.9706 12.6361 19.2006 14.8772 18.8251 17.057C16.2886 17.3032 13.8973 18.3536 12.0001 20.055C10.1031 18.3538 7.71216 17.3034 5.17608 17.057C4.80028 14.8772 5.03031 12.636 5.84108 10.578L12.0001 14Z" />
            <path
              d="M12 14L21 9L12 4L3 9L12 14ZM12 14L18.16 10.578C18.9705 12.6361 19.2005 14.8772 18.825 17.057C16.2886 17.3032 13.8972 18.3536 12 20.055C10.1031 18.3538 7.71208 17.3034 5.176 17.057C4.8002 14.8772 5.03023 12.636 5.841 10.578L12 14ZM8 20V12.5L12 10.278"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <p>Курсы</p>
        </a>
      </li>

      <?php if(Route::currentRouteName() === 'personal.tasks'): ?>
        <li class="nav-item active">
      <?php else: ?>
        <li class="nav-item">
      <?php endif; ?>

        <a href="<?php echo e(Route('personal.tasks')); ?>" class="nav-link">
          <svg class="stroke-hover" width="24" height="24" viewBox="0 0 24 24" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M9 5H7C6.46957 5 5.96086 5.21071 5.58579 5.58579C5.21071 5.96086 5 6.46957 5 7V19C5 19.5304 5.21071 20.0391 5.58579 20.4142C5.96086 20.7893 6.46957 21 7 21H17C17.5304 21 18.0391 20.7893 18.4142 20.4142C18.7893 20.0391 19 19.5304 19 19V7C19 6.46957 18.7893 5.96086 18.4142 5.58579C18.0391 5.21071 17.5304 5 17 5H15M9 5C9 5.53043 9.21071 6.03914 9.58579 6.41421C9.96086 6.78929 10.4696 7 11 7H13C13.5304 7 14.0391 6.78929 14.4142 6.41421C14.7893 6.03914 15 5.53043 15 5M9 5C9 4.46957 9.21071 3.96086 9.58579 3.58579C9.96086 3.21071 10.4696 3 11 3H13C13.5304 3 14.0391 3.21071 14.4142 3.58579C14.7893 3.96086 15 4.46957 15 5M12 12H15M12 16H15M9 12H9.01M9 16H9.01"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <p>Задачи</p>
        </a>
      </li>

      <?php if(Route::currentRouteName() === 'personal.solutions'): ?>
        <li class="nav-item active">
      <?php else: ?>
        <li class="nav-item">
      <?php endif; ?>

        <a href="<?php echo e(Route('personal.solutions')); ?>" class="nav-link">
          <svg class="fill-hover" width="24" height="24" viewBox="0 0 24 24" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M3.25 3C3.25 2.0335 4.0335 1.25 5 1.25H15.5C15.7126 1.25 15.9152 1.34024 16.0575 1.49828L20.5575 6.49828C20.6814 6.63599 20.75 6.81472 20.75 7V21C20.75 21.9665 19.9665 22.75 19 22.75H5C4.03351 22.75 3.25 21.9665 3.25 21V3ZM5 2.75C4.86193 2.75 4.75 2.86193 4.75 3V21C4.75 21.1381 4.86192 21.25 5 21.25H19C19.1381 21.25 19.25 21.1381 19.25 21V7.2878L15.166 2.75H5Z" />
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M16.4749 10.9195C16.7955 11.1818 16.8428 11.6543 16.5805 11.9749L12.0805 17.4749C11.9538 17.6298 11.7705 17.7276 11.5713 17.7466C11.3721 17.7656 11.1736 17.7043 11.0199 17.5762L8.01988 15.0762C7.70167 14.811 7.65868 14.3381 7.92385 14.0199C8.18903 13.7017 8.66195 13.6587 8.98016 13.9238L11.3988 15.9394L15.4196 11.0251C15.6818 10.7045 16.1544 10.6572 16.4749 10.9195Z" />
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M15 1.25C15.4142 1.25 15.75 1.58579 15.75 2V6.25H20C20.4142 6.25 20.75 6.58579 20.75 7C20.75 7.41421 20.4142 7.75 20 7.75H15C14.5858 7.75 14.25 7.41421 14.25 7V2C14.25 1.58579 14.5858 1.25 15 1.25Z" />
          </svg>
          <p>Решения</p>
        </a>
      </li>

      <li class="nav-item">
        <a href="#" class="nav-link">
          <svg class="fill-hover" width="24" height="24" viewBox="0 0 24 24" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M11 7H13V9H11V7ZM11 11H13V17H11V11ZM12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20Z" />
          </svg>
          <p>О мероприятии</p>
        </a>
      </li>
    </ul>
  </nav>
  <div class="menu-footer body-text-medium">
    <a href="<?php echo e(Route('close')); ?>" class="logout">
      <svg class="stroke-hover" width="24" height="24" viewBox="0 0 24 24" fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <path
          d="M17 16L21 12M21 12L17 8M21 12H7M13 16V17C13 17.7956 12.6839 18.5587 12.1213 19.1213C11.5587 19.6839 10.7956 20 10 20H6C5.20435 20 4.44129 19.6839 3.87868 19.1213C3.31607 18.5587 3 17.7956 3 17V7C3 6.20435 3.31607 5.44129 3.87868 4.87868C4.44129 4.31607 5.20435 4 6 4H10C10.7956 4 11.5587 4.31607 12.1213 4.87868C12.6839 5.44129 13 6.20435 13 7V8"
          stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
      </svg>
      <p>Выйти</p>
    </a>
  </div>
</aside>

<aside class="sidebar body-text-medium">
	<div class="panel">

		<div class="user-icon">
			<?php if(empty(auth()->user()->avatar) ): ?>
				<img src = "/images/avatar-default.png">
			<?php else: ?>
				<img src="<?php echo e(asset("storage/images/avatars/".auth()->user()->avatar)); ?>"
				alt="<?php echo e(auth()->user()->name); ?>">
			<?php endif; ?>
		</div>

		<div class="user-info">
			<div class="user-name"><?php echo e(auth()->user()->name); ?> <?php echo e(auth()->user()->surname); ?></div>
			<a href="<?php echo e(Route('close')); ?>" class="logout">
				<svg class="stroke-hover" width="24" height="24" viewBox="0 0 24 24" fill="none"
				xmlns="http://www.w3.org/2000/svg">
				<path
				d="M17 16L21 12M21 12L17 8M21 12H7M13 16V17C13 17.7956 12.6839 18.5587 12.1213 19.1213C11.5587 19.6839 10.7956 20 10 20H6C5.20435 20 4.44129 19.6839 3.87868 19.1213C3.31607 18.5587 3 17.7956 3 17V7C3 6.20435 3.31607 5.44129 3.87868 4.87868C4.44129 4.31607 5.20435 4 6 4H10C10.7956 4 11.5587 4.31607 12.1213 4.87868C12.6839 5.44129 13 6.20435 13 7V8"
				stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
				<p>Выйти</p>
			</a>
		</div>
	</div>

	<div class="notifications">
		<a href="<?php echo e(Route('personal.notifications')); ?>" class="notification-link">
		<svg class="stroke-hover" width="24" height="24" viewBox="0 0 24 24" fill="none"
		xmlns="http://www.w3.org/2000/svg">
		<path
		  d="M15 17H20L18.595 15.595C18.4063 15.4063 18.2567 15.1822 18.1546 14.9357C18.0525 14.6891 18 14.4249 18 14.158V11C18.0002 9.75894 17.6156 8.54834 16.8992 7.53489C16.1829 6.52144 15.17 5.75496 14 5.341V5C14 4.46957 13.7893 3.96086 13.4142 3.58579C13.0391 3.21071 12.5304 3 12 3C11.4696 3 10.9609 3.21071 10.5858 3.58579C10.2107 3.96086 10 4.46957 10 5V5.341C7.67 6.165 6 8.388 6 11V14.159C6 14.697 5.786 15.214 5.405 15.595L4 17H9M15 17H9M15 17V18C15 18.7956 14.6839 19.5587 14.1213 20.1213C13.5587 20.6839 12.7956 21 12 21C11.2044 21 10.4413 20.6839 9.87868 20.1213C9.31607 19.5587 9 18.7956 9 18V17"
		  stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
		</svg>
		<?php if( empty($newNotifications) ): ?>
			<p>Нет новых уведомлений</p>
		<?php else: ?>
			<p>Новые уведомления (<?php echo e($newNotifications); ?>)</p>
		<?php endif; ?>
		</a>
	</div>

	<nav class="sidebar-nav">
		<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
		<?php if(Route::currentRouteName() === 'personal.index'): ?>
			<li class="nav-item active">
		<?php else: ?>
			<li class="nav-item">
		<?php endif; ?>
			<a href="<?php echo e(Route('personal.index')); ?>" class="nav-link">
				<svg class="stroke-hover" width="24" height="24" viewBox="0 0 24 24" fill="none"
				xmlns="http://www.w3.org/2000/svg">
				<path
				d="M4.29289 4.29289C4.10536 4.48043 4 4.73478 4 5V7C4 7.26522 4.10536 7.51957 4.29289 7.70711C4.48043 7.89464 4.73478 8 5 8H19C19.2652 8 19.5196 7.89464 19.7071 7.70711C19.8946 7.51957 20 7.26522 20 7V5C20 4.73478 19.8946 4.48043 19.7071 4.29289C19.5196 4.10536 19.2652 4 19 4H5C4.73478 4 4.48043 4.10536 4.29289 4.29289Z"
				stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				<path
				d="M4.29289 12.2929C4.10536 12.4804 4 12.7348 4 13V19C4 19.2652 4.10536 19.5196 4.29289 19.7071C4.48043 19.8946 4.73478 20 5 20H11C11.2652 20 11.5196 19.8946 11.7071 19.7071C11.8946 19.5196 12 19.2652 12 19V13C12 12.7348 11.8946 12.4804 11.7071 12.2929C11.5196 12.1054 11.2652 12 11 12H5C4.73478 12 4.48043 12.1054 4.29289 12.2929Z"
				stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				<path
				d="M16.2929 12.2929C16.1054 12.4804 16 12.7348 16 13V19C16 19.2652 16.1054 19.5196 16.2929 19.7071C16.4804 19.8946 16.7348 20 17 20H19C19.2652 20 19.5196 19.8946 19.7071 19.7071C19.8946 19.5196 20 19.2652 20 19V13C20 12.7348 19.8946 12.4804 19.7071 12.2929C19.5196 12.1054 19.2652 12 19 12H17C16.7348 12 16.4804 12.1054 16.2929 12.2929Z"
				stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
				<p>Главная</p>
			</a>
			</li>

		

		<?php if(Route::currentRouteName() === 'personal.profile'): ?>
			<li class="nav-item active">
		<?php else: ?>
			<li class="nav-item">
		<?php endif; ?>

			<a href="<?php echo e(Route('personal.profile')); ?>" class="nav-link">
				<svg class="stroke-hover" width="24" height="24" viewBox="0 0 24 24" fill="none"
				xmlns="http://www.w3.org/2000/svg">
				<path
				d="M14.8284 9.82843C15.5786 9.07828 16 8.06087 16 7C16 5.93913 15.5786 4.92172 14.8284 4.17157C14.0783 3.42143 13.0609 3 12 3C10.9391 3 9.92172 3.42143 9.17157 4.17157C8.42143 4.92172 8 5.93913 8 7C8 8.06087 8.42143 9.07828 9.17157 9.82843C9.92172 10.5786 10.9391 11 12 11C13.0609 11 14.0783 10.5786 14.8284 9.82843Z"
				stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				<path
				d="M7.05025 16.0503C8.36301 14.7375 10.1435 14 12 14C13.8565 14 15.637 14.7375 16.9497 16.0503C18.2625 17.363 19 19.1435 19 21H5C5 19.1435 5.7375 17.363 7.05025 16.0503Z"
				stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
				<p>Мой профиль</p>
			</a>
			</li>

		

		<?php if(Route::currentRouteName() === 'personal.teams'): ?>
			<li class="nav-item active">
		<?php else: ?>
			<li class="nav-item">
		<?php endif; ?>

			<a href="<?php echo e(Route('personal.teams')); ?>" class="nav-link">
				<svg class="stroke-hover" width="24" height="24" viewBox="0 0 24 24" fill="none"
				xmlns="http://www.w3.org/2000/svg">
				<path
				d="M17 20H22V18C22 17.3765 21.8057 16.7686 21.4441 16.2606C21.0826 15.7527 20.5718 15.37 19.9827 15.1658C19.3937 14.9615 18.7556 14.9459 18.1573 15.121C17.5589 15.2962 17.03 15.6534 16.644 16.143M17 20H7M17 20V18C17 17.344 16.874 16.717 16.644 16.143M16.644 16.143C16.2726 15.215 15.6318 14.4195 14.804 13.8591C13.9762 13.2988 12.9996 12.9993 12 12.9993C11.0004 12.9993 10.0238 13.2988 9.196 13.8591C8.36825 14.4195 7.72736 15.215 7.356 16.143M7 20H2V18C2.00005 17.3765 2.19434 16.7686 2.55586 16.2606C2.91739 15.7527 3.42819 15.37 4.01725 15.1658C4.60632 14.9615 5.24438 14.9459 5.84274 15.121C6.4411 15.2962 6.97003 15.6534 7.356 16.143M7 20V18C7 17.344 7.126 16.717 7.356 16.143M15 7C15 7.79565 14.6839 8.55871 14.1213 9.12132C13.5587 9.68393 12.7956 10 12 10C11.2044 10 10.4413 9.68393 9.87868 9.12132C9.31607 8.55871 9 7.79565 9 7C9 6.20435 9.31607 5.44129 9.87868 4.87868C10.4413 4.31607 11.2044 4 12 4C12.7956 4 13.5587 4.31607 14.1213 4.87868C14.6839 5.44129 15 6.20435 15 7ZM21 10C21 10.5304 20.7893 11.0391 20.4142 11.4142C20.0391 11.7893 19.5304 12 19 12C18.4696 12 17.9609 11.7893 17.5858 11.4142C17.2107 11.0391 17 10.5304 17 10C17 9.46957 17.2107 8.96086 17.5858 8.58579C17.9609 8.21071 18.4696 8 19 8C19.5304 8 20.0391 8.21071 20.4142 8.58579C20.7893 8.96086 21 9.46957 21 10ZM7 10C7 10.5304 6.78929 11.0391 6.41421 11.4142C6.03914 11.7893 5.53043 12 5 12C4.46957 12 3.96086 11.7893 3.58579 11.4142C3.21071 11.0391 3 10.5304 3 10C3 9.46957 3.21071 8.96086 3.58579 8.58579C3.96086 8.21071 4.46957 8 5 8C5.53043 8 6.03914 8.21071 6.41421 8.58579C6.78929 8.96086 7 9.46957 7 10Z"
				stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
				<p>Команды</p>
			</a>
			</li>

		

		<?php if(Route::currentRouteName() === 'personal.timeline'): ?>
			<li class="nav-item active">
		<?php else: ?>
			<li class="nav-item">
		<?php endif; ?>

			<a href="<?php echo e(Route('personal.timeline')); ?>" class="nav-link">
				<svg class="stroke-hover" width="24" height="24" viewBox="0 0 24 24" fill="none"
				xmlns="http://www.w3.org/2000/svg">
				<path
				d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
				stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				<path d="M12 6V12L16 14" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
				<p>Таймлайн</p>
			</a>
		</li>

		

		<?php if(Route::currentRouteName() === 'personal.courses'): ?>
			<li class="nav-item active">
		<?php else: ?>
			<li class="nav-item">
		<?php endif; ?>

			<a href="<?php echo e(Route('personal.courses')); ?>" class="nav-link">
				<svg class="stroke-hover" width="24" height="24" viewBox="0 0 24 24" fill="none"
				xmlns="http://www.w3.org/2000/svg">
				<path d="M12 14L21 9L12 4L3 9L12 14Z" stroke="#7C8DB0" />
				<path
				d="M12.0001 14L18.1601 10.578C18.9706 12.6361 19.2006 14.8772 18.8251 17.057C16.2886 17.3032 13.8973 18.3536 12.0001 20.055C10.1031 18.3538 7.71216 17.3034 5.17608 17.057C4.80028 14.8772 5.03031 12.636 5.84108 10.578L12.0001 14Z" />
				<path
				d="M12 14L21 9L12 4L3 9L12 14ZM12 14L18.16 10.578C18.9705 12.6361 19.2005 14.8772 18.825 17.057C16.2886 17.3032 13.8972 18.3536 12 20.055C10.1031 18.3538 7.71208 17.3034 5.176 17.057C4.8002 14.8772 5.03023 12.636 5.841 10.578L12 14ZM8 20V12.5L12 10.278"
				stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
				<p>Курсы</p>
			</a>
			</li>

		

		<?php if(Route::currentRouteName() === 'personal.tasks'): ?>
			<li class="nav-item active">
		<?php else: ?>
			<li class="nav-item">
		<?php endif; ?>
		<a href="<?php echo e(Route('personal.tasks')); ?>" class="nav-link">
			<svg class="stroke-hover" width="24" height="24" viewBox="0 0 24 24" fill="none"
			xmlns="http://www.w3.org/2000/svg">
			<path
			d="M9 5H7C6.46957 5 5.96086 5.21071 5.58579 5.58579C5.21071 5.96086 5 6.46957 5 7V19C5 19.5304 5.21071 20.0391 5.58579 20.4142C5.96086 20.7893 6.46957 21 7 21H17C17.5304 21 18.0391 20.7893 18.4142 20.4142C18.7893 20.0391 19 19.5304 19 19V7C19 6.46957 18.7893 5.96086 18.4142 5.58579C18.0391 5.21071 17.5304 5 17 5H15M9 5C9 5.53043 9.21071 6.03914 9.58579 6.41421C9.96086 6.78929 10.4696 7 11 7H13C13.5304 7 14.0391 6.78929 14.4142 6.41421C14.7893 6.03914 15 5.53043 15 5M9 5C9 4.46957 9.21071 3.96086 9.58579 3.58579C9.96086 3.21071 10.4696 3 11 3H13C13.5304 3 14.0391 3.21071 14.4142 3.58579C14.7893 3.96086 15 4.46957 15 5M12 12H15M12 16H15M9 12H9.01M9 16H9.01"
			stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
			</svg>
			<p>Задачи</p>
		</a>
		</li>

		

		<?php if(Route::currentRouteName() === 'personal.solutions'): ?>
			<li class="nav-item active">
		<?php else: ?>
			<li class="nav-item">
		<?php endif; ?>

			<a href="<?php echo e(Route('personal.solutions')); ?>" class="nav-link">
				<svg class="fill-hover" width="24" height="24" viewBox="0 0 24 24" fill="none"
				xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" clip-rule="evenodd"
				d="M3.25 3C3.25 2.0335 4.0335 1.25 5 1.25H15.5C15.7126 1.25 15.9152 1.34024 16.0575 1.49828L20.5575 6.49828C20.6814 6.63599 20.75 6.81472 20.75 7V21C20.75 21.9665 19.9665 22.75 19 22.75H5C4.03351 22.75 3.25 21.9665 3.25 21V3ZM5 2.75C4.86193 2.75 4.75 2.86193 4.75 3V21C4.75 21.1381 4.86192 21.25 5 21.25H19C19.1381 21.25 19.25 21.1381 19.25 21V7.2878L15.166 2.75H5Z" />
				<path fill-rule="evenodd" clip-rule="evenodd"
				d="M16.4749 10.9195C16.7955 11.1818 16.8428 11.6543 16.5805 11.9749L12.0805 17.4749C11.9538 17.6298 11.7705 17.7276 11.5713 17.7466C11.3721 17.7656 11.1736 17.7043 11.0199 17.5762L8.01988 15.0762C7.70167 14.811 7.65868 14.3381 7.92385 14.0199C8.18903 13.7017 8.66195 13.6587 8.98016 13.9238L11.3988 15.9394L15.4196 11.0251C15.6818 10.7045 16.1544 10.6572 16.4749 10.9195Z" />
				<path fill-rule="evenodd" clip-rule="evenodd"
				d="M15 1.25C15.4142 1.25 15.75 1.58579 15.75 2V6.25H20C20.4142 6.25 20.75 6.58579 20.75 7C20.75 7.41421 20.4142 7.75 20 7.75H15C14.5858 7.75 14.25 7.41421 14.25 7V2C14.25 1.58579 14.5858 1.25 15 1.25Z" />
				</svg>
				<p>Решения</p>
			</a>
			</li>

      

      <?php if(Route::currentRouteName() === 'personal.about'): ?>
        <li class="nav-item active">
      <?php else: ?>
        <li class="nav-item">
      <?php endif; ?>

      <a href="<?php echo e(Route('personal.about')); ?>" class="nav-link">
          <svg class="fill-hover" width="24" height="24" viewBox="0 0 24 24" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M11 7H13V9H11V7ZM11 11H13V17H11V11ZM12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20Z" />
          </svg>
          <p>
            О мероприятии
          </p>
        </a>
      </li>

    </ul>
  </nav>
  <div class="logo">
    <a href="<?php echo e(Route('personal.index')); ?>" class="logo-link">
    <img src="/images/logo.svg" alt="Зелёная школа">
    </a>
  </div>
</aside><?php /**PATH C:\OSPanel\domains\green\resources\views/components/mainMenu.blade.php ENDPATH**/ ?>