@extends('dashbourd.layouts.dashbourd')

@section('title', 'Create Suber Admin Account')


@section('breadcamp')
    @parent
    <li class="breadcrumb-item active">Create Suber Admin Account</li>
@endsection



@section('content')
<a href="{{ route('dashbourd.dev.suberadmins.index') }}" class="btn btn-sm btn-dark">Back</a>
    <form method="POST" action="{{ route('dashbourd.dev.suberadmins.store') }}">
        @csrf
        @include('dashbourd.suberadmins._form')
    </form>
@endsection
