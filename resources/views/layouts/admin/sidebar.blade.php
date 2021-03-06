<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        منو
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1 " aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>داشبورد
                            <span class="badge badge-success">6</span></a>
                        <div id="submenu-1" class="collapse submenu
                        {{Route::currentRouteName() == 'admin.users.create' ? 'show' : ''}}
                        {{Route::currentRouteName() == 'admin.users.index' ? 'show' : ''}}"
                             style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link {{Route::currentRouteName() == 'admin.users.create' ? 'bg-dark' : ''}}" href="/admin/users/create">افزودن مدیر جدید <span class="badge badge-secondary">New</span></a>

                                </li>

                                <li class="nav-item">
                                    <a class="nav-link {{Route::currentRouteName() == 'admin.users.index' ? 'bg-dark' : ''}}" href="/admin/users">ویرایش کاربر ها <span
                                                class="badge badge-secondary">New</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" data-toggle="collapse" aria-expanded="false"
                           data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie"></i>مقاله
                            ها</a>
                        <div id="submenu-3" class="collapse submenu
                      {{Route::currentRouteName() == 'admin.articles.create' ? 'show' : ''}}
                        {{Route::currentRouteName() == 'admin.articles.index' ? 'show' : ''}}"
                             style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link {{Route::currentRouteName() == 'admin.articles.create' ? 'bg-dark' : ''}}" href="/admin/articles/create">افزودن مقاله</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{Route::currentRouteName() == 'admin.articles.index' ? 'bg-dark' : ''}}" href="/admin/articles">لیست مقاله ها</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                           data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>دسته
                            بندی ها</a>
                        <div id="submenu-4" class="collapse submenu
                     {{Route::currentRouteName() == 'admin.category.index' ? 'show' : ''}}"
                             style="">
                            <ul class="nav flex-column">
                                <li class="nav-item  {{Route::currentRouteName() == 'admin.category.index' ? 'bg-dark' : ''}}">
                                    <a class="nav-link" href="/admin/category">لیست دسته بندی ها</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>