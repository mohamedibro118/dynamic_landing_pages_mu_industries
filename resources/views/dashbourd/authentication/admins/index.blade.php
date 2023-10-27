@extends('dashbourd.layouts.dashbourd')

@section('title', 'Admins')


@section('breadcamp')
    @parent
    <li class="breadcrumb-item active">Admins</li>
@endsection



@section('content')

    {{-- heber class --}}
    @inject('hel', 'App\Helber\Helbing')

    <div class="my-5">
        <a href="{{ route('dashbourd.authentication.admins.create') }}" class="btn btn-sm btn-outline-success">Create</a>
        <a href="{{ route('dashbourd.authentication.admins.trash') }}" class="btn btn-sm btn-outline-dark">Trashed</a>
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
                <th>Admin</th>
                <th>email</th>
                <th>UserName</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($admins as $admin)
                <tr>

                    <td>{{ $admin->id }}</td>
                    <td> {{$admin->name}}</td>
                    <th>{{$admin->email}}</th>
                    <th>{{$admin->username}}</th>
                    <td class="d-flex">
                        <a class="btn btn-sm btn-outline-success"
                        href="{{ route('dashbourd.authentication.admins.edit', ['admin' => $admin->id]) }}">Edit</a>
                        <form
                            action="{{ route('dashbourd.authentication.admins.destroy', ['admin' => $admin->id]) }}"
                            method="post" onsubmit="return confirm('Are you sure you want to delete this admin?')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-outline-danger mx-1">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No admin Defenied</td>
                </tr>
            @endforelse


        </tbody>
    </table>
    {{-- <div class="d-flex justify-content-center">{{ $admins->withQueryString()->links() }}</div> --}}
@endsection
