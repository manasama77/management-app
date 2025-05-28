<div>
    <div class="container flex flex-col justify-center space-y-4">
        <h1 class="text-2xl font-bold">{{ $title }}</h1>

        <div class="flex flex-col lg:flex-row lg:justify-between items-center gap-4">
            <a href="{{ route('project-list') }}" class="btn btn-secondary btn-sm w-full lg:w-auto" wire:navigate>
                <x-fas-arrow-left class="size-4" /> List Project
            </a>
        </div>

        <div class="card w-96 bg-base-100 card-md shadow-sm">
            <div class="card-body">
                <h2 class="card-title">Form Tambah Project</h2>
                <form class="flex flex-col gap-4" wire:submit.prevent="save">
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend" for="no_project">No Project</legend>
                        <input type="text" name="no_project" class="input" placeholder="No Project"
                            wire:model.live.debounce="form.no_project" />
                        @error('form.no_project')
                            <p class="label text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend" for="project_name">Nama Project</legend>
                        <input type="text" name="project_name" class="input" placeholder="Nama Project"
                            wire:model.live.debounce="form.project_name" />
                        @error('form.project_name')
                            <p class="label text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend" for="client">Client</legend>
                        <input type="text" name="client" class="input" placeholder="Client"
                            wire:model.live.debounce="form.client" />
                        @error('form.client')
                            <p class="label text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend" for="year">Tahun</legend>
                        <input type="number" name="year" class="input" placeholder="Tahun"
                            min="{{ date('Y') - 3 }}" max="{{ date('Y') }}" value="{{ $form->year }}"
                            wire:model.live.debounce="form.year" />
                        @error('form.year')
                            <p class="label text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend" for="pic">PIC</legend>
                        <select name="pic" class="select" wire:model.live.debounce="form.pic">
                            <option value="">Pilih PIC</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('form.pic')
                            <p class="label text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>
                    <div class="justify-end card-actions">
                        <button type="submit" class="btn btn-primary" @disabled($errors->any())>
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
