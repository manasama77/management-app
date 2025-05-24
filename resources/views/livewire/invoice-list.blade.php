<div>
    <div class="container flex flex-col justify-center space-y-4">
        <h1 class="text-2xl font-bold">Invoice List</h1>

        <div class="flex flex-col lg:flex-row lg:justify-between items-center gap-4">
            <input type="text" name="keyword" placeholder="Pencarian" class="input w-full lg:w-1/4"
                value="{{ $keyword }}" wire:model.live.debounce="keyword" />
        </div>

        <div class="overflow-x-auto">
            <table class="table border">
                <thead>
                    <tr>
                        <th>No SPK</th>
                        <th>Client</th>
                        <th>Nama Project</th>
                        <th class="text-center">File Invoice</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($invoice_lists->count() == 0)
                        <tr>
                            <td colspan="4" class="text-center">Data tidak ditemukan</td>
                        </tr>
                    @endif
                    @foreach ($invoice_lists as $invoice_list)
                        <tr>
                            <td class="text-nowrap">{{ $invoice_list->project->spk->no_spk }}</td>
                            <td class="text-nowrap">{{ $invoice_list->project->client }}</td>
                            <td class="text-nowrap">{{ $invoice_list->project->project_name }}</td>
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

        {{ $invoice_lists->links() }}
    </div>
</div>

@push('scripts')
    <script></script>
@endpush

@script
    <script></script>
@endscript
