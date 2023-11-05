<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{asset('backend')}}/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Rocker</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">

        <a href="{{route('dashboard')}}" class="" aria-expanded="false">
            <div class="parent-icon"><i class="bx bx-home-circle"></i>
            </div>
            <div class="menu-title">Dashboard</div>
        </a>


        @can('category-list')
            <li>
                <a href="{{route('categories.index')}}" class="">
                    <div class="parent-icon"> <i class="lni lni-bug"></i> </div>
                    <div class="menu-title"> Category </div>
                </a>
            </li>
        @endcan
        @can('setting-list')
            <li>
                <a href="{{route('settings')}}" class="">
                    <div class="parent-icon"> <i class="lni lni-world"></i> </div>
                    <div class="menu-title"> Site Settings</div>
                </a>

            </li>
        @endcan

        @can('dashboard')

            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"> <i class="lni lni-cog"></i> </div>
                    <div class="menu-title">Settings</div>
                </a>
                <ul>
                    @can('role-list')
                        <li>
                            <a href="{{route('roles.index')}}"><i class="bx bx-right-arrow-alt"></i>Roles</a></li>
                    @endcan
                    @can('permission-list')
                        <li><a href="{{route('permissions.index')}}"><i
                                        class="bx bx-right-arrow-alt"></i>Permissions</a></li>
                    @endcan
                    @can('admin-list')
                        <li><a href="{{route('admins.index')}}"><i class="bx bx-right-arrow-alt"></i>Admins</a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan

    </ul>
    <!--end navigation-->
</div>
