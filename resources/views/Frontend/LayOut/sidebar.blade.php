<aside class="sidebar">
    <div class="sidebar-start">
        <div class="sidebar-head">
            <a href="{{asset('backend/elegant')}}/" class="logo-wrapper" title="Home">
                <span class="sr-only">Home</span>
                <span class="icon logo" aria-hidden="true"></span>
                <div class="logo-text">
                    <span class="logo-title">FindJob</span>
                    <span class="logo-subtitle">Dashboard</span>
                </div>

            </a>
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle" aria-hidden="true"></span>
            </button>
        </div>
        <div class="sidebar-body">
            <ul class="sidebar-body-menu">
                <li>
                    <a class="active" href="{{asset('backend/elegant')}}/"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
                </li>
                <li>
                    <a class="show-cat-btn" href="{{asset('backend/elegant')}}##">
                        <span class="icon document" aria-hidden="true"></span>Profile
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            @if(Auth::user()->role == 'user')
                            <a href="{{asset('backend/elegant')}}posts.html">Profile Pengguna</a>
                            <a href="{{asset('backend/elegant')}}posts.html">Upgrade ke Perusahaan</a>
                            @elseif(Auth::user()->role == 'perusahaan')
                            <a href="{{asset('backend/elegant')}}posts.html">Profile Perusahaan</a>
                            @elseif(Auth::user()->role == 'admin')
                            <a href="{{asset('backend/elegant')}}posts.html">Profile Admin</a>
                            @endif
                        </li>
                    </ul>
                </li>
                @if(Auth::user()->role == 'admin')
                <li>
                    <a class="show-cat-btn" href="{{asset('backend/elegant')}}##">
                        <span class="icon folder" aria-hidden="true"></span>CRUD
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="{{asset('backend/elegant')}}categories.html">Data Pengguna</a>
                        </li>
                    </ul>
                </li>
                @elseif(Auth::user()->role == 'perusahaan')
                <li>
                    <a class="show-cat-btn" href="{{asset('backend/elegant')}}##">
                        <span class="icon folder" aria-hidden="true"></span>CRUD
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="{{asset('backend/elegant')}}categories.html">CRUD Lowongan</a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
    <div class="sidebar-footer">
        <a href="{{asset('backend/elegant')}}##" class="sidebar-user">
            <span class="sidebar-user-img">
                <picture>
                    <source srcset="./img/avatar/avatar-illustrated-01.webp" type="image/webp"><img src="./img/avatar/avatar-illustrated-01.png" alt="User name">
                </picture>
            </span>
            <div class="sidebar-user-info">
                <span class="sidebar-user__title">{{Auth::user()->name}}</span>
                <span class="sidebar-user__subtitle">{{Auth::user()->role}}</span>
            </div>
        </a>
    </div>
    <div class="sidebar-logout">
        <a href="{{ route('index') }}" class="btn btn-logout">
            <span class="icon logout" aria-hidden="true"></span>
            Keluar
        </a>
    </div>
</aside>