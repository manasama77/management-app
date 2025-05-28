<div>
    <div class="container flex flex-col justify-center space-y-4">
        <h1 class="text-2xl font-bold">Tambah User</h1>

        <div class="flex flex-col lg:flex-row lg:justify-between items-center gap-4">
            <a href="{{ route('user-list') }}" class="btn btn-secondary btn-sm w-full lg:w-auto" wire:navigate>
                <x-fas-arrow-left class="size-4" /> List User
            </a>
        </div>

        <div class="card w-96 bg-base-100 card-md shadow-sm">
            <div class="card-body">
                <h2 class="card-title">Form User</h2>
                <form class="flex flex-col gap-4" wire:submit.prevent="save">
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend" for="username">Username</legend>
                        <input type="text" name="username" class="input" placeholder="Username"
                            wire:model.live.debounce="username" />
                        @error('username')
                        <p class="label text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend" for="password">Password</legend>
                        <input type="password" name="password" class="input" placeholder="Password"
                            wire:model="password" />
                        @error('password')
                        <p class="label text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend" for="password_confirmation">Konfirmasi Password</legend>
                        <input type="password" name="password_confirmation" class="input"
                            placeholder="Konfirmasi Password" wire:model="password_confirmation" />
                        @error('password_confirmation')
                        <p class="label text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>
                    <hr />
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend" for="name">Nama</legend>
                        <input type="text" name="name" class="input" placeholder="Nama"
                            wire:model.live.debounce="name" />
                        @error('name')
                        <p class="label text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend" for="email">Email</legend>
                        <input type="email" name="email" class="input" placeholder="mail@example.com"
                            wire:model.live.debounce="email" />
                        @error('email')
                        <p class="label text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>
                    <div class="justify-end card-actions">
                        <button type="submit" class="btn btn-primary">
                            <x-fas-save class="size-4" /> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script></script>
@endpush