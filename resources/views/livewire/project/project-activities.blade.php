<div class="card py-4">
    <div class="card-body">
        <ul class="list list-timeline">

            @foreach ($activities as $activity)
            <li>

                @if ($activity->operation == 'Assigned' || $activity->operation == 'Unassigned')

                    @if ($activity->operation == 'Assigned')
                    <div class="list-timeline-icon bg-success">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3a12 12 0 0 0 8.5 3a12 12 0 0 1 -8.5 15a12 12 0 0 1 -8.5 -15a12 12 0 0 0 8.5 -3" /></svg>
                    </div>
                    @else
                    <div class="list-timeline-icon bg-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="3" y1="3" x2="21" y2="21" /><path d="M17.669 17.669a12 12 0 0 1 -5.669 3.331a12 12 0 0 1 -8.5 -15c.797 .036 1.589 0 2.366 -.126m3.092 -.912a12 12 0 0 0 3.042 -1.962a12 12 0 0 0 8.5 3a12 12 0 0 1 -1.117 9.379" /></svg>
                    </div>
                    @endif
                    <div class="list-timeline-content">
                        <p class="list-timeline-title font-weight-normal">

                                <strong>{{$activity->entity->name}}</strong><span class="text-muted"><small>({{$activity->entity_class}})</small></span>
                                 {{strtolower($activity->operation)}} to
                                 <strong>{{$activity->affectedEntity->name}}</strong><span class="text-muted"><small>({{$activity->affected_entity_class}})</small></span> by
                                 <strong>{{$activity->user->name}}</strong><span class="text-muted"><small>(User)</small></span>

                        </p>
                        <p class="text-muted">{{$activity->created_at->format('d M, Y h:i A')}}</p>
                    </div>

                @else

                    @if ($activity->operation == 'Created')
                    <div class="list-timeline-icon bg-success">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                    </div>
                    @elseif ($activity->operation == 'Updaated')
                    <div class="list-timeline-icon bg-info">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="5" cy="18" r="2" /><circle cx="19" cy="6" r="2" /><path d="M19 8v5a5 5 0 0 1 -5 5h-3l3 -3m0 6l-3 -3" /><path d="M5 16v-5a5 5 0 0 1 5 -5h3l-3 -3m0 6l3 -3" /></svg>
                    </div>

                    @elseif ($activity->operation == 'Deleted')
                    <div class="list-timeline-icon bg-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                    </div>
                    @endif
                    <div class="list-timeline-content">
                        <p class="list-timeline-title font-weight-normal">{{$activity->entity_class}} <strong>{{strtolower($activity->operation)}} by <strong>{{$activity->user->name}}</strong></p>
                        <p class="text-muted">{{$activity->created_at->diffForHumans()}}</p>
                    </div>

                @endif
              </li>
            @endforeach
          </ul>

    </div>
</div>
