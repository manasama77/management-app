<table class="table table-pin-rows" wire:ignore>
    <thead>
        <tr>
            <td colspan="2" class="text-center bg-accent text-white font-bold text-lg">
                Project Info
            </td>
        </tr>
    </thead>
    <tbody class="bg-base-200">
        <tr>
            <td>Client</td>
            <td>{{ $project_list->client }}</td>
        </tr>
        <tr>
            <td>No Project</td>
            <td>{{ $project_list->no_project }}</td>
        </tr>
        <tr>
            <td>Nama Project</td>
            <td>{{ $project_list->project_name }}</td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td>{{ $project_list->year }}</td>
        </tr>
        <tr>
            <td>PIC</td>
            <td>{{ $project_list->user_pic->name }}</td>
        </tr>

        <tr>
            <td colspan="2" class="bg-white"></td>
        </tr>
    </tbody>

    @if ($project_list->sph)
        <thead>
            <tr>
                <td colspan="2" class="text-center bg-accent text-white font-bold text-lg">
                    SPH
                </td>
            </tr>
        </thead>
        <tbody class="bg-base-100">
            <tr>
                <td>No SPH</td>
                <td>{{ $project_list->sph->no_sph }}</td>
            </tr>
            <tr>
                <td>File Berita Acara</td>
                <td>
                    <button type="button" class="btn btn-secondary btn-sm" onclick="comingSoon()">
                        <x-fas-download class="size-4" />
                    </button>
                </td>
            </tr>
            <tr>
                <td>File Acara Negosiasi</td>
                <td>
                    <button type="button" class="btn btn-secondary btn-sm" onclick="comingSoon()">
                        <x-fas-download class="size-4" />
                    </button>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="bg-white"></td>
            </tr>
        </tbody>
    @endif

    @if ($project_list->spk)
        <thead>
            <tr>
                <td colspan="2" class="text-center bg-accent text-white font-bold text-lg">
                    SPK
                </td>
            </tr>
        </thead>
        <tbody class="bg-base-100">
            <tr>
                <td>No SPK</td>
                <td>{{ $project_list->spk->no_spk }}</td>
            </tr>
            <tr>
                <td>File SPK</td>
                <td>
                    <button type="button" class="btn btn-secondary btn-sm" onclick="comingSoon()">
                        <x-fas-download class="size-4" />
                    </button>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="bg-white"></td>
            </tr>
        </tbody>
    @endif

    @if ($project_list->kak_rab)
        <thead>
            <tr>
                <td colspan="2" class="text-center bg-accent text-white font-bold text-lg">
                    KAK dan RAB
                </td>
            </tr>
        </thead>
        <tbody class="bg-base-100">
            <tr>
                <td>No KAK</td>
                <td>{{ $project_list->kak_rab->no_kak }}</td>
            </tr>
            <tr>
                <td>File KAK</td>
                <td>
                    <button type="button" class="btn btn-secondary btn-sm" onclick="comingSoon()">
                        <x-fas-download class="size-4" />
                    </button>
                </td>
            </tr>
            <tr>
                <td>No RAB</td>
                <td>{{ $project_list->kak_rab->no_rab }}</td>
            </tr>
            <tr>
                <td>File RAB</td>
                <td>
                    <button type="button" class="btn btn-secondary btn-sm" onclick="comingSoon()">
                        <x-fas-download class="size-4" />
                    </button>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="bg-white"></td>
            </tr>
        </tbody>
    @endif

    @if ($project_list->invoice)
        <thead>
            <tr>
                <td colspan="2" class="text-center bg-accent text-white font-bold text-lg">
                    Invoice
                </td>
            </tr>
        </thead>
        <tbody class="bg-base-100">
            <tr>
                <td>File Invoice</td>
                <td>
                    <button type="button" class="btn btn-secondary btn-sm" onclick="comingSoon()">
                        <x-fas-download class="size-4" />
                    </button>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="bg-white"></td>
            </tr>
        </tbody>
    @endif

    @if ($project_list->bast)
        <thead>
            <tr>
                <td colspan="2" class="text-center bg-accent text-white font-bold text-lg">
                    BAST
                </td>
            </tr>
        </thead>
        <tbody class="bg-base-100">
            <tr>
                <td>File BAST</td>
                <td>
                    <button type="button" class="btn btn-secondary btn-sm" onclick="comingSoon()">
                        <x-fas-download class="size-4" />
                    </button>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="bg-white"></td>
            </tr>
        </tbody>
    @endif

    @if ($project_list->sp2d)
        <thead>
            <tr>
                <td colspan="2" class="text-center bg-accent text-white font-bold text-lg">
                    SP2D
                </td>
            </tr>
        </thead>
        <tbody class="bg-base-100">
            <tr>
                <td>No SP2D</td>
                <td>{{ $project_list->sp2d->no_rab }}</td>
            </tr>
            <tr>
                <td>File SP2D</td>
                <td>
                    <button type="button" class="btn btn-secondary btn-sm" onclick="comingSoon()">
                        <x-fas-download class="size-4" />
                    </button>
                </td>
            </tr>
            <tr>
                <td>File Nilai Project</td>
                <td>
                    <button type="button" class="btn btn-secondary btn-sm" onclick="comingSoon()">
                        <x-fas-download class="size-4" />
                    </button>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="bg-white"></td>
            </tr>
        </tbody>
    @endif
</table>
