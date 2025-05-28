<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="corporate">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">
    <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
            <x-app-logo />
        </a>

        <flux:navlist variant="outline">
            <flux:navlist.group :heading="__('Platform')" class="grid">

                {{-- blade-formatter-disable-next-line --}}
                <flux:navlist.item :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                    <div class="flex flex-row items-center gap-2">
                        <x-fas-home class="size-4" />
                        <div class="pt-0.5">{{ __('Dashboard') }}</div>
                    </div>
                </flux:navlist.item>

                {{-- blade-formatter-disable-next-line --}}
                <flux:navlist.item :href="route('project-list')" :current="request()->routeIs('project-list')" wire:navigate>
                    <div class="flex flex-row items-center gap-2">
                        <x-fas-project-diagram class="size-4" />
                        <div class="pt-0.5">{{ __('Project') }}</div>
                    </div>
                </flux:navlist.item>

                {{-- blade-formatter-disable-next-line --}}
                <flux:navlist.item :href="route('sph-list')" :current="request()->routeIs('sph-list')" wire:navigate>
                    <div class="flex flex-row items-center gap-2">
                        <x-fas-file-lines class="size-4" />
                        <div class="pt-0.5">{{ __('SPH') }}</div>
                    </div>
                </flux:navlist.item>

                {{-- blade-formatter-disable-next-line --}}
                <flux:navlist.item :href="route('spk-list')" :current="request()->routeIs('spk-list')" wire:navigate>
                    <div class="flex flex-row items-center gap-2">
                        <x-fas-file-lines class="size-4" />
                        <div class="pt-0.5">{{ __('SPK') }}</div>
                    </div>
                </flux:navlist.item>

                {{-- blade-formatter-disable-next-line --}}
                <flux:navlist.item :href="route('kak-rab-list')" :current="request()->routeIs('kak-rab-list')" wire:navigate>
                    <div class="flex flex-row items-center gap-2">
                        <x-fas-file-lines class="size-4" />
                        <div class="pt-0.5">{{ __('KAK & RAB') }}</div>
                    </div>
                </flux:navlist.item>

                {{-- blade-formatter-disable-next-line --}}
                <flux:navlist.item :href="route('invoice-list')" :current="request()->routeIs('invoice-list')" wire:navigate>
                    <div class="flex flex-row items-center gap-2">
                        <x-fas-file-lines class="size-4" />
                        <div class="pt-0.5">{{ __('Invoice') }}</div>
                    </div>
                </flux:navlist.item>

                {{-- blade-formatter-disable-next-line --}}
                <flux:navlist.item :href="route('bast-list')" :current="request()->routeIs('bast-list')" wire:navigate>
                    <div class="flex flex-row items-center gap-2">
                        <x-fas-file-lines class="size-4" />
                        <div class="pt-0.5">{{ __('BAST') }}</div>
                    </div>
                </flux:navlist.item>

                {{-- blade-formatter-disable-next-line --}}
                <flux:navlist.item :href="route('sp2d-list')" :current="request()->routeIs('sp2d-list')" wire:navigate>
                    <div class="flex flex-row items-center gap-2">
                        <x-fas-file-lines class="size-4" />
                        <div class="pt-0.5">{{ __('SP2D') }}</div>
                    </div>
                </flux:navlist.item>

                {{-- blade-formatter-disable-next-line --}}
                <flux:navlist.item :href="route('user-list')" :current="request()->routeIs('user-list')" wire:navigate>
                    <div class="flex flex-row items-center gap-2">
                        <x-fas-users class="size-4" />
                        <div class="pt-0.5">{{ __('User') }}</div>
                    </div>
                </flux:navlist.item>

            </flux:navlist.group>
        </flux:navlist>

        <flux:spacer />

        <!-- Desktop User Menu -->
        <flux:dropdown position="bottom" align="start">
            {{-- blade-formatter-disable-next-line --}}
            <flux:profile :name="auth()->user()->name" :initials="auth()->user()->initials()"
                icon-trailing="chevrons-up-down" />

            <flux:menu class="w-[220px]">
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:sidebar>

    <!-- Mobile User Menu -->
    <flux:header class="lg:hidden">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <flux:spacer />

        <flux:dropdown position="top" align="end">
            {{-- blade-formatter-disable-next-line --}}
            <flux:profile :initials="auth()->user()->initials()" icon-trailing="chevron-down" />

            <flux:menu>
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:header>

    {{ $slot }}

    @fluxScripts

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('modals')
    @stack('scripts')

    <script>
        function comingSoon() {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Fitur ini belum tersedia',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                toast: true,
                position: 'bottom-end',
            });
        }
    </script>
</body>

</html>