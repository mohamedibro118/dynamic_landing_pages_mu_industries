     <!-- Sidebar Menu -->
     <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
             <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
             @foreach ($items as $item)
                 <li class="nav-item {{ Route::is($item['active']) ? 'menu-open' : '' }}">
                     <a href="{{ $item['route'] == '#' ? '#' : route($item['route']) }}"
                         class="nav-link {{ Route::is($item['active']) ? 'active' : '' }}">
                         @if ($item['icon'] ?? false)
                             <i class="{{ $item['icon'] }}" style="font-size: .9em;color: #3ED6FF"></i>
                         @else
                             <i class="nav-icon" style="padding: 0px 5px 0px 5px;text-align: center">
                                 {!! $item['svg'] !!}</i>
                         @endif
                         <p>
                             {{ $item['title'] }}
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     @if ($item['subItems'] ?? false)
                         <ul class="nav nav-treeview">
                             @foreach ($item['subItems'] as $sub_item)
                                 <li class="nav-item">
                                     <a href="{{ route($sub_item['route']) }}"
                                         class="nav-link {{ Route::is($sub_item['active']) ? 'active' : '' }}">
                                         @if ($sub_item['icon'] ?? false)
                                             <i class="{{ $sub_item['icon'] }}" style="font-size: .9em;color: #3ED6FF"></i>
                                         @else
                                             <i class="nav-icon" style="padding: 0px 5px 0px 5px;text-align: center">
                                                 {!! $sub_item['svg'] !!}</i>
                                         @endif
                                         <p>{{ $sub_item['title'] }}</p>
                                     </a>
                                 </li>
                             @endforeach
                         </ul>
                     @endif

                 </li>
             @endforeach

         </ul>
     </nav>
