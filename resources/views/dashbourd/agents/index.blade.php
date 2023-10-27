@extends('dashbourd.layouts.dashbourd')

@section('title', 'agents')


@section('breadcamp')
    @parent
    <li class="breadcrumb-item active">agents</li>
@endsection



@section('content')

    {{-- heber class --}}
    @inject('hel', 'App\Helber\Helbing')

    <div class="my-5">
        <a href="{{ route('dashbourd.dev.agents.create') }}" class="btn btn-sm btn-outline-success">Create</a>
        <a href="{{ route('dashbourd.dev.agents.trash') }}" class="btn btn-sm btn-outline-dark">Trashed</a>
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
    <form class="d-flex justify-content-between mb-2 " method="GET" action="{{ URL::current() }}">
        <x-form-input label='' class="form-control mx-2" placeholder="Agents Name ...." :value="request('name')" name='name' />
        <button class="btn btn-dark mx-2" type="submit">Fillter</button>
    </form>

    <table class="table">
        <thead>
            <tr style="white-space: nowrap;">
                <th>ID</th>
                <th>Agent</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($agents as $agent)
                <tr>

                    <td>{{ $agent->id }}</td>
                    <td><a href="{{ route('dashbourd.companyprofiles.edit', ['id'=> $agent->id] ) }}">{{ 'en' == App::getLocale() ? $agent->name_en : $agent->name_ar }}</a> </td>
                    <th>{{$agent->status}}</th>
                    <td class="d-flex">
                        <a class="btn btn-sm btn-outline-success"
                        href="{{ route('dashbourd.dev.agents.edit', ['agent' => $agent->id]) }}">Edit</a>
                        <form
                            action="{{ route('dashbourd.dev.agents.destroy', ['agent' => $agent->id]) }}"
                            method="post" onsubmit="return confirm('Are you sure you want to delete this agent?')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-outline-danger mx-1">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No agent Defenied</td>
                </tr>
            @endforelse


        </tbody>
    </table>
    <div class="d-flex justify-content-center">{{ $agents->withQueryString()->links() }}</div>
@endsection
