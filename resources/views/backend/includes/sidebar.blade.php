@php
    // echo '<ul>';
    // echo adminDynamicMenus($all_menus); 
    // echo '</ul>';
    // exit;
@endphp 

<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        <x-utils.link :href="route('admin.dashboard')" style="color: #fff;">
            <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="{{ asset('img/brand/coreui.svg#full') }}"></use>
            </svg>
        </x-utils.link>
        <x-utils.link :href="route('admin.dashboard')" style="color: #fff;">
            <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
                <use xlink:href="{{ asset('img/brand/coreui.svg#signet') }}"></use>
            </svg>
        </x-utils.link>
    </div><!--c-sidebar-brand-->

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-title" style="padding-bottom: 2px;">
            <img class="c-avatar-img" style="width: auto; margin-bottom: 10px;" src="{{ $logged_in_user->avatar }}" alt="{{ $logged_in_user->email ?? '' }}">
            <h5 style="margin-bottom: 0px;">
                {{ $logged_in_user->name }}
            </h5>
        </li>

        <li class="c-sidebar-nav-dropdown">
            <x-utils.link
                href="#" 
                style="padding-top: 0px; padding-bottom: 0px;" 
                class="c-sidebar-nav-dropdown-toggle" 
                :text="$logged_in_user->email" />

            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        :href="route('frontend.user.account')"
                        class="c-sidebar-nav-link" 
                        :text="__('My Account')" 
                        :active="activeClass(Route::is('frontend.user.account'), 'c-active')" />
                </li>

                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        class="c-sidebar-nav-link"
                        onclick="event.preventDefault();document.getElementById('logout-form-sidebar').submit();">
                        <x-slot name="text">
                            @lang('Logout')
                            <x-forms.post :action="route('frontend.auth.logout')" id="logout-form-sidebar" class="d-none" />
                        </x-slot>
                    </x-utils.link>
                </li>
            </ul>
        </li>
        
        {{-- <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('admin.dashboard')"
                :active="activeClass(Route::is('admin.dashboard'), 'c-active')"
                icon="c-sidebar-nav-icon cil-speedometer"
                :text="__('Dashboard')" />
        </li> --}}

        <li class="c-sidebar-nav-title" style="color: #f7e59f;">
            <i class="fa fa-certificate"></i> @lang('Dashboard')
        </li>

        <li class="c-sidebar-nav-item">
            <x-utils.link
                href="{{ asset('admin/dashboard') }}"
                icon="c-sidebar-nav-icon fas fa-tachometer-alt nav-icon"
                class="c-sidebar-nav-link"
                :text="__('Dashboard')" />
        </li>

        <li class="c-sidebar-nav-title" style="color: #f7e59f;">
            <i class="fa fa-certificate"></i> @lang('Berita & Updates')
        </li>

        <li class="c-sidebar-nav-dropdown">
            <x-utils.link
                href="#"
                icon="c-sidebar-nav-icon nav-icon fas fa-newspaper"
                class="c-sidebar-nav-dropdown-toggle"
                :text="__('Berita & Update')" />

            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="{{ asset('admin/berita') }}"
                        icon="c-sidebar-nav-icon-2 fas fa-newspaper nav-icon"
                        class="c-sidebar-nav-link"
                        :text="__('Data Berita & Update')" />
                </li>
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="{{ asset('admin/berita/tambah') }}"
                        icon="c-sidebar-nav-icon-2 fa fa-plus nav-icon"
                        class="c-sidebar-nav-link"
                        :text="__('Tambah Berita/Update')" />
                </li>
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="{{ asset('admin/kategori') }}"
                        icon="c-sidebar-nav-icon-2 fa fa-tags nav-icon"
                        class="c-sidebar-nav-link"
                        :text="__('Kategori berita')" />
                </li>

            </ul>
        </li>

        <li class="c-sidebar-nav-dropdown">
            <x-utils.link
                href="#"
                icon="c-sidebar-nav-icon nav-icon fas fa-image"
                class="c-sidebar-nav-dropdown-toggle"
                :text="__('Galeri & Banner')" />

            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="{{ asset('admin/galeri') }}"
                        icon="c-sidebar-nav-icon-2 fas fa-newspaper nav-icon"
                        class="c-sidebar-nav-link"
                        :text="__('Data Galeri')" />
                </li>
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="{{ asset('admin/galeri/tambah') }}"
                        icon="c-sidebar-nav-icon-2 fa fa-plus nav-icon"
                        class="c-sidebar-nav-link"
                        :text="__('Tambah Galeri')" />
                </li>
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="{{ asset('admin/kategori_galeri') }}"
                        icon="c-sidebar-nav-icon-2 fa fa-tags nav-icon"
                        class="c-sidebar-nav-link"
                        :text="__('Kategori Galeri')" />
                </li>
            </ul>
        </li>

        <li class="c-sidebar-nav-dropdown">
            <x-utils.link
                href="#"
                icon="c-sidebar-nav-icon nav-icon fas fa-calendar"
                class="c-sidebar-nav-dropdown-toggle"
                :text="__('Event & Agenda')" />

            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="{{ asset('admin/agenda') }}"
                        icon="c-sidebar-nav-icon-2 fas fa-newspaper nav-icon"
                        class="c-sidebar-nav-link"
                        :text="__('Data Event & Agenda')" />
                </li>
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="{{ asset('admin/agenda/tambah') }}"
                        icon="c-sidebar-nav-icon-2 fa fa-plus nav-icon"
                        class="c-sidebar-nav-link"
                        :text="__('Tambah Event & Agenda')" />
                </li>
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="{{ asset('admin/kategori_agenda') }}"
                        icon="c-sidebar-nav-icon-2 fa fa-tags nav-icon"
                        class="c-sidebar-nav-link"
                        :text="__('Kategori Event & Agenda')" />
                </li>
            </ul>
        </li>

        <li class="c-sidebar-nav-dropdown">
            <x-utils.link
                href="#"
                icon="c-sidebar-nav-icon nav-icon fas fa-download"
                class="c-sidebar-nav-dropdown-toggle"
                :text="__('Download & File')" />

            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="{{ asset('admin/download') }}"
                        icon="c-sidebar-nav-icon-2 fas fa-newspaper nav-icon"
                        class="c-sidebar-nav-link"
                        :text="__('Data File')" />
                </li>
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="{{ asset('admin/download/tambah') }}"
                        icon="c-sidebar-nav-icon-2 fa fa-plus nav-icon"
                        class="c-sidebar-nav-link"
                        :text="__('Tambah File')" />
                </li>
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="{{ asset('admin/kategori_download') }}"
                        icon="c-sidebar-nav-icon-2 fa fa-tags nav-icon"
                        class="c-sidebar-nav-link"
                        :text="__('Kategori File')" />
                </li>
            </ul>
        </li>

        <li class="c-sidebar-nav-item">
            <x-utils.link
                href="{{ asset('admin/video') }}"
                icon="c-sidebar-nav-icon fas fa-film nav-icon"
                class="c-sidebar-nav-link"
                :text="__('Video Webinar')" />
        </li>

        <li class="c-sidebar-nav-title" style="color: #f7e59f;">
            <i class="fa fa-certificate"></i> @lang('Profil & Layanan')
        </li> 

        <li class="c-sidebar-nav-item">
            <x-utils.link
                href="{{ asset('admin/konfigurasi/profil') }}"
                icon="c-sidebar-nav-icon fas fa-leaf nav-icon"
                class="c-sidebar-nav-link"
                :text="__('Update Profil')" />
        </li>

        <li class="c-sidebar-nav-item">
            <x-utils.link
                href="{{ asset('admin/berita/jenis_berita/Layanan') }}"
                icon="c-sidebar-nav-icon fas fa-book nav-icon"
                class="c-sidebar-nav-link"
                :text="__('Layanan')" />
        </li>

        <li class="c-sidebar-nav-dropdown">
            <x-utils.link
                href="#"
                icon="c-sidebar-nav-icon nav-icon fas fa-users"
                class="c-sidebar-nav-dropdown-toggle"
                :text="__('Board & Team')" />

            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="{{ asset('admin/staff') }}"
                        icon="c-sidebar-nav-icon-2 fas fa-newspaper nav-icon"
                        class="c-sidebar-nav-link"
                        :text="__('Data Board & Team')" />
                </li>
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="{{ asset('admin/staff/tambah') }}"
                        icon="c-sidebar-nav-icon-2 fa fa-plus nav-icon"
                        class="c-sidebar-nav-link"
                        :text="__('Tambah Board & Team')" />
                </li>
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="{{ asset('admin/kategori_staff') }}"
                        icon="c-sidebar-nav-icon-2 fa fa-tags nav-icon"
                        class="c-sidebar-nav-link"
                        :text="__('Kategori Board & Team')" />
                </li>
            </ul>
        </li>

        <li class="c-sidebar-nav-title" style="color: #f7e59f;">
            <i class="fa fa-certificate"></i> @lang('Website Setting')
        </li> 

        <li class="c-sidebar-nav-item">
            <x-utils.link
                href="{{ asset('admin/subscribers') }}"
                icon="c-sidebar-nav-icon fas fa-envelope nav-icon"
                class="c-sidebar-nav-link"
                :text="__('Subscribers')" />
        </li> 

        <li class="c-sidebar-nav-item">
            <x-utils.link
                href="{{ asset('admin/statistik') }}"
                icon="c-sidebar-nav-icon fas fa-newspaper nav-icon"
                class="c-sidebar-nav-link"
                :text="__('Statistik Data')" />
        </li> 

        <li class="c-sidebar-nav-item">
            <x-utils.link
                href="{{ asset('admin/heading') }}"
                icon="c-sidebar-nav-icon fas fa-image nav-icon"
                class="c-sidebar-nav-link"
                :text="__('Header Gambar')" />
        </li> 

        <li class="c-sidebar-nav-dropdown">
            <x-utils.link
                href="#"
                icon="c-sidebar-nav-icon nav-icon fas fa-cog"
                class="c-sidebar-nav-dropdown-toggle"
                :text="__('Konfigurasi')" />

            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="{{ asset('admin/konfigurasi') }}"
                        icon="c-sidebar-nav-icon-2 fas fa-tools nav-icon"
                        class="c-sidebar-nav-link"
                        :text="__('Konfigurasi Umum')" />
                </li>
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="{{ asset('admin/konfigurasi/logo') }}"
                        icon="c-sidebar-nav-icon-2 fa fa-home nav-icon"
                        class="c-sidebar-nav-link"
                        :text="__('Ganti Logo')" />
                </li>
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="{{ asset('admin/konfigurasi/icon') }}"
                        icon="c-sidebar-nav-icon-2 fa fa-upload nav-icon"
                        class="c-sidebar-nav-link"
                        :text="__('Ganti Icon')" />
                </li>
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="{{ asset('admin/konfigurasi/email') }}"
                        icon="c-sidebar-nav-icon-2 fa fa-envelope nav-icon"
                        class="c-sidebar-nav-link"
                        :text="__('Email Setting')" />
                </li>
                {{-- <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="{{ asset('admin/rekening') }}"
                        icon="c-sidebar-nav-icon-2 fas fa-book nav-icon"
                        class="c-sidebar-nav-link"
                        :text="__('Rekening')" />
                </li> --}}
            </ul>
        </li>
        
        {{-- <li class="c-sidebar-nav-dropdown">
            <x-utils.link
                href="#"
                icon="c-sidebar-nav-icon cil-list"
                class="c-sidebar-nav-dropdown-toggle"
                :text="__('Exports')" />

            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        :href="route('admin.exports.index')"
                        class="c-sidebar-nav-link"
                        :text="__('Export Excel')"
                        :active="activeClass(Route::is('admin.auth.user.*'), 'c-active')" />
                </li>
            </ul>
        </li> --}}
        
        {{-- <li class="c-sidebar-nav-title">@lang('Menu')</li>

        @include('backend.includes.partials.main_menus',[
            'all_menus'=>$all_menus,
            'mu_li_class'=>'dropdown',
            'mu_x_icon'=>'c-sidebar-nav-icon cil-list', 
        ]) --}}
        
        {{-- <li class="c-sidebar-nav-dropdown">
            <x-utils.link
                href="#"
                icon="c-sidebar-nav-icon cil-user"
                class="c-sidebar-nav-dropdown-toggle"
                :text="__('Test Parent')" />

            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-dropdown">
                    <x-utils.link
                        href="#"
                        class="c-sidebar-nav-dropdown-toggle"
                        :text="__('Test Child 1')" />
                    
                    <ul class="c-sidebar-nav-dropdown-items">
                        <li class="c-sidebar-nav-dropdown">
                            <x-utils.link
                                href="#"
                                class="c-sidebar-nav-dropdown-toggle"
                                :text="__('Test Child 11')" />

                            <ul class="c-sidebar-nav-dropdown-items">
                                <li class="c-sidebar-nav-dropdown">
                                    <x-utils.link
                                        href="#"
                                        class="c-sidebar-nav-dropdown-toggle"
                                        :text="__('Test Child 111')" />
                                    
                                    <ul class="c-sidebar-nav-dropdown-items">
                                        <li class="c-sidebar-nav-item">
                                            <x-utils.link
                                                href="#"
                                                class="c-sidebar-nav-link"
                                                :text="__('Test Child 1111')" />
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        href="#"
                        class="c-sidebar-nav-link"
                        :text="__('Test Child 2')" />
                </li>
                <li class="c-sidebar-nav-dropdown">
                    <x-utils.link
                        href="#"
                        class="c-sidebar-nav-dropdown-toggle"
                        :text="__('Test Child 3')" />
                    
                    <ul class="c-sidebar-nav-dropdown-items">
                        <li class="c-sidebar-nav-item">
                            <x-utils.link
                                href="#"
                                class="c-sidebar-nav-link"
                                :text="__('Test Child 33')" />
                        </li>
                        <li class="c-sidebar-nav-item">
                            <x-utils.link
                                href="#"
                                class="c-sidebar-nav-link"
                                :text="__('Test Child 33 (2)')" />
                        </li>
                    </ul>
                </li>
            </ul>
        </li> --}}

        @if (
            $logged_in_user->hasAllAccess() ||
            (
                $logged_in_user->can('admin.access.user.list') ||
                $logged_in_user->can('admin.access.user.deactivate') ||
                $logged_in_user->can('admin.access.user.reactivate') ||
                $logged_in_user->can('admin.access.user.clear-session') ||
                $logged_in_user->can('admin.access.user.impersonate') ||
                $logged_in_user->can('admin.access.user.change-password') 
                // $logged_in_user->can('admin.access.exports.list') ||
                // $logged_in_user->can('admin.access.pegawai.list')
            )
        )
            {{-- <li class="c-sidebar-nav-title">@lang('System')</li> --}}
            <li class="c-sidebar-nav-title" style="color: #f7e59f;">
                <i class="fa fa-certificate"></i> @lang('System')
            </li> 
            
            <li class="c-sidebar-nav-item">
                <x-utils.link
                    href="{{ route('admin.db.index') }}"
                    icon="c-sidebar-nav-icon fas fa-database nav-icon"
                    class="c-sidebar-nav-link"
                    :text="__('Database')" />
            </li> 
            
            <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.auth.user.*') || Route::is('admin.auth.role.*'), 'c-open c-show') }}">
                <x-utils.link
                    href="#"
                    icon="c-sidebar-nav-icon cil-user"
                    class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Access')" />

                <ul class="c-sidebar-nav-dropdown-items">
                    @if (
                        $logged_in_user->hasAllAccess() ||
                        (
                            $logged_in_user->can('admin.access.user.list') ||
                            $logged_in_user->can('admin.access.user.deactivate') ||
                            $logged_in_user->can('admin.access.user.reactivate') ||
                            $logged_in_user->can('admin.access.user.clear-session') ||
                            $logged_in_user->can('admin.access.user.impersonate') ||
                            $logged_in_user->can('admin.access.user.change-password')
                        )
                    )
                        <li class="c-sidebar-nav-dropdown">
                            <x-utils.link
                                href="#"
                                class="c-sidebar-nav-dropdown-toggle"
                                :text="__('User Management')" 
                                :active="activeClass(Route::is('admin.auth.user.*'), 'c-active')" />
                            
                            <ul class="c-sidebar-nav-dropdown-items">
                                <li class="c-sidebar-nav-item">
                                    <x-utils.link
                                        :href="route('admin.auth.user.index')"
                                        class="c-sidebar-nav-link"
                                        :text="__('List')"
                                        :active="activeClass(Route::is('admin.auth.user'), 'c-active')" />
                                </li>
                                <li class="c-sidebar-nav-item">
                                    <x-utils.link
                                        :href="route('admin.auth.user.deactivated')"
                                        class="c-sidebar-nav-link"
                                        :text="__('Deactivated Users')"
                                        :active="activeClass(Route::is('admin.auth.user.deactivated'), 'c-active')" />
                                </li>
                                <li class="c-sidebar-nav-item">
                                    <x-utils.link
                                        :href="route('admin.auth.user.deleted')"
                                        class="c-sidebar-nav-link"
                                        :text="__('Deleted Users')"
                                        :active="activeClass(Route::is('admin.auth.user.deleted'), 'c-active')" />
                                </li>
                            </ul>
                        </li> 
                    @endif

                    @if ($logged_in_user->hasAllAccess())
                        <li class="c-sidebar-nav-item">
                            <x-utils.link
                                :href="route('admin.auth.role.index')"
                                class="c-sidebar-nav-link"
                                :text="__('Role Management')"
                                :active="activeClass(Route::is('admin.auth.role.*'), 'c-active')" />
                        </li>
                        
                        {{-- <li class="c-sidebar-nav-item">
                            <x-utils.link
                                :href="route('admin.auth.categories.index')"
                                class="c-sidebar-nav-link"
                                :text="__('Categories Management')"
                                :active="activeClass(Route::is('admin.auth.categories.*'), 'c-active')" />
                        </li> --}}
                        
                        {{-- <li class="c-sidebar-nav-item">
                            <x-utils.link
                                :href="route('admin.auth.api.index')"
                                class="c-sidebar-nav-link"
                                :text="__('Auth API Management')"
                                :active="activeClass(Route::is('admin.auth.api.*'), 'c-active')" />
                        </li> --}}
                    @endif
                </ul>
            </li>
        @endif

        @if ($logged_in_user->hasAllAccess())
            <li class="c-sidebar-nav-dropdown">
                <x-utils.link
                    href="#"
                    icon="c-sidebar-nav-icon cil-list"
                    class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Logs')" />

                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('log-viewer::dashboard')"
                            class="c-sidebar-nav-link"
                            :text="__('Dashboard')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('log-viewer::logs.list')"
                            class="c-sidebar-nav-link"
                            :text="__('Logs')" />
                    </li>
                </ul>
            </li>
        @endif
    </ul>

    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div><!--sidebar-->
