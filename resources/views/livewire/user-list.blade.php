<div>
    <div class="container flex flex-col justify-center space-y-4">
        <h1 class="text-2xl font-bold">User List</h1>

        <div class="flex flex-col lg:flex-row lg:justify-between items-center gap-4">
            <input type="text" name="keyword" placeholder="Pencarian" class="input w-full lg:w-1/4"
                value="{{ $keyword }}" wire:model.live.debounce="keyword" />
            <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm w-full lg:w-auto" wire:navigate>
                <x-fas-plus class="size-4" /> Tambah User
            </a>
        </div>

        @if (session()->has('success'))
        <div class="alert alert-success shadow-lg">
            <div class="flex items-center gap-2">
                <x-fas-check class="size-4" />
                <span>{{ session('success') }}</span>
            </div>
        </div>
        @endif

        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th>
                            <div class="flex justify-center">
                                <x-fas-cog class="size-4" />
                            </div>
                        </th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($user_lists->count() == 0)
                    <tr>
                        <td colspan="4" class="text-center">Data tidak ditemukan</td>
                    </tr>
                    @endif
                    @foreach ($user_lists as $user_list)
                    <tr>
                        <td>
                            <div class="flex gap-2 items-center justify-center flex-nowrap">
                                <a href="{{ route('user.edit', $user_list) }}" class="btn btn-accent btn-sm text-white" title="Edit" wire:wire:navigate>
                                    <x-fas-pen class="size-4" />
                                </a>
                                <button type="button" class="btn btn-error btn-sm text-white" title="Delete"
                                    onclick="comingSoon()">
                                    <x-fas-trash class="size-4" />
                                </button>
                                <a href="{{ route('user.reset', $user_list) }}" class="btn btn-warning btn-sm text-white" title="Reset Password" wire:wire:navigate>
                                    <x-fas-key class="size-4" />
                                </a>
                            </div>
                        </td>
                        <td class="text-nowrap">{{ $user_list->username }}</td>
                        <td class="text-nowrap">{{ $user_list->name }}</td>
                        <td class="text-nowrap">{{ $user_list->email }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $user_lists->links() }}
    </div>
</div>
