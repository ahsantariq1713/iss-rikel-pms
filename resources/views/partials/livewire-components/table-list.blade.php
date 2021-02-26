<div class="list-group list-group-flush list-group-hoverable">
    @foreach ($entities as $entity)
        <div class="list-group-item">
            <div class="row align-items-center">
                @if ($listColumns[0]['type'] == 'imageText')
                    <div class="col-auto">
                        <span class="avatar"> {{ $entity[$listColumns[0]['key']] }}</span>
                    </div>
                    <div class="col text-truncate">
                        <a href="#" class="text-body d-block">{{ $entity[$listColumns[1]['key']] }}</a>
                        @if (count($listColumns) >= 3)
                        <small
                        class="d-block text-muted text-truncate mt-n1"> {{ $entity[$listColumns[2]['key']] }}</small>
                        @endif
                    </div>
                @else
                <div class="col text-truncate">
                    <a href="#" class="text-body d-block">{{ $entity[$listColumns[0]['key']] }}</a>
                    @if (count($listColumns) >= 2)                    <small
                    class="d-block text-muted text-truncate mt-n1"> {{ $entity[$listColumns[1]['key']] }}</small>
                    @endif
                </div>
                @endif
                <div class="col-auto">
                    @include('partials.livewire-components.action-buttons')
                </div>
            </div>
        </div>
    @endforeach
</div>
