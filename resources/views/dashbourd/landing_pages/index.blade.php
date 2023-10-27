@extends('dashbourd.layouts.dashbourd')

@section('title', 'Landing Pages')


@section('breadcamp')
    @parent
    <li class="breadcrumb-item active">Landing Pages</li>
@endsection



@section('content')
    <div class="my-3">
        <x-bladewind.button tag="a" href="{{ route('dashbourd.themes.index') }}"
            size="tiny">Create</x-bladewind.button>
    </div>

    <x-alert class="text-center" />
    <div class="row my-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Theme</th>
                    <th scope="col" colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($lpages as $page)
                    <tr>
                        <th scope="row">{{ $page->id }}</th>
                        <td>{{ $page->title }}</td>
                        <td>{{ $page->theme->title }}</td>
                        {{-- 'company_name' =>  $page->agent?$page->agent->slug_en:'wzgate', --}}
                        <td class="d-flex">
                            <x-bladewind.button icon="swatch" tag="a" href="{{ route('landing_page', ['company_name' => $page->agent ? $page->agent->slug_en : 'wzgate', 'slug' => $page->slug]) }}" size="tiny">View</x-bladewind.button>
                             
                            <x-bladewind.button style="margin: 0px 5px" icon="pencil" tag="a"
                                href="{{ route('dashbourd.themes.' . $page->theme->title . '.edit', ['id' => $page->id]) }}"
                                size="tiny" >Edit</x-bladewind.button>
                            <form action="{{ route('dashbourd.landing_pages.destroy', ['id' => $page->id]) }}"
                                method="post" onsubmit="return confirm('Are you sure you want to delete this post?')">
                                @csrf
                                @method('delete')
                                <x-bladewind.button icon="trash" color="red" can_submit="true" size="tiny" >Delete</x-bladewind.button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th scope="row" colspan="4">No Data</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
