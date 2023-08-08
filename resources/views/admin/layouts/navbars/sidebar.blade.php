<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini"></a>
            <a href="{{ route('admin.profile.admin') }}" class="simple-text logo-normal">{{ $data->first_name . ' ' . $data->last_name }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('WEB Management') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="{{ route('admin.profile.admin') }}">
                                <i class="tim-icons icon-badge"></i>
                                <p>{{ __('Admin Profile') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{route ('admin.users.users') }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('Users Management') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'products') class="active " @endif>
                            <a href="{{ route('admin.products.products')}}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Products') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li @if ($pageSlug == 'notifications') class="active " @endif>
                <a href="{{ route('admin.notifications.notifications') }}">
                    <i class="tim-icons icon-bell-55"></i>
                    <p>{{ __('Notifications') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'icons') class="active " @endif>
            <a href="{{ route('admin.icon.icons') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{ __('Icons') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'icons') class="active " @endif>
            <a href="{{ route('admin.blog.article') }}">
                    <i class="tim-icons icon-bulb-63"></i>
                    <p>{{ __('Blog Articles') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
