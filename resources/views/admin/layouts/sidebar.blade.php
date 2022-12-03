<aside class="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"><span>Main</span></li>

                <li class="{{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}"><i class="las la-home"></i><span>@lang('Dashboard')</span></a>
                </li>

                <li class="{{ (request()->is('admin/posts/all')) ? 'active' : '' }}">
                    <a href="{{ route('admin.posts') }}"><i class="las la-tag"></i> <span>@lang('Posts')</span></a>
                </li>

                <li class="{{ (request()->is('admin/category')) ? 'active' : '' }}">
                    <a href="{{ route('admin.category') }}"><i class="las la-tag"></i> <span>@lang('Category')</span></a>
                </li>

                <li class="{{ (request()->is('admin/service/create')) ? 'active' : '' }}">
                    <a href="{{ route('admin.service.create') }}"><i class="las la-plus"></i> <span>@lang('Add Service')</span></a>
                </li>

                <li class="{{ (request()->is('admin/service')) ? 'active' : '' }}">
                    <a href="{{ route('admin.service') }}"><i class="las la-tags"></i> <span>@lang('Services')</span></a>
                </li>

                <li class="submenu {{ (request()->is('admin/order*')) ? 'active' : '' }}">
                    <a href="javascript:void(0)"><i class="las la-shopping-cart"></i><span> @lang('Orders') </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('admin.order.new') }}" class="{{ (request()->is('admin/order/new')) ? 'active' : '' }}" >@lang('New Order')</a></li>
                        <li><a href="{{ route('admin.order.pending') }}" class="{{ (request()->is('admin/order/pending')) ? 'active' : '' }}" >@lang('Pending')</a></li>
                        <li><a href="{{ route('admin.order.approved') }}" class="{{ (request()->is('admin/order/approved')) ? 'active' : '' }}" >@lang('Approved')</a></li>
                        <li><a href="{{ route('admin.order.running') }}" class="{{ (request()->is('admin/order/running')) ? 'active' : '' }}" >@lang('Running')</a></li>
                        <li><a href="{{ route('admin.order.closed') }}" class="{{ (request()->is('admin/order/closed')) ? 'active' : '' }}" >@lang('Closed')</a></li>
                        <li><a href="{{ route('admin.order') }}" class="{{ (request()->is('admin/order')) ? 'active' : '' }}">@lang('All Orders')</a></li>
                    </ul>
                </li>

                <li class="{{ (request()->is('admin/slider')) ? 'active' : '' }}">
                    <a href="{{ route('admin.slider') }}"><i class="las la-tag"></i> <span>@lang('Slider')</span></a>
                </li>

                <li class="submenu {{ (request()->is('admin/contact*')) ? 'active' : '' }}">
                    <a href="javascript:void(0)"><i class="las la-headset"></i><span> @lang('Contact') </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('admin.contact.pending') }}" class="{{ (request()->is('admin/contact/pending')) ? 'active' : '' }}" >@lang('Pending')</a></li>
                        <li><a href="{{ route('admin.contact.closed') }}" class="{{ (request()->is('admin/contact/closed')) ? 'active' : '' }}" >@lang('Closed')</a></li>
                        <li><a href="{{ route('admin.contact') }}" class="{{ (request()->is('admin/contact')) ? 'active' : '' }}">@lang('All Contact')</a></li>
                    </ul>
                </li>

                <li class="{{ (request()->is('admin/testimonial')) ? 'active' : '' }}">
                    <a href="{{ route('admin.testimonial') }}"><i class="lar la-sun"></i> <span>@lang('Testimonial')</span></a>
                </li>

                <li class="submenu">
                    <a href="javascript:void(0)"><i class="las la-cog"></i><span> @lang('Settings') </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('admin.settings.general') }}" class="{{ (request()->is('admin/general')) ? 'active' : '' }}" >@lang('General')</a></li>
                        <li><a href="{{ route('admin.web-setting.about') }}" class="{{ (request()->is('admin/web-setting/about')) ? 'active' : '' }}" >@lang('About page')</a></li>
                        <li><a href="{{ route('admin.web-setting.terms') }}" class="{{ (request()->is('admin/web-setting/terms')) ? 'active' : '' }}" >@lang('Terms & Conditions')</a></li>
                        <li><a href="{{ route('admin.web-setting.privacy') }}" class="{{ (request()->is('admin/web-setting/privacy')) ? 'active' : '' }}">@lang('Privacy & Policy')</a></li>
                    </ul>
                </li>

                <li class="{{ (request()->is('admin/profile')) ? 'active' : '' }}">
                    <a href="{{ route('admin.profile') }}"><i class="lar la-user-circle"></i> <span>@lang('Manage Profile')</span></a>
                </li>

                <li class="">
                    <a href="{{ url('logout') }}"> <i class="las la-power-off"></i> <span>@lang('Logout')</span></a>
                </li>
            </ul>
        </div>
    </div>
</aside>
