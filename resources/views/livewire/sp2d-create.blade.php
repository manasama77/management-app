<div>
    <div class="container flex flex-col justify-center space-y-4">
        <h1 class="text-2xl font-bold">Tambah SP2D dan Nilai Project</h1>

        <div class="flex flex-col lg:flex-row lg:justify-between items-center gap-4">
            <a href="{{ route('project-list') }}" class="btn btn-secondary btn-sm w-full lg:w-auto" wire:navigate>
                <x-fas-arrow-left class="size-4" /> List Project
            </a>
        </div>

        <div class="card w-96 bg-base-100 card-md shadow-sm">
            <div class="card-body">
                <h2 class="card-title">Form Tambah SP2D dan Nilai Project</h2>
                <form class="flex flex-col gap-4" onsubmit="event.preventDefault(); comingSoon()">
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Nama Project</legend>
                        <input type="text" class="input" placeholder="Nama Project" value="{{ $project_name }}"
                            readonly />
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Client</legend>
                        <input type="text" class="input" placeholder="Client" value="{{ $client }}"
                            readonly />
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">No SPK</legend>
                        <input type="text" class="input" placeholder="Client" value="{{ $no_spk }}"
                            readonly />
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend" for="no_sp2d">No SP2D</legend>
                        <input type="text" id="no_sp2d" name="no_sp2d" class="input" placeholder="No SPH"
                            wire:model.live.debounce="no_sp2d" />
                        @error('no_sp2d')
                            <p class="label text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend" for="sp2d_file">File SP2D</legend>
                        <input type="file" id="sp2d_file" name="sp2d_file" class="file-input"
                            wire:model="sp2d_file" />
                        <label class="label">Max size 5MB</label>
                        @error('sp2d_file')
                            <p class="label text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend" for="nilai_project_file">File Nilai Project</legend>
                        <input type="file" id="nilai_project_file" name="nilai_project_file" class="file-input"
                            wire:model="nilai_project_file" />
                        <label class="label">Max size 5MB</label>
                        @error('nilai_project_file')
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
