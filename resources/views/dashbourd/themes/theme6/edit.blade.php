@extends('dashbourd.layouts.dashbourd')

@section('title', 'Update Content')


@section('breadcamp')
    @parent
    <li class="breadcrumb-item active">Updtae Content</li>
@endsection

@section('content')
<x-bladewind.button tag="a" href="{{ route('dashbourd.landing_pages.index') }}" size="tiny">Back</x-bladewind.button>
    <form action="{{route('dashbourd.themes.theme6.update',['id'=>$pageId]) }}" method="POST" enctype="multipart/form-data">
        @csrf
         @include('dashbourd.themes.theme6._form')
         <div class="row mt-3" style="justify-content: center">
            <div class="col-4 py-2 text-center" >
                <x-bladewind.button  id="updateButton"  size="tiny">save</x-bladewind.button>
            </div>

        </div>
    </form>
@endsection
@push('spscripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let previewWindow = null; // Reference to the preview window

          
            document.getElementById('updateButton').addEventListener('click', function() {

                // Find the closest form element to the clicked button
                const closestForm = this.closest('form');

                if (closestForm) {
                    // Collect form data using FormData
                    const formData = new FormData(closestForm);

                    // Send form data to server using AJAX
                    fetch("{{ route('dashbourd.themes.theme6.update',['id'=>$pageId]) }}", {
                            method: "POST",
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            // Open a new preview window in a new tab with returned preview URL
                            window.open(data.lpagesindexUrl);
                            // console.log(data);
                        })
                        .catch(error => console.log("Error:", error));
                }

            });

            // ...
        });
    </script>
@endpush

