@extends('dashbourd.layouts.dashbourd')

@section('title', 'Compaigns')


@section('breadcamp')
    @parent
    <li class="breadcrumb-item active">Compaigns Google</li>
@endsection



@section('content')
    <div class="my-3">
        <x-bladewind.button tag="a" href="{{ route('dashbourd.themes.index') }}"
            size="tiny">Create</x-bladewind.button>
    </div>

    <x-alert class="text-center" />
    <h1>Campaigns</h1>
    <ul>
        test
        {{-- @foreach ($campaigns as $campaign)
            <li>{{ $campaign->name }} - {{ $campaign->id }}</li>
        @endforeach --}}
    </ul>
@endsection
