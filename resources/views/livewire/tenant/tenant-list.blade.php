@include('partials.livewire-components.table')
<livewire:tenant.tenant-create :projectId='$projectId' />
<livewire:tenant.tenant-edit />
<livewire:tenant.import-tenant :projectId='$projectId' />
<livewire:tenant.tenant-view />
