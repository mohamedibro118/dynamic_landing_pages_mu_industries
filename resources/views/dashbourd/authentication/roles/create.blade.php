@extends('dashbourd.layouts.dashbourd')

@section('title', 'Create Role')


@section('breadcamp')
    @parent
    <li class="breadcrumb-item active">Create Role</li>
@endsection



@section('content')
    
            <a href="{{ route('dashbourd.authentication.roles.index') }}" class="btn btn-sm btn-dark">Back</a>
            <form action="{{ route('dashbourd.authentication.roles.store') }} " enctype="multipart/form-data" method="POST">
                @csrf
               @include('dashbourd.authentication.roles._form')

            </form>

@endsection
