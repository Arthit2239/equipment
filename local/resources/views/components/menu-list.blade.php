@foreach ($menu as $key => $value)
    <li class="nav-item">
        <a href="{{ url($value->menu_link) }}" class="nav-link menu_sub_action" id="{{ $value->id }}"><i
                class="nav-icon {{ $value->menu_icon }}"></i>
            <p>{{ $value->menu_name }}
                @if ($value->menu_icon_sub == 'Y')
                    <i class="fas fa-angle-left right"></i>
                @endif
            </p>
        </a>
        @if (!empty(Util::CheckArray($menu_sub, $value->id)))
            @foreach (Util::CheckArray($menu_sub, $value->id) as $key => $val)
                <ul class="nav nav-treeview menu_sub{{ $val['menu_sub_id'] }}">
                    <li class="nav-item">
                        <a href="{{ url($val['link']) }}" class="nav-link"><i
                                class="nav-icon {{ $val['menu_icon'] }}"></i>
                            <p>{{ $val['name'] }}</p>
                        </a>
                    </li>
                </ul>
            @endforeach
        @endif
    </li>
@endforeach

