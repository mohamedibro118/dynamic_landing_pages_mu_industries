@props([
    'theme',
    'page',
    'descriptions',
    'backgrounds',
    'logos',
    'units',
    'features',
    'photos',
    'gallary',
    'ctas',
    'colors',
    'sections',
    'details',
    'unitTypes',
])
@extends('dashbourd.layouts.dashbourd')

@section('title', 'Add Content')

@section('breadcamp')
    @parent
    <li class="breadcrumb-item active">Add Content</li>
@endsection

@section('content')
    <div class="my-3">
        <x-bladewind.button tag="a" href="{{ route('dashbourd.themes.' . $theme . '.index') }}"
            size="tiny">Back</x-bladewind.button>
        <div id="error-messages" class="alert alert-danger my-2" style="display: none;"></div>


        <form action="{{ route('dashbourd.themes.' . $theme . '.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('dashbourd.themes.' . $theme . '._form')
            <div class="row mt-3" style="justify-content: center">
                <div class="col-4 py-2 text-center">
                    <button id="createButton" type="button" class="btn btn-primary" size="tiny">Save</button>
                   
                    <div id="loadingIndicator" style="display: none;">
                        Loading...
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('spscripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const createButton = document.getElementById('createButton');
            const loadingIndicator = document.getElementById('loading');
            const errorMessages = document.getElementById('error-messages');
  
            createButton.addEventListener('click', function() {
                const closestForm = this.closest('form');

                if (closestForm) {
                    const formData = new FormData(closestForm);
                    const pageTitleValue = formData.get('page_title').trim();

                    if (pageTitleValue === '') {
                        alert('Page Title is required');
                        return;
                    }

                    // Show the loading indicator
                    loadingIndicator.style.display = 'block';

                    const routeUrl = `{{ route('dashbourd.themes.' . $theme . '.store') }}`;

                    fetch(routeUrl, {
                            method: "POST",
                            body: formData,
                            headers: {
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            // Hide the loading indicator 
                            loadingIndicator.style.display = 'none';
                            if (data.errors) {
                                // Display errors at the top of the page
                                errorMessages.style.display = 'block';
                                errorMessages.innerHTML = '<ul>' + Object.values(data.errors).map(
                                    error => `<li>${error}</li>`).join('') + '</ul>';
                            } else {
                                // If no errors, you can redirect or take other actions
                                window.open(data.lpagesindexUrl, '_self');
                            }
                        })
                        .catch(error => {
                            console.log("Error:", error);
                            // Hide the loading indicator on error
                            loadingIndicator.style.display = 'none';
                        });
                }
            });
        });
    </script>
@endpush
