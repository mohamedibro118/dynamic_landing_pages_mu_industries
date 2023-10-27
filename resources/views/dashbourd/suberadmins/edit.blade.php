@extends('dashbourd.layouts.dashbourd')

@section('title', 'Edit Suber Admin')


@section('breadcamp')
    @parent
    <li class="breadcrumb-item active">Edit Suber Admin</li>
@endsection



@section('content')

    <a href="{{ route('dashbourd.dev.suberadmins.index') }}" class="btn btn-sm btn-dark">Back</a>
    <form action="{{ route('dashbourd.dev.suberadmins.update', ['suberadmin' => $admin->id]) }} "
        enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        @include('dashbourd.suberadmins._form')

    </form>

@endsection
