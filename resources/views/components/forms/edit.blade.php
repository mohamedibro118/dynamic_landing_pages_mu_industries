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
    'sections',
    'pageId',
    'details',
    'unitTypes',
    'colors',
])
@extends('dashbourd.layouts.dashbourd')

@section('title', 'Update Content')


@section('breadcamp')
    @parent
    <li class="breadcrumb-item active">Updtae Content</li>
@endsection

@section('content')
    <x-bladewind.button tag="a" href="{{ route('dashbourd.landing_pages.index') }}"
        size="tiny">Back</x-bladewind.button>
    <div id="error-messages" class="alert alert-danger my-2" style="display: none;"></div>
    <form action="{{ route('dashbourd.themes.' . $theme . '.update', ['id' => $pageId]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @include('dashbourd.themes.' . $theme . '._form')
        <div class="row mt-3" style="justify-content: center">
            <div class="col-4 py-2 text-center">
                <x-bladewind.button id="updateButton" size="tiny" style="width: 100px">save</x-bladewind.button>
                <x-bladewind.button id="duplicateButton" size="tiny" style="width: 100px">Duplicate</x-bladewind.button>
            </div>

        </div>
    </form>
@endsection
@push('spscripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let previewWindow = null; // Reference to the preview window
            const loadingIndicator = document.getElementById('loading');
            const errorMessages = document.getElementById('error-messages');
            document.getElementById('updateButton').addEventListener('click', function() {

                // Find the closest form element to the clicked button
                const closestForm = this.closest('form');

                if (closestForm) {
                    const formData = new FormData(closestForm);
                    const pageTitleValue = formData.get('page_title').trim();

                    // Check if page_title is empty
                    if (pageTitleValue === '') {
                        alert('Page Title is required');
                        return; // Exit the function if validation fails
                    }
                    // Collect form data using FormData

                    loadingIndicator.style.display = 'block';
                    // Send form data to server using AJAX
                    const url = `{{ route('dashbourd.themes.' . $theme . '.update', ['id' => $pageId]) }}`
                    fetch(url, {
                            method: "POST",
                            body: formData,
                            headers: {
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            loadingIndicator.style.display = 'none';
                            // Open a new preview window in a new tab with returned preview URL
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
                            loadingIndicator.style.display = 'none';
                            console.log("Error:", error)
                        });
                }

            });
            document.getElementById('duplicateButton').addEventListener('click', function() {
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
