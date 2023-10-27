@extends('dashbourd.layouts.dashbourd')

@section('title', 'Create Agent')


@section('breadcamp')
    @parent
    <li class="breadcrumb-item active">Create Agent</li>
@endsection



@section('content')
    
            <a href="{{ route('dashbourd.dev.agents.index') }}" class="btn btn-sm btn-dark">Back</a>
            <form action="{{ route('dashbourd.dev.agents.store') }} " enctype="multipart/form-data" method="POST">
                @csrf
               @include('dashbourd.agents._form')

            </form>

@endsection
