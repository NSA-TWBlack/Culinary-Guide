<section>
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <ul class="app-menu">
            <li>
                <a class="app-menu__item" href="{{ route('dashboard') }}">
                    <i class="fa fa-home app-menu__icon" aria-hidden="true"></i>
                    <span class="app-menu__label">Trang quản trị</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item" href="{{ route('admin.categories.index') }}">
                    <i class="fa fa-folder app-menu__icon" aria-hidden="true"></i>
                    <span class="app-menu__label">Danh Mục</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item" href="{{ route('admin.categories_properties.index') }}">
                    <i class="fa fa-folder-open app-menu__icon" aria-hidden="true"></i>
                    <span class="app-menu__label">Danh Mục Con</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item" href="{{ route('admin.recipes.index') }}">
                    <i class="far fa-hat-chef app-menu__icon" aria-hidden="true"></i>
                    <span class="app-menu__label">Công thức nấu ăn</span>
                </a>
            </li>

            <li>
                <a class="app-menu__item" href="{{ route('admin.tips.index') }}">
                    <i class="far fa-lightbulb-on app-menu__icon" aria-hidden="true"></i>
                    <span class="app-menu__label">Mẹo vặt</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item" href="{{ route('admin.news.index') }}">
                    <i class="fas fa-newspaper app-menu__icon" aria-hidden="true"></i>
                    <span class="app-menu__label">Tin tức</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item" href="{{ route('admin.users.index') }}">
                    <i class="far fa-users app-menu__icon"></i>
                    <span class="app-menu__label">Người dùng</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item" href="{{ route('admin.comments.index') }}">
                    <i class="fas fa-comment app-menu__icon" aria-hidden="true"></i>
                    <span class="app-menu__label">Bình luận</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item" href="{{ route('admin.favorite.index') }}">
                    <i class="fas fa-heart-circle app-menu__icon" aria-hidden="true"></i>
                    <span class="app-menu__label">Yêu thích</span>
                </a>
            </li>
            {{-- <li>
                <a class="app-menu__item" href="{{ route('admin.feedback.index') }}">
                    <i class="far fa-comments app-menu__icon"></i>
                    <span class="app-menu__label">Phản hồi</span>
                </a>
            </li> --}}
        </ul>
    </aside>
</section>