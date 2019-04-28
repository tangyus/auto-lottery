<header class="am-topbar am-topbar-inverse admin-header" style="position: absolute; z-index: 1;">
    <div class="am-topbar-brand" style="min-width: 150px; padding: 0 25px;">
        <strong>
            {{env('title', '自动生成抽奖器')}}
        </strong>
    </div>

    <div class="am-collapse am-topbar-collapse" id="topbar-collapse">
        <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list tpl-header-list">
            <li class="am-dropdown" data-am-dropdown data-am-dropdown-toggle>
                <a class="am-dropdown-toggle tpl-header-list-link" href="javascript:;">
                    <span class="tpl-header-list-user-nick">{{session('user_name')}}</span>
                    <span class="tpl-header-list-user-ico">
                        <img src="{{asset('/assets/img/user01.png')}}" alt="">
                    </span>
                </a>
                <ul class="am-dropdown-content">
                    <li><a href="{{ url('index') }}"><span class="am-icon-bell-o"></span> 个人信息</a></li>
                    <li><a href="{{ url('index') }}"><span class="am-icon-headphones"></span> 修改密码</a></li>
                    <li><a href="{{ url('index') }}"><span class="am-icon-power-off"></span> 退出登录</a></li>
                </ul>
            </li>
        </ul>
    </div>
</header>