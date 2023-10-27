@props(['page','title'=>'Reserve Your Unit Now'])
@push('links')
    <style>
        .hidden {
            display: none
            
        }
    </style>
@endpush

<form method="post" action="" class="profile-form" id="profile-form-simple"
    onsubmit="return saveProfileSimple()">
    @csrf
    <p class="" style="text-align: center !important"><h3 style="text-align: center">{!! $title !!}</h3></p>
    <input type="hidden" name="agent_id" value="{{ $page->agent_id }}">
    <input type="hidden" name="admin_id" value="{{ $page->admin_id }}">
    <input type="hidden" name="source" value="{{ $page->title }}">
    <input type="hidden" name="source_id" value="{{ $page->id }}">
    <div class="grid grid-cols-2 gap-4 mt-6">
        <x-bladewind.input required="true" name="name" label="First name" error_message="Please enter your last name"
            error_message="Please enter your first name" />
        <x-bladewind.input required="true" name="phone" label="Mobile" error_message="Please enter your last name" />
    </div>
    <x-bladewind.input required="true" name="email" label="Email address" error_message="Please enter your email" />
    <x-bladewind.input numeric="true" name="other_phone" label="Other Mobile" />
    <x-bladewind.textarea name="message" label="Comment"> </x-bladewind.textarea>
    <div class="mb-1" style="display:flex;justify-content:center">
         <x-bladewind.button can_submit="true" 
          class=" mt-2" style="height: 40px;line-height: 0rem;background-color: black !important"
          >Send</x-bladewind.button>
    </div>
   
</form>
<x-bladewind.alert type="success" shade="dark" class="success-alert hidden my-3" id="success-alert">
    Files were successfully uploaded
</x-bladewind.alert>



@push('sscripts')
    <script>
        function saveProfileSimple() {
            event.preventDefault(); // Prevent the default form submission

            const formdata = new FormData(document.querySelector('#profile-form-simple'));
            const url = "{{ route('dashbourd.leads.store') }}";

            fetch(url, {
                    method: 'POST', // You may need to change the method to 'POST' if you want to send data to a store route
                    body: formdata,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json' // Add the CSRF token to the headers
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.errors) {
                        // Validation errors are present
                        const errorMessages = data.errors;

                        // Loop through error messages and display them
                        Object.keys(errorMessages).forEach(fieldName => {
                            const errorMessage = errorMessages[fieldName][
                                0
                            ]; // Assuming Laravel sends error messages as arrays
                            const inputElement = document.querySelector(`[name="${fieldName}"]`);
                            if (inputElement) {
                                inputElement.setAttribute('error_message', errorMessage);

                                // Add or update an error message element next to the input field
                                let errorElement = inputElement.nextElementSibling;
                                if (!errorElement || !errorElement.classList.contains('text-red-500')) {
                                    errorElement = document.createElement('div');
                                    errorElement.className = 'text-red-500 text-xs p-1';
                                    inputElement.parentNode.insertBefore(errorElement, inputElement
                                        .nextSibling);
                                }
                                errorElement.textContent = errorMessage;
                                errorElement.classList.remove('hidden');

                            }
                        });
                    } else {
                        const successAlert = document.querySelector('.success-alert');
                        successAlert.classList.remove('hidden');
                        successAlert.textContent = 'Message  Send  successfully';

                        // Reset the form
                        document.querySelector('#profile-form-simple').reset();

                        const errorElements = document.querySelectorAll('.text-red-500');
                        errorElements.forEach(function(element) {
                            element.classList.add('hidden');
                        });
                    }
                })
                .catch(error => {
                    // Handle any errors that occurred during the fetch
                    console.error('Fetch error:', error);
                    // Example: Display an error message
                    alert('An error occurred while creating the lead.');
                });
        }
    </script>
@endpush
