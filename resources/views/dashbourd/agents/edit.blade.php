@extends('dashbourd.layouts.dashbourd')

@section('title', 'Edit Agent')


@section('breadcamp')
    @parent
    <li class="breadcrumb-item active">Edit Agent</li>
@endsection



@section('content')
    
            <a href="{{ route('dashbourd.dev.agents.index') }}" class="btn btn-sm btn-dark">Back</a>
            <form action="{{ route('dashbourd.dev.agents.update',['agent'=>$agent->id,
            ]) }} " enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
               @include('dashbourd.agents._form')

            </form>

@endsection
