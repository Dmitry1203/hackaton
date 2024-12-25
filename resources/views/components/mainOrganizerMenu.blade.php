        <aside class="menu mobile-menu">
            <div class="menu-header body-text-medium">
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
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    @if (Route::currentRouteName() === 'organizer.index')
                        <li class="nav-item active">
                    @else
                        <li class="nav-item">
                    @endif
                        <a href="{{ Route('organizer.index') }}" class="nav-link">
                            <svg class="fill-hover" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11 7H13V9H11V7ZM11 11H13V17H11V11ZM12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20Z" />
                            </svg>
                            <p>Информация</p>
                        </a>
                    </li>

                    @if (Route::currentRouteName() === 'organizer.users')
                        <li class="nav-item active">
                    @else
                        <li class="nav-item">
                    @endif
                        <a href="{{ Route('organizer.users') }}" class="nav-link">
                            <svg class="fill-hover" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11 7H13V9H11V7ZM11 11H13V17H11V11ZM12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20Z" />
                            </svg>
                            <p>Список участников</p>
                        </a>
                    </li>

                    @if (Route::currentRouteName() === 'organizer.notifications')
                        <li class="nav-item active">
                    @else
                        <li class="nav-item">
                    @endif

                        <a href="{{ Route('organizer.notifications') }}" class="nav-link">
                            <svg class="stroke-hover" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15 17H20L18.595 15.595C18.4063 15.4063 18.2567 15.1822 18.1546 14.9357C18.0525 14.6891 18 14.4249 18 14.158V11C18.0002 9.75894 17.6156 8.54834 16.8992 7.53489C16.1829 6.52144 15.17 5.75496 14 5.341V5C14 4.46957 13.7893 3.96086 13.4142 3.58579C13.0391 3.21071 12.5304 3 12 3C11.4696 3 10.9609 3.21071 10.5858 3.58579C10.2107 3.96086 10 4.46957 10 5V5.341C7.67 6.165 6 8.388 6 11V14.159C6 14.697 5.786 15.214 5.405 15.595L4 17H9M15 17H9M15 17V18C15 18.7956 14.6839 19.5587 14.1213 20.1213C13.5587 20.6839 12.7956 21 12 21C11.2044 21 10.4413 20.6839 9.87868 20.1213C9.31607 19.5587 9 18.7956 9 18V17"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p>Уведомления</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="menu-footer body-text-medium">
                <a href="{{ Route('organizer.close') }}" class="logout">
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
                <div class="user-info">
                    Организатор
                </div>
            </div>
            <nav class="sidebar-nav">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    @if (Route::currentRouteName() === 'organizer.index')
                    <li class="nav-item active">
                    @else
                    <li class="nav-item">
                    @endif
                        <a href="{{ Route('organizer.index') }}" class="nav-link">
                            <svg class="fill-hover" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11 7H13V9H11V7ZM11 11H13V17H11V11ZM12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20Z" />
                            </svg>
                            <p>Информация</p>
                        </a>
                    </li>

                    @if (Route::currentRouteName() === 'organizer.users')
                    <li class="nav-item active">
                    @else
                    <li class="nav-item">
                    @endif
                        <a href="{{ Route('organizer.users') }}" class="nav-link">
                            <svg class="fill-hover" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11 7H13V9H11V7ZM11 11H13V17H11V11ZM12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20Z" />
                            </svg>
                            <p>Список участников</p>
                        </a>
                    </li>

                    @if (Route::currentRouteName() === 'organizer.notifications')
                    <li class="nav-item active">
                    @else
                    <li class="nav-item">
                    @endif

                        <a href="{{ Route('organizer.notifications') }}" class="nav-link">
                            <svg class="stroke-hover" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15 17H20L18.595 15.595C18.4063 15.4063 18.2567 15.1822 18.1546 14.9357C18.0525 14.6891 18 14.4249 18 14.158V11C18.0002 9.75894 17.6156 8.54834 16.8992 7.53489C16.1829 6.52144 15.17 5.75496 14 5.341V5C14 4.46957 13.7893 3.96086 13.4142 3.58579C13.0391 3.21071 12.5304 3 12 3C11.4696 3 10.9609 3.21071 10.5858 3.58579C10.2107 3.96086 10 4.46957 10 5V5.341C7.67 6.165 6 8.388 6 11V14.159C6 14.697 5.786 15.214 5.405 15.595L4 17H9M15 17H9M15 17V18C15 18.7956 14.6839 19.5587 14.1213 20.1213C13.5587 20.6839 12.7956 21 12 21C11.2044 21 10.4413 20.6839 9.87868 20.1213C9.31607 19.5587 9 18.7956 9 18V17"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p>Уведомления</p>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="sidebar-footer">
                <a href="{{ Route('organizer.close') }}" class="logout">
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