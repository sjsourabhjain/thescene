    <div class="dashboard-menu niceScroll">
        <div class="nav-menu">
            <div class="user-info">
                <!-- <div class="user-icon"><img src="{{ asset('images/avatar-1.jpg') }}" alt="img"></div> -->
                <div class="user-name ">
                    <h5>{{ auth()->user()->full_name }}</h5>
                    <span class="h6 text-muted">{{__('level.administrator')}}</span>
                </div>
            </div>
            <ul class="list-unstyled nav">
                <li class="nav-item"><span class="menu-title text-muted">{{__('level.navigation')}}</span></li>
                <li class="nav-item {{ (request()->is('admin/dashboard')) ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fal fa-home-alt"></i> {{__('level.dashboard')}}</a></li>
                @can('user_manage')
                <li class="nav-item {{ (request()->is('admin/*user*')) ? 'active' : '' }}"><a href="#" class="nav-link"><i class="fal fa-file-alt"></i> {{__('level.users')}} </a>
                    <ul class="sub-menu">
                        <li class="nav-item {{ (request()->is('admin/list-user')) ? 'active' : '' }}"><a href="{{ route('admin.list_user') }}" class="nav-link">{{__('level.list')}}</a></li>
                        <li class="nav-item {{ (request()->is('admin/create-user')) ? 'active' : '' }}"><a href="{{ route('admin.create_user') }}" class="nav-link">{{__('level.add')}}</a></li>
                    </ul>
                </li>
                @endcan
                @can('sub_admin_manage')
                <li class="nav-item {{ (request()->is('admin/*sub-admin*')) ? 'active' : '' }}"><a href="#" class="nav-link"><i class="fal fa-file-alt"></i> Sub Admin Management </a>
                    <ul class="sub-menu">
                        <li class="nav-item {{ (request()->is('admin/list-sub-admin')) ? 'active' : '' }}"><a href="{{ route('admin.list_sub_admin') }}" class="nav-link">List</a></li>
                        <li class="nav-item {{ (request()->is('admin/create-sub-admin')) ? 'active' : '' }}"><a href="{{ route('admin.create_sub_admin') }}" class="nav-link">Add</a></li>
                    </ul>
                </li>
                @endcan
                @can('slider')
                <li class="nav-item {{ (request()->is('admin/*slider*')) ? 'active' : '' }}"><a href="#" class="nav-link"><i class="fal fa-file-alt"></i> Slider </a>
                    <ul class="sub-menu">
                        <li class="nav-item {{ (request()->is('admin/list-slider')) ? 'active' : '' }}"><a href="{{ route('admin.list_slider') }}" class="nav-link">{{__('level.list')}}</a></li>
                        <li class="nav-item {{ (request()->is('admin/create-slider')) ? 'active' : '' }}"><a href="{{ route('admin.create_slider') }}" class="nav-link">{{__('level.add')}}</a></li>
                    </ul>
                </li>
                @endcan
                @can('category')
                <li class="nav-item {{ (request()->is('admin/*category*')) ? 'active' : '' }}"><a href="#" class="nav-link"><i class="fal fa-file-alt"></i> Category </a>
                    <ul class="sub-menu">
                        <li class="nav-item {{ (request()->is('admin/list-category')) ? 'active' : '' }}"><a href="{{ route('admin.list_category') }}" class="nav-link">{{__('level.list')}}</a></li>
                        <li class="nav-item {{ (request()->is('admin/create-category')) ? 'active' : '' }}"><a href="{{ route('admin.create_category') }}" class="nav-link">{{__('level.add')}}</a></li>
                    </ul>
                </li>
                @endcan
                @can('events')
                <li class="nav-item {{ (request()->is('admin/*events*')) ? 'active' : '' }}"><a href="#" class="nav-link"><i class="fal fa-file-alt"></i> events </a>
                    <ul class="sub-menu">
                        <li class="nav-item {{ (request()->is('admin/list-events')) ? 'active' : '' }}"><a href="{{ route('admin.list_events') }}" class="nav-link">{{__('level.list')}}</a></li>
                        <li class="nav-item {{ (request()->is('admin/create-events')) ? 'active' : '' }}"><a href="{{ route('admin.create_events') }}" class="nav-link">{{__('level.add')}}</a></li>
                    </ul>
                </li>
                @endcan
                @can('order')
                <li class="nav-item {{ (request()->is('admin/*order*')) ? 'active' : '' }}"><a href="#" class="nav-link"><i class="fal fa-file-alt"></i> Order </a>
                    <ul class="sub-menu">
                        <li class="nav-item {{ (request()->is('admin/list-order')) ? 'active' : '' }}"><a href="{{ route('admin.list_order') }}" class="nav-link">{{__('level.list')}}</a></li>
                    </ul>
                </li>
                @endcan
                @can('setting')
                <li class="nav-item {{ (request()->is('admin/*setting*')) ? 'active' : '' }}"><a href="#" class="nav-link"><i class="fal fa-file-alt"></i> Setting </a>
                    <ul class="sub-menu">
                        <li class="nav-item {{ (request()->is('admin/edit-settings')) ? 'active' : '' }}"><a href="{{ route('admin.edit_settings') }}" class="nav-link">{{__('level.list')}}</a></li>
                    </ul>
                </li>
                @endcan
            </ul>
        </div>
    </div>