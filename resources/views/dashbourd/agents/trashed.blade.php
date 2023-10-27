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
        <a href="{{ route('dashbourd.dev.agents.index') }}" class="btn btn-sm btn-dark">Back</a>
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
                <th>Agent</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($agents as $agent)
                <tr>

                    <td>{{ $agent->id }}</td>
                    <td> {{ 'en' == App::getLocale() ? $agent->name_en : $agent->name_ar }}</td>
                    
                    <td class="d-flex">
                        
                        <form
                            action="{{ route('dashbourd.dev.agents.restore', ['agent' => $agent->id]) }}"
                            method="post" onsubmit="return confirm('Are you sure you want to delete this agent?')">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-sm btn-outline-danger mx-1">Restore</button>
                        </form>
                        <form
                            action="{{ route('dashbourd.dev.agents.force-delete', ['agent' => $agent->id]) }}"
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
