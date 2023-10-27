@extends('dashbourd.layouts.dashbourd')

@section('title', 'Leads')


@section('breadcamp')
    @parent
    <li class="breadcrumb-item active">{{ __('messages.Leads') }}</li>
@endsection



@section('content')

    {{-- heber class --}}
    @inject('hel', 'App\Helber\Helbing')



    {{-- search --}}
    <div class="row mb-3">
        <form class="form-inline" method="GET" action="{{ URL::current() }}">
            <div class="col-md-4 d-flex mt-1">
                <x-form-input label='From ' id="my-from-date" class="form-control " type="date" placeholder=""
                    :value="request('min_time')" name='min_time' />

            </div>
            <div class="col-md-4 d-flex mt-1">

                <x-form-input label='To ' id="my-to-date" class="form-control " type="date" placeholder="To:Max Time"
                    :value="request('max_time')" name='max_time' />
            </div>
            <div class="col-md-4 mt-1 d-flex justify-content-center">
                <button class="btn btn-dark " type="submit">Fillter</button>
            </div>
        </form>
    </div>
    <div class="row" style="overflow-x: auto">
        <table class="table">
            <thead>
                <tr style="white-space: nowrap;">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Source Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Action</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody style="white-space: nowrap">
                @forelse ($leads as $lead)
                    <tr>

                        <td>{{ $lead->id }}</td>
                        <td>{{ $lead->name }}</td>
                        <td>{{ $lead->phone }}</td>
                        <td>{{$lead->source}}</td>
                        <td>{{ $lead->email }}</td>
                        <td>{{ $lead->message }}</td>

                        <td class="d-flex">

                            <form action="{{ route('dashbourd.leads.destroy', ['lead' => $lead->id]) }}" method="post"
                                onsubmit="return confirm('Are you sure you want to delete this lead?')">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-outline-danger mx-1">Delete</button>
                            </form>
                        </td>
                        <td>
                            {{ $lead->created_at }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">No lead Defenied</td>
                    </tr>
                @endforelse


            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">{{ $leads->withQueryString()->links() }}</div>
@endsection
