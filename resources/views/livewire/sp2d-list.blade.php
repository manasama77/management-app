<div>
    <div class="container flex flex-col justify-center space-y-4">
        <h1 class="text-2xl font-bold">SP2D dan Nilai Project List</h1>

        <div class="flex flex-col lg:flex-row lg:justify-between items-center gap-4">
            <input type="text" name="keyword" placeholder="Pencarian" class="input w-full lg:w-1/4"
                value="{{ $keyword }}" wire:model.live.debounce="keyword" />
        </div>

        <div class="overflow-x-auto">
            <table class="table border">
                <thead>
                    <tr>
                        <th>No SP2D</th>
                        <th>No SPK</th>
                        <th>Client</th>
                        <th>Nama Project</th>
                        <th class="text-center">File SP2D</th>
                        <th class="text-center">File Nilai Project</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($sp2d_lists->count() == 0)
                        <tr>
                            <td colspan="6" class="text-center">Data tidak ditemukan</td>
                        </tr>
                    @endif
                    @foreach ($sp2d_lists as $sp2d_list)
                        <tr>
                            <td class="text-nowrap">{{ $sp2d_list->no_sp2d }}</td>
                            <td class="text-nowrap">{{ $sp2d_list->project->spk->no_spk }}</td>
                            <td class="text-nowrap">{{ $sp2d_list->project->client }}</td>
                            <td class="text-nowrap">{{ $sp2d_list->project->project_name }}</td>
                            <td>
                                <div class="flex justify-center items-center">
                                    <button type="button" class="btn btn-secondary btn-sm" onclick="comingSoon()">
                                        <x-fas-download class="size-4" />
                                    </button>
                                </div>
                            </td>
                            <td>
                                <div class="flex justify-center items-center">
                                    <button type="button" class="btn btn-secondary btn-sm" onclick="comingSoon()">
                                        <x-fas-download class="size-4" />
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $sp2d_lists->links() }}
    </div>
</div>

@push('scripts')
    <script></script>
@endpush

@script
    <script></script>
@endscript
