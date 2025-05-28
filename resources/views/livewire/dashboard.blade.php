<div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        <div class="card bg-primary text-white card-md shadow-sm">
            <div class="card-body">
                <div class="flex justify-between items-center gap-4">
                    <div>
                        <h2 class="card-title font-light">Total Project</h2>
                        <h1 class="text-4xl font-bold">{{ $total_projects }} <small>Project</small></h1>
                    </div>
                    <x-fas-project-diagram class="size-12" />
                </div>
            </div>
        </div>
        <div class="card bg-warning text-white card-md shadow-sm">
            <div class="card-body">
                <div class="flex justify-between items-center gap-4">
                    <div>
                        <h2 class="card-title font-light">Project On Progress</h2>
                        <h1 class="text-4xl font-bold">{{ $total_projects_on_progress }} <small>Project</small></h1>
                    </div>
                    <x-fas-project-diagram class="size-12" />
                </div>
            </div>
        </div>
        <div class="card bg-success text-white card-md shadow-sm">
            <div class="card-body">
                <div class="flex justify-between items-center gap-4">
                    <div>
                        <h2 class="card-title font-light">Project Done</h2>
                        <h1 class="text-4xl font-bold">{{ $total_projects_done }} <small>Project</small></h1>
                    </div>
                    <x-fas-project-diagram class="size-12" />
                </div>
            </div>
        </div>
    </div>
</div>
