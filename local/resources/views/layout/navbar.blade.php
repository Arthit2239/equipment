<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #343a40;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <font color="#fff"><i class="fas fa-bars"></i></font>
            </a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="px-1 dropdown">
            <button class="btn-c member ml-1 dropdown-toggle" type="button" id="i_member" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" data-offset="0,7" title="Username">
                <span class="overflow-hidden">
                    @if(!empty(Auth::guard('member')->user()->image))
                        <x-img-view-list path="profile/" image="{{ Auth::guard('member')->user()->image }}"
                            class="img-responsive img-rounded" alt="User picture">
                        </x-img-view-list>
                    @else
                        <x-img-view-list path="profile/" image="user_profile_empty.png"
                            class="img-responsive img-rounded" alt="User picture">
                        </x-img-view-list>
                    @endif
                </span>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="i_member">
                <h6 class="dropdown-header">{{ Auth::guard('member')->user()->m_name }} [{{ Auth::guard('member')->user()->m_username }}]</h6>

                <a class="dropdown-item" href="{{ route('profile.edit', Auth::guard('member')->user()->id) }}">
                    <i class="fa fa-user"></i> โปรไฟล์</a>

                <a class="dropdown-item" href="{{ url('logout') }}">
                    <i class="fa fa-power-off m-r-5 m-l-5"></i> ออกจากระบบ</a>
            </div>
        </li>
    </ul>
</nav>
