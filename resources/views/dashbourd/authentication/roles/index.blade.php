@extends('dashbourd.layouts.dashbourd')

@section('title', 'roles')


@section('breadcamp')
    @parent
    <li class="breadcrumb-item active">roles</li>
@endsection



@section('content')

    {{-- heber class --}}
    @inject('hel', 'App\Helber\Helbing')

    <div class="my-5">
        <a href="{{ route('dashbourd.authentication.roles.create') }}" class="btn btn-sm btn-outline-success">Create</a>
    </div>
    {{-- errores --}}
    <div class="row">
        @include('dashbourd.inc.errores')
    </div>
    {{-- alert --}}
    <x-alert class="my-2" />
    {{-- failers --}}
    <div class="row">
        @include('dashbourd.inc.failures')
    </div>

    

    <table class="table">
        <thead>
            <tr style="white-space: nowrap;">
                <th>ID</th>
                <th>name</th>
              
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($roles as $role)
                <tr>

                    <td>{{ $role->id }}</td>
                    <td> {{ 'en' == App::getLocale() ? $role->name_en : $role->name_ar }}</td>
                    <td class="d-flex">
                        <a class="btn btn-sm btn-outline-success"
                        href="{{ route('dashbourd.authentication.roles.edit', ['role' => $role->id]) }}">Edit</a>
                        <form
                            action="{{ route('dashbourd.authentication.roles.destroy', ['role' => $role->id]) }}"
                            method="post" onsubmit="return confirm('Are you sure you want to delete this role?')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-outline-danger mx-1">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No role Defenied</td>
                </tr>
            @endforelse


        </tbody>
    </table>
    {{-- <div class="d-flex justify-content-center">{{ $roles->withQueryString()->links() }}</div> --}}
@endsection
