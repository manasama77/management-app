<div>
    <div class="container flex flex-col justify-center space-y-4">
        <h1 class="text-2xl font-bold">Project List</h1>

        <div class="flex flex-col lg:flex-row lg:justify-between items-center gap-4">
            <input type="text" name="keyword" placeholder="Pencarian" class="input w-full lg:w-1/4"
                value="{{ $keyword }}" wire:model.live.debounce="keyword" />
            <a href="{{ route('project-list.create') }}" class="btn btn-primary btn-sm w-full lg:w-auto" wire:navigate>
                <x-fas-plus class="size-4" /> Tambah Project
            </a>
        </div>

        @if (session()->has('success'))
        <div class="alert alert-success shadow-lg">
            <div class="flex items-center gap-2">
                <x-fas-check class="size-4" />
                <span class="font-bold">{{ session('success') }}</span>
            </div>
        </div>
        @endif

        @if (session()->has('error'))
        <div class="alert alert-error shadow-lg">
            <div class="flex items-center gap-2">
                <x-fas-times class="size-4" />
                <span class="font-bold">{{ session('error') }}</span>
            </div>
        </div>
        @endif

        <div class="overflow-x-auto min-h-[500px]">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th>
                            <div class="flex justify-center">
                                <x-fas-cog class="size-4" />
                            </div>
                        </th>
                        <th>No Project</th>
                        <th>Nama Project</th>
                        <th>Client</th>
                        <th>Year</th>
                        <th>PIC</th>
                        <th>Progres</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($project_lists->count() == 0)
                    <tr>
                        <td colspan="7" class="text-center">Data tidak ditemukan</td>
                    </tr>
                    @endif
                    @foreach ($project_lists as $project_list)
                    <tr>
                        <td class="flex justify-center">
                            <div class="dropdown dropdown-hover">
                                <div role="button" class="btn btn-info m-1">
                                    <x-fas-ellipsis class="size-4" />
                                </div>
                                <ul
                                    class="dropdown-content menu bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm gap-1">
                                    <li>
                                        <a href="{{ route('project-list.update', $project_list) }}"
                                            class="btn btn-accent btn-sm text-white" title="Edit" wire:navigate>
                                            <x-fas-pen class="size-4" /> Edit
                                        </a>
                                    </li>
                                    <li>
                                        <button type="button" class="btn btn-error btn-sm text-white"
                                            title="Delete"
                                            wire:click="$dispatch('delete-project', { id: {{ $project_list->id }} })"
                                            wire:confirm="Apakah kamu yakin akan menghapus project ini?">
                                            <x-fas-trash class="size-4" /> Delete
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" class="btn bg-black btn-sm text-white" title="Detail"
                                            wire:click="$dispatch('show-detail-project', { id: {{ $project_list->id }} })">
                                            <x-fas-eye class="size-4" /> Detail
                                        </button>
                                    </li>
                                    <li>
                                        @if ($project_list->sph === null)
                                        <a href="{{ route('create-sph', $project_list) }}"
                                            class="btn bg-secondary btn-sm text-white" title="Tambah SPH"
                                            wire:navigate>
                                            <x-fas-file-circle-plus class="size-4" /> Tambah SPH
                                        </a>
                                        @endif

                                        @if ($project_list->sph !== null && $project_list->spk === null)
                                        <a href="{{ route('create-spk', $project_list) }}"
                                            class="btn bg-secondary btn-sm text-white" title="Tambah SPK"
                                            wire:navigate>
                                            <x-fas-file-circle-plus class="size-4" /> Tambah SPK
                                        </a>
                                        @endif

                                        @if ($project_list->sph !== null && $project_list->spk !== null && $project_list->kak_rab === null)
                                        <a href="{{ route('create-kak-rab', $project_list) }}"
                                            class="btn bg-secondary btn-sm text-white" title="Tambah KAK RAB"
                                            wire:navigate>
                                            <x-fas-file-circle-plus class="size-4" /> Tambah KAK RAB
                                        </a>
                                        @endif

                                        @if (
                                        $project_list->sph !== null &&
                                        $project_list->spk !== null &&
                                        $project_list->kak_rab !== null &&
                                        $project_list->invoice === null)
                                        <a href="{{ route('create-invoice', $project_list) }}"
                                            class="btn bg-secondary btn-sm text-white" title="Tambah Invoice"
                                            wire:navigate>
                                            <x-fas-file-circle-plus class="size-4" /> Tambah Invoice
                                        </a>
                                        @endif

                                        @if (
                                        $project_list->sph !== null &&
                                        $project_list->spk !== null &&
                                        $project_list->kak_rab !== null &&
                                        $project_list->invoice !== null &&
                                        $project_list->bast === null)
                                        <a href="{{ route('create-bast', $project_list) }}"
                                            class="btn bg-secondary btn-sm text-white" title="Tambah BAST"
                                            wire:navigate>
                                            <x-fas-file-circle-plus class="size-4" /> Tambah BAST
                                        </a>
                                        @endif

                                        @if (
                                        $project_list->sph !== null &&
                                        $project_list->spk !== null &&
                                        $project_list->kak_rab !== null &&
                                        $project_list->invoice !== null &&
                                        $project_list->bast !== null &&
                                        $project_list->sp2d === null)
                                        <a href="{{ route('create-sp2d', $project_list) }}"
                                            class="btn bg-secondary btn-sm text-white" title="Tambah SP2D"
                                            wire:navigate>
                                            <x-fas-file-circle-plus class="size-4" /> Tambah SP2D
                                        </a>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </td>
                        <td class="text-nowrap">{{ $project_list->no_project }}</td>
                        <td class="text-nowrap">{{ $project_list->project_name }}</td>
                        <td class="text-nowrap">{{ $project_list->client }}</td>
                        <td class="text-nowrap">{{ $project_list->year }}</td>
                        <td class="text-nowrap">{{ $project_list->user_pic->name }}</td>
                        <td>
                            <div class="flex items-center flex-col gap-1">
                                <progress class="progress w-full" value="{{ $project_list->progress }}"
                                    max="100"></progress>
                                <p>{{ $project_list->progress }}%</p>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $project_lists->links() }}
    </div>
</div>

@push('modals')
<dialog id="modal_detail" class="modal">
    <div class="modal-box">
        <h3 class="text-lg font-bold" id="v_title"></h3>
        <hr class="mb-5" />

        <div class="flex flex-col justify-center space-y-5">
            <div>
                <div class="h-96 overflow-x-auto" id="v_detail"></div>
                <hr />
            </div>

        </div>

        <div class="modal-action">
            <form method="dialog">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
            </form>
        </div>
    </div>
</dialog>
@endpush

@push('scripts')
<script>
    const divAlert = document.querySelector('.alert');
    if (divAlert) {
        setTimeout(() => {
            divAlert.remove();
        }, 5000);
    }
</script>
@endpush

@script
<script>
    const modalTitle = document.querySelector('#v_title');
    const modalDetail = document.querySelector('#modal_detail');

    $wire.on('show-modal', ({
        title,
        detail
    }) => {
        modalTitle.innerHTML = title;
        modalDetail.querySelector('#v_detail').innerHTML = detail;
        modalDetail.showModal();
    })
</script>
@endscript
