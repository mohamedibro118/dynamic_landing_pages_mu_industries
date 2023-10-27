@if ($type == 'Whats')
<a target="_blank" @if ($stylevara) style="{{ $stylevara }}" @endif
    href="https://wa.me/2{{ $project ? $project->whats : '' }}?text=I am interested in {{ $project->name_en }} prices"
    class="{{ $classvar }} my-1" ><i class="bi bi-whatsapp {{ $iconstyle }} "
        @if ($stylevari) style="{{ $stylevari }}" @endif></i></a>
@elseif($type == 'Contact-Form')
<a @if ($stylevara) style="{{ $stylevara }}" @endif class="{{ $classvar }} my-1"
    data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-person-lines-fill {{ $iconstyle }}"
        @if ($stylevari) style="{{ $stylevari }}" @endif></i></a>
@elseif($type == 'Messenger')
<a target="_blank" @if ($stylevara) style="{{ $stylevara }}" @endif
    href="https://m.me/{{ $project ? $project->messanger : '' }}?text=I am interested in {{ $project->name_en }} prices"
    class="{{ $classvar }} my-1"><i class="bi bi-messenger {{ $iconstyle }}"
        @if ($stylevari) style="{{ $stylevari }}" @endif></i></a>
@else
<a target="_blank" @if ($stylevara) style="{{ $stylevara }}" @endif
    href="tel:002{{ $project ? $project->phone1 : '' }}" class="{{ $classvar }} my-1"><i
        class="bi bi-telephone {{ $iconstyle }}"
        @if ($stylevari) style="{{ $stylevari }}" @endif></i></a>
@endif