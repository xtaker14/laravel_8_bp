@foreach ($all_menus as $menu) 
    @if (
        $logged_in_user->hasAllAccess() ||
        (
            $logged_in_user->can($menu->name)
        )
    )
        @php
            $exp_menu_route = explode('.', $menu->menu_route);
            $parent_menu_route = '';
            if(count($exp_menu_route) > 1){
                for($c=0; $c<(count($exp_menu_route)-1); $c++){
                    $parent_menu_route .= $exp_menu_route[$c].'.';
                }
                $parent_menu_route .= '*';
            }
            // dump($parent_menu_route);
            // exit; 
        @endphp

        <li class="c-sidebar-nav-{{ ($menu->children->count() > 0) ? 'dropdown' : 'item' }}">
            <x-utils.link 
                :text="$menu->description"
                class="{{ ($menu->children->count() > 0) ? 'c-sidebar-nav-dropdown-toggle' : 'c-sidebar-nav-link' }}" 
                icon="{{ (!$mu_x_icon) ? '' : $mu_x_icon }}" 
                :href="($menu->menu_route == '' || $menu->menu_route == '#') ? '#' : route($menu->menu_route)" 
                :active="(!empty($parent_menu_route) ? activeClass(Route::is($parent_menu_route), 'c-active') : '')" 
            /> 
            
            @if($menu->children->count() > 0)
                <ul class="c-sidebar-nav-dropdown-items">
                    @include('backend.includes.partials.main_menus',[
                        'all_menus'=>$menu->children,
                        'mu_x_icon'=>false, 
                    ])
                </ul>
            @endif
        </li>
    @endif
@endforeach

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