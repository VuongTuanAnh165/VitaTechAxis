<li>
    <a href="{{ route('admin.user.index') }}" class="menu-customize side-menu {{ App\Helpers\Common::asideActiveParent([config('routes.admin.user')], 'menu-customize-active') }}">
        <div class="icon-customize side-menu__icon"> <i data-lucide="user"></i></div>
        <div class="title-customize side-menu__title">{{ __('messages.web.customer.title') }}</div>
    </a>
</li>