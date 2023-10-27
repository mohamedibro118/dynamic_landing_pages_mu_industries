@extends('dashbourd.layouts.dashbourd')

@section('title', 'Theme1')


@section('breadcamp')
    @parent
    <li class="breadcrumb-item active">theme6</li>
@endsection

@section('content')

    <div class="row" style="gap: 5px;margin-bottom: 10px;margin-left: 2px;flex-direction: row">
        <x-bladewind.button tag="a" href="{{ route('dashbourd.themes.theme6.create') }}" style="width: auto" size="tiny">create</x-bladewind.button>
        <x-bladewind.button tag="a" href="{{ route('dashbourd.themes.index') }}" style="width: auto" size="tiny">All Themes</x-bladewind.button>
        <x-bladewind.button tag="a" href="{{ route('theme6.view') }}" style="width: auto" size="tiny">view</x-bladewind.button>
    </div>
    <iframe src="{{route('theme6.view')}}" style="width: 100%;height: 100vh;"></iframe>

    


@endsection
