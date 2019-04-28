<div class="tpl-page-container tpl-page-header-fixed" style="margin-top: 0">
    <div class="tpl-left-nav tpl-left-nav-hover" style="margin-top: 80px">
        <div class="tpl-left-nav-title">
            {{env('title', '自动生成抽奖器')}}
        </div>
        <div class="tpl-left-nav-list">
            <ul class="tpl-left-nav-menu">
                <li class="tpl-left-nav-item">
                    <a href="{{ route('config') }}"  class="nav-link tpl-left-nav-link-list {{ request()->route()->getName() == 'config' ? 'active' : ''}}">
                        <i class="am-icon-angle-right"></i>
                        <span>抽奖管理</span>
                    </a>
                </li>
                <li class="tpl-left-nav-item">
                    <a href="javascript:;"  class="nav-link tpl-left-nav-link-list">
                        <i class="am-icon-angle-right"></i>
                        <span>数据表管理</span>
                    </a>

                    <ul class="tpl-left-nav-sub-menu" style="display: none">
                        <li>
                            <a href="{{ route('tables.index') }}" class="{{ in_array(Route::currentRouteName(), ['tables.index', 'tables.create', 'tables.edit']) ? 'active' : ''}}">
                                <i class="am-icon-angle-right"></i>
                                <span>所有数据表</span>
                            </a>
                        </li>
                        @if (isset($allTable) && count($allTable) > 0)
                        @foreach($allTable as $item)
                        <li>
                            <a href="{{ route('fields.index', ['name' => $item->name]) }}" class="{{ request()->route('name') == $item->name ? 'active' : ''}}">
                                <i class="am-icon-angle-right"></i>
                                <span>{{ $item->alias }}字段</span>
                            </a>
                        </li>
                        @endforeach
                        @endif
                    </ul>
                </li>
                <li class="tpl-left-nav-item">
                    <a href="javascript:;"  class="nav-link tpl-left-nav-link-list">
                        <i class="am-icon-angle-right"></i>
                        <span>奖池管理</span>
                    </a>
                    <ul class="tpl-left-nav-sub-menu" style="display: none">
                        <li>
                            <a href="{{ route('award') }}" class="{{ request()->route()->getName() == 'award' ? 'active' : ''}}">
                                <i class="am-icon-angle-right"></i>
                                <span>奖池生成</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('award.red_packet') }}" class="{{ request()->route()->getName() == 'award.red_packet' ? 'active' : ''}}">
                                <i class="am-icon-angle-right"></i>
                                <span>红包奖池生成</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('award.list') }}" class="{{ request()->route()->getName() == 'award.list' ? 'active' : ''}}">
                                <i class="am-icon-angle-right"></i>
                                <span>奖池列表</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('award.list.group') }}" class="{{ request()->route()->getName() == 'award.list.group' ? 'active' : ''}}">
                                <i class="am-icon-angle-right"></i>
                                <span>时间段奖池列表</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="tpl-left-nav-item">
                    <a href="javascript:;"  class="nav-link tpl-left-nav-link-list">
                        <i class="am-icon-angle-right"></i>
                        <span>模型管理</span>
                    </a>
                    <ul class="tpl-left-nav-sub-menu" style="display: none">
                        <li>
                            <a href="{{ route('model.index') }}" class="{{ in_array(Route::currentRouteName(), ['model.index', 'model.create', 'model.edit']) ? 'active' : ''}}">
                                <i class="am-icon-angle-right"></i>
                                <span>模型列表</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $($('.tpl-left-nav-sub-menu a')).each(function (index, item) {
            if ($(item).hasClass('active')) {
                $(item).parents('.tpl-left-nav-sub-menu').css('display', 'block');
                var parent = $(item).parents('.tpl-left-nav-item');

                $(parent).find('a.tpl-left-nav-link-list').addClass('active');
            }
        })
    });
</script>