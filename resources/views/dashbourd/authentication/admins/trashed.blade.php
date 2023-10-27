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
        <a href="{{ route('dashbourd.authentication.admins.index') }}" class="btn btn-sm btn-dark">Back</a>
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

    {{-- search --}}
    {{-- <form class="d-flex justify-content-between mb-2 " method="GET" action="{{ URL::current() }}">
        <x-form-input label='' class="form-control mx-2" placeholder="Agents Name ...." :value="request('name')" name='name' />
        <button class="btn btn-dark mx-2" type="submit">Fillter</button>
    </form> --}}

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
                        
                        <form
                            action="{{ route('dashbourd.authentication.admins.restore', ['admin' => $admin->id]) }}"
                            method="post" onsubmit="return confirm('Are you sure you want to delete this admin?')">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-sm btn-outline-danger mx-1">Restore</button>
                        </form>
                        <form
                            action="{{ route('dashbourd.authentication.admins.force-delete', ['admin' => $admin->id]) }}"
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
