

<div>
    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
    @if (session('success'))
      <div {{$attributes->merge(['class'=>'alert  alert-success alert-dismissible'.$class])}} role="alert">
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @elseif(session('info'))
    <div {{$attributes->merge(['class'=>'alert  alert-info alert-dismissible'])}} role="alert">
      {{session('info')}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

</div>
