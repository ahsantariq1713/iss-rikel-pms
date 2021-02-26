<div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">
  @foreach ($users as $user)
  <label class="form-selectgroup-item flex-fill">
    <input type="checkbox"
        class="form-selectgroup-input" wire:click='toggle(({{$user->id}}))' {{in_array($user->id,$team) ? 'checked' : ''}}>
    <div class="form-selectgroup-label d-flex align-items-center p-3">
        <div class="me-3">
            <span class="form-selectgroup-check"></span>
        </div>
        <div class="form-selectgroup-label-content d-flex align-items-center">
            <span class="avatar me-3">{{$user->imageText}}</span>
            <div>
                <div class="font-weight-medium">{{$user->name}}</div>
                <div class="text-muted">{{$user->email}}</div>  
            </div>
        </div>
    </div>
    </label>
    @endforeach
</div>
