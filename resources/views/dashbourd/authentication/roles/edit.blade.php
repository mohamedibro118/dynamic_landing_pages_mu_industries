@extends('dashbourd.layouts.dashbourd')

@section('title', 'Edit Role')


@section('breadcamp')
    @parent
    <li class="breadcrumb-item active">Edit Role</li>
@endsection



@section('content')
    
            <a href="{{ route('dashbourd.authentication.roles.index') }}" class="btn btn-sm btn-dark">Back</a>
            <form action="{{ route('dashbourd.authentication.roles.update',['role'=>$role->id,
            ]) }} " enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
               @include('dashbourd.authentication.roles._form')

            </form>

@endsection
