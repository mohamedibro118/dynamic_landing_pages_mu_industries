@extends('dashbourd.layouts.dashbourd')

@section('title', 'Theme1')


@section('breadcamp')
    @parent
    <li class="breadcrumb-item active">Theme1</li>
@endsection

@section('content')

    <div class="row" style="display:flex; gap: 5px;margin-bottom: 10px;margin-left: 2px;flex-direction: row;flex-wrap: nowrap">
        <x-bladewind.button tag="a" href="{{ route('dashbourd.themes.theme1.create') }}" size="tiny" style="width: auto">create</x-bladewind.button>
        <x-bladewind.button tag="a" href="{{ route('dashbourd.themes.index') }}" size="tiny" style="width: auto">All Themes</x-bladewind.button>
        <x-bladewind.button tag="a" href="{{ route('theme1.view') }}" size="tiny" style="width: auto">view</x-bladewind.button>
    </div>
    <iframe src="{{route('theme1.view')}}" style="width: 100%;height: 100vh;"></iframe>

    


@endsection
