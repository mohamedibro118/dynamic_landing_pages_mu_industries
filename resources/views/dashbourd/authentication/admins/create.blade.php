@extends('dashbourd.layouts.dashbourd')

@section('title', 'Create Admin Account')


@section('breadcamp')
    @parent
    <li class="breadcrumb-item active">Create Admin Account</li>
@endsection



@section('content')
<a href="{{ route('dashbourd.dev.agents.index') }}" class="btn btn-sm btn-dark">Back</a>
    <form method="POST" action="{{ route('dashbourd.authentication.admins.store') }}">
        @csrf
        @include('dashbourd.authentication.admins._form')
    </form>
@endsection
