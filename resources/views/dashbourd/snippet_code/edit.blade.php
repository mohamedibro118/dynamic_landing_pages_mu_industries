@extends('dashbourd.layouts.dashbourd')

@section('title', 'Edit Snippets')


@section('breadcamp')
    @parent
    <li class="breadcrumb-item active">Edit Snippets</li>
@endsection

@section('content')
    {{-- alert --}}
    <x-alert class="my-2" />
    <form action="{{ route('dashbourd.code_snippets.update') }}" method="POST">
        @csrf
        @include('dashbourd.snippet_code._form')
        <div class="row mt-3" style="justify-content: center">
            <div class="col-4 py-2 text-center">
                <x-bladewind.button size="tiny" can_submit="true">Update</x-bladewind.button>
            </div>

        </div>
    </form>
@endsection
