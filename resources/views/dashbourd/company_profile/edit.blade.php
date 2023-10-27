@extends('dashbourd.layouts.dashbourd')

@section('title', 'Edit Company Profile ( ' . $agent->name_en . ' )')


@section('breadcamp')
    @parent
    <li class="breadcrumb-item active">Edit Company Profile</li>
@endsection

{{-- alert --}}


@section('content')
    <x-alert class="my-2" />

    <form action="{{ route('dashbourd.companyprofiles.update', ['agent' => $agent->id]) }} " enctype="multipart/form-data"
        method="POST">
        @csrf
        @method('PUT')
        @include('dashbourd.company_profile._form')
        <div class="row mt-3" style="justify-content: center">
            <div class="col-4 py-2 text-center">
                <x-bladewind.button can_submit="true" size="tiny">save</x-bladewind.button>
            </div>

        </div>
    </form>

@endsection
@push('spscripts')
    <script src="{{ asset('dist/js/cusjs.js') }}"></script>
@endpush
