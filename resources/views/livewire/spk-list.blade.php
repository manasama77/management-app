<div>
    <div class="container flex flex-col justify-center space-y-4">
        <h1 class="text-2xl font-bold">SPK List</h1>

        <div class="flex flex-col lg:flex-row lg:justify-between items-center gap-4">
            <input type="text" name="keyword" placeholder="Pencarian" class="input w-full lg:w-1/4"
                value="{{ $keyword }}" wire:model.live.debounce="keyword" />
        </div>

        <div class="overflow-x-auto">
            <table class="table border">
                <thead>
                    <tr>
                        <th>No SPK</th>
                        <th>No SPH</th>
                        <th>Client</th>
                        <th>Nama Project</th>
                        <th class="text-center">File SPK</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($spk_lists->count() == 0)
                    <tr>
                        <td colspan="5" class="text-center">Data tidak ditemukan</td>
                    </tr>
                    @endif
                    @foreach ($spk_lists as $spk_list)
                    <tr>
                        <td class="text-nowrap">{{ $spk_list->no_spk }}</td>
                        <td class="text-nowrap">{{ $spk_list->project->sph->no_sph }}</td>
                        <td class="text-nowrap">{{ $spk_list->project->client }}</td>
                        <td class="text-nowrap">{{ $spk_list->project->project_name }}</td>
                        <td>
                            <div class="flex justify-center items-center">
                                <a href="{{ route('download', ['path' => $spk_list->spk_file]) }}"
                                    target="_blank" class="btn btn-secondary btn-sm">
                                    <x-fas-download class="size-4" />
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $spk_lists->links() }}
    </div>
</div>

@push('scripts')
<script></script>
@endpush

@script
<script></script>
@endscript