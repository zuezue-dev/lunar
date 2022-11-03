<div>
    <x-hub::menu handle="sidebar"
                 current="{{ request()->route()->getName() }}">
        <ul class="space-y-1">
            @foreach ($component->sections as $section)
                <li x-data="{ subMenu: false }"
                    class="relative">
                    <button x-on:click.prevent="!showExpandedMenu && (subMenu = !subMenu)"
                            :class="{ 'hidden': showExpandedMenu }"
                            class="absolute z-10 grid w-6 h-6 -ml-1 text-gray-600 bg-gray-100 border border-gray-200 rounded -trangray-y-1/2 place-content-center top-1/2 left-full">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20"
                             fill="currentColor"
                             class="w-3 h-3 opacity-75">
                            <path
                                  d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                        </svg>
                    </button>

                    <a href="{{ route($section->route) }}"
                       @class([
                           'menu-link',
                           'menu-link--active' => $section->isActive(
                               $component->attributes->get('current')
                           ),
                           'menu-link--inactive' => !$section->isActive(
                               $component->attributes->get('current')
                           ),
                       ])
                       :class="{ 'justify-center': !showExpandedMenu }">
                        {!! $section->renderIcon('w-5 h-5') !!}

                        <span x-cloak
                              x-transition.opacity
                              x-transition:enter.duration.500ms
                              x-transition:leave.duration.0ms
                              x-show="showExpandedMenu"
                              class="text-sm font-medium">
                            {{ $section->name }}
                        </span>
                    </a>

                    @if (count($section->getItems()))
                        <ul x-cloak
                            x-transition:enter="transition-all duration-500"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100"
                            x-show="showExpandedMenu || subMenu"
                            x-on:click.away="subMenu = false"
                            :class="{
                                'border-l border-gray-200 pl-5 ml-[calc(1rem_+_2px)]': showExpandedMenu,
                                'absolute top-1.5 left-full ml-9 border border-gray-200 rounded-md bg-gray-100 p-2 w-64':
                                    !showExpandedMenu,
                            }"
                            class="space-y-1">
                            @foreach ($section->getItems() as $item)
                                <li>
                                    <a href="{{ route($item->route) }}"
                                       @class([
                                           'menu-link',
                                           'menu-link--active' => $item->isActive(
                                               $component->attributes->get('current')
                                           ),
                                           'menu-link--inactive' => !$item->isActive(
                                               $component->attributes->get('current')
                                           ),
                                       ])>
                                        {!! $item->renderIcon('w-5 h-5') !!}

                                        <span class="text-sm">
                                            {{ $item->name }}
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </x-hub::menu>

    @if (Auth::user()->can('settings'))
        <div class="flex flex-col w-full pt-4 mt-4 border-t border-gray-100 dark:border-gray-800"
             :class="{ 'items-center': !showExpandedMenu }">
            <a href="{{ route('hub.settings') }}"
               @class([
                   'menu-link',
                   'menu-link--active' => Str::contains(request()->url(), 'settings'),
                   'menu-link--inactive' => !Str::contains(request()->url(), 'settings'),
               ])
               :class="{ 'group': !showExpandedMenu }">
                {!! Lunar\Hub\LunarHub::icon('cog', 'w-5 h-5') !!}

                <span x-cloak
                      x-show="showExpandedMenu"
                      class="text-sm font-medium">
                    {{ __('adminhub::global.settings') }}
                </span>

                <span
                      class="absolute z-10 invisible p-2 ml-4 text-xs text-center text-white bg-gray-900 rounded dark:bg-gray-800 w-28 left-full group-hover:visible">
                    {{ __('adminhub::global.settings') }}
                </span>
            </a>
        </div>
    @endif
</div>
