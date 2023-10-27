@extends('dashbourd.layouts.dashbourd')

@section('title', 'Users')


@section('breadcamp')
    @parent
    <li class="breadcrumb-item active">{{__("messages.Users")}}</li>
@endsection



@section('content')

    {{-- heber class --}}
    @inject('hel', 'App\Helber\Helbing')

    

    {{-- search --}}
    <div class="row" style="overflow-x: auto">
    <table class="table">
        <thead>
            <tr style="white-space: nowrap;">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody  style="white-space: nowrap">
            @forelse ($users as $user)
                <tr>

                    <td>{{ $user->id }}</td>
                    <td>{{$user->name}}</td>
                    <td>{{ $user->email }}</td>
                    
                   
                    <td class="d-flex">
                       
                        <form
                            action="{{ route('dashbourd.authentication.users.destroy', ['user' => $user->id]) }}"
                            method="post" onsubmit="return confirm('Are you sure you want to delete this user?')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-outline-danger mx-1">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No user Defenied</td>
                </tr>
            @endforelse


        </tbody>
    </table></div>
    <div class="d-flex justify-content-center">{{ $users->withQueryString()->links() }}</div>
@endsection
