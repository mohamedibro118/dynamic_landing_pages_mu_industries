@extends('dashbourd.layouts.dashbourd')

@section('title', 'All Themes')


@section('breadcamp')
    @parent
    <li class="breadcrumb-item active">All Themes</li>
@endsection

@section('content')
    <div class="row" >
        @foreach ($themes as $theme)
            <div class="col-md-4">
                <div class="card" >
                    <img src="{{ asset($theme->img_url) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $theme->title }}</h5>
                        <p class="card-text"></p>
                        <x-bladewind.button tag="a" href="{{ asset($theme->index_url) }}" size="tiny">choose</x-bladewind.button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


@endsection
