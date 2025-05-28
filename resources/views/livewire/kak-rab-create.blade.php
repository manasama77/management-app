<div>
    <div class="container flex flex-col justify-center space-y-4">
        <h1 class="text-2xl font-bold">Tambah KAK dan RAB</h1>

        <div class="flex flex-col lg:flex-row lg:justify-between items-center gap-4">
            <a href="{{ route('project-list') }}" class="btn btn-secondary btn-sm w-full lg:w-auto" wire:navigate>
                <x-fas-arrow-left class="size-4" /> List Project
            </a>
        </div>

        <div class="flex gap-4 flex-wrap">
            <div class="w-full lg:max-w-[30%]">
                <div class="card bg-base-100 card-md shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title">Project Info</h2>
                        <div class="overflow-x-auto">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Nama Project</td>
                                        <td>{{ $project->project_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Client</td>
                                        <td>{{ $project->client }}</td>
                                    </tr>
                                    <tr>
                                        <td>No SPK</td>
                                        <td>{{ $project->spk->no_spk }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="card bg-base-100 card-md shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title">Form Tambah KAK dan RAB</h2>
                        <form class="flex flex-col gap-4" wire:submit.prevent="save">
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend" for="no_kak">No KAK</legend>
                                <input type="text" id="no_kak" name="no_kak" class="input" placeholder="No SPH"
                                    wire:model.live.debounce="no_kak" />
                                @error('no_kak')
                                <p class="label text-error">{{ $message }}</p>
                                @enderror
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend" for="kak_file">File KAK</legend>
                                <input type="file" id="kak_file" name="kak_file" class="file-input" wire:model="kak_file" />
                                <label class="label">Max size 5MB</label>
                                @error('kak_file')
                                <p class="label text-error">{{ $message }}</p>
                                @enderror
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend" for="no_rab">No RAB</legend>
                                <input type="text" id="no_rab" name="no_rab" class="input" placeholder="No SPH"
                                    wire:model.live.debounce="no_rab" />
                                @error('no_rab')
                                <p class="label text-error">{{ $message }}</p>
                                @enderror
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend" for="rab_file">File RAB</legend>
                                <input type="file" id="rab_file" name="rab_file" class="file-input" wire:model="rab_file" />
                                <label class="label">Max size 5MB</label>
                                @error('rab_file')
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

    </div>
</div>

@push('scripts')
<script></script>
@endpush