@extends('dashbourd.layouts.dashbourd')

@section('title', 'Edit Admin')


@section('breadcamp')
    @parent
    <li class="breadcrumb-item active">Edit Admin</li>
@endsection



@section('content')

    <a href="{{ route('dashbourd.authentication.admins.index') }}" class="btn btn-sm btn-dark">Back</a>
    <form action="{{ route('dashbourd.authentication.admins.update', ['admin' => $admin->id]) }} "
        enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        @include('dashbourd.authentication.admins._form')

    </form>

@endsection
