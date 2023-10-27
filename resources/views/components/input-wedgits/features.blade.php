@props(['features', 'section' => 'features', 'label' => 'project Feature Description','icon_width'=>'250','icon_height'=>'250','theme'=>'theme1'])
@php
    $initialfeatures = $features; // Assuming $features is the variable from your backend
@endphp
<div class="row">
    <div class="row accordion-body" style="align-items: flex-start">
        <div class="col-md-4 mt-2">
                <x-bladewind.filepicker label="Feature Icon"  required=true name="feature_icons"
                        placeholder="{{ __('choose your Logo') }}" id="feature_icon_{{ $section }}"  min_width="{{$icon_width}}"
                        min_height="{{$icon_height}}" sheight="250px" />
        </div>

        <div class="col-md-8 mt-2">
            <x-input-wedgits.description :label="$label" sheight='250' name="feature_description"
                id="description_{{ $section }}" :value="null" />
        </div>


        <div class="row" style="justify-content: end">
            <div class="col-md-3">
                <button style="float: right" type="button" class="btn btn-outline-success"
                    id="addfeaturesButton_{{ $section }}">add
                    feature</button>
                <button style="float: right; display: none" type="button" class="btn btn-outline-success"
                    id="updateFeatureButton_{{ $section }}">Update
                    Feature</button>
            </div>
        </div>


        <div class="col-md-12 mt-2">
            <table class="table table-dark table-hover rounded">
                <thead>
                    <tr>
                        <th>icon_url</th>
                        <th>Description</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody id="featurTableBody_{{ $section }}">
                </tbody>
            </table>
        </div>
    </div>
    <input type="hidden" id="featureData_{{ $section }}" name="featurData[{{ $section }}]" value="">
</div>
@push('spscripts')
    <script>
         const featurs= {!! $initialfeatures ? $initialfeatures->toJson() : '[]' !!}; // Array to store featur data
        const addfeaturButton = document.getElementById('addfeaturesButton_{{ $section }}');
        const featurTableBody = document.getElementById('featurTableBody_{{ $section }}');
        const updateFeatureButton = document.getElementById("updateFeatureButton_{{ $section }}");
        const featurDataInput = document.getElementById('featureData_{{ $section }}');
        document.addEventListener('DOMContentLoaded', function() {
            intializeTableFeature(featurs);
            // Add variables for form input elements

            addfeaturButton.addEventListener('click', async (e) => {
                e.preventDefault();
                const logoFileInput = document.querySelector(`#feature_icon_{{ $section }}`);
                const description = $(`#description_{{ $section }}`).val();
                const logoFile = logoFileInput.files[0];
                var logoUrl = '';
                if (logoFile) {
                    // Handle the file upload and store on the server
                    const formData = new FormData();
                    formData.append('feature_icons', logoFile);
                    const headers = new Headers();
                    headers.append('X-CSRF-TOKEN', '{{ csrf_token() }}');
                    const url="{{ route('dashbourd.themes.'.$theme.'.uploade_feature_icons') }}"
                    const response = await fetch(
                        url, {
                            method: 'POST',
                            headers: headers,
                            body: formData,
                        });

                    const responseData = await response.json();
                    logoUrl = responseData.url_Path; // Use the returned URL
                    // Add the unit data to the array

                    if (!logoUrl) {
                        alert('icon not uploaded please try again')
                    }
                    // Add the feature data to the array
                    featurs.push({
                        icon_url: logoUrl,
                        description,
                    });

                    // Update the hidden input with the JSON representation of the array
                    featurDataInput.value = JSON.stringify(featurs);
                    // Create a new row in the table
                    const newRow = featurTableBody.insertRow();
                    // description
                    const descCell = newRow.insertCell();
                    descCell.innerHTML = description;
                    //icon_url
                    const iconCell = newRow.insertCell();
                    iconCell.innerHTML =
                        `<img style="width:120px;height:70px" src="${logoUrl}" alt="" />`;
                    //edit cell
                    const editCell = newRow.insertCell();
                    const editButton = document.createElement('button');
                    editButton.classList.add('btn', 'btn-outline-success');
                    editButton.textContent = 'Edit';
                    editButton.type = 'button';
                    // edit Listener
                    editButton.addEventListener('click', (e) => {
                        e.preventDefault();
                        const index = newRow.rowIndex - 1;
                        setFeature(featurs, index)
                        addfeaturButton.style.display = 'none';
                        updateFeatureButton.style.display = 'block';

                        // Store the index in a data attribute of the "Update" button
                        updateFeatureButton.dataset.index = index;
                    });
                    editCell.appendChild(editButton);

                    // delete cell
                    const deleteCell = newRow.insertCell();
                    const deleteButton = document.createElement('button');
                    deleteButton.classList.add('btn', 'btn-outline-danger');
                    deleteButton.textContent = 'Delete';
                    deleteButton.addEventListener('click', () => {
                        deleteFeature(newRow.rowIndex - 1);
                    });
                    deleteCell.appendChild(deleteButton);
                }
                restFeature();
            });

            //action update button
            updateFeatureButton.addEventListener('click', function(event) {
                const index = event.target.dataset.index;
                updateFeature(index, event);
            });
        });



        function restFeature() {
            const logoInput = document.querySelector(`#feature_icon_{{ $section }}`);
            const imagePreview = document.querySelector('.feature_icon_{{ $section }} .image-preview__image');
            const defaultText = document.querySelector('.feature_icon_{{ $section }} .image-preview__text-default');
            const descriptionTextarea = tinymce.get('description_{{ $section }}');

            logoInput.value = ''; // Clear the file input

            // Reset the type to the default value
            // Reset the image preview
            imagePreview.style.display = 'none';
            defaultText.style.display = 'block';

            if (descriptionTextarea) {
                descriptionTextarea.setContent('');
            }
        }

        function setFeature(array, index) {
            // Populate the form fields with the unit data for editing
            const fearure = array[index];
            const imagePreview = document.querySelector('.feature_icon_{{ $section }} .image-preview__image');
            const defaultText = document.querySelector('.feature_icon_{{ $section }} .image-preview__text-default');
            const descriptionTextarea = tinymce.get('description_{{ $section }}');

            // Reset the image preview
            imagePreview.src = fearure.icon_url;
            imagePreview.style.display = 'block';
            defaultText.style.display = 'none';

            if (descriptionTextarea) {
                descriptionTextarea.setContent(fearure.description);
            }

        }

        async function updateFeature(index, event) {


            const logoFileInput = document.querySelector(`#feature_icon_{{ $section }}`);
            const logoFile = logoFileInput.files[0];
            const description = $(`#description_{{ $section }}`).val();
            const row = featurTableBody.rows[index];

            if (logoFile) {
                // Handle the file upload and store on the server
                const formData = new FormData();
                formData.append('feature_icons', logoFile);
                const headers = new Headers();
                headers.append('X-CSRF-TOKEN', '{{ csrf_token() }}');
                const response = await fetch(
                    "{{ route('dashbourd.themes.theme1.uploade_feature_icons') }}", {
                        method: 'POST',
                        headers: headers,
                        body: formData,
                    });

                const responseData = await response.json();
                logoUrl = responseData.url_Path; // Use the returned URL
                // Add the unit data to the array

                if (!logoUrl) {
                    alert('image not uploaded please try again')
                }

                // Update the icon url  unit data in the featurs array
                featurs[index].icon_url = logoUrl;
                // Update the icon url  unit data in the row
                row.cells[1].innerHTML = `<img style="width:120px;height:70px" src="${logoUrl}" alt="" />`;
            }
            // update reset of data 
            featurs[index].description = description;
            row.cells[0].innerHTML = description;
            restFeature();
            event.target.style.display = 'none';
            addfeaturButton.style.display = 'block';

            featurDataInput.value = JSON.stringify(featurs);

        }

        function deleteFeature(index) {
            // Remove the unit from the featurs array
            featurs.splice(index, 1);

            // Remove the row from the table
            featurTableBody.deleteRow(index);
            restFeature();
            updateFeatureButton.style.display = 'none';
            addfeaturButton.style.display = 'block';
            // Update the hidden input with the JSON representation of the updated featurs array
            featurDataInput.value = JSON.stringify(featurs);
        }

        function intializeTableFeature(features) {
            const featurTableBody = document.getElementById('featurTableBody_{{ $section }}');
            features.forEach((feature, index) => {
                const newRow = featurTableBody.insertRow();
                // description
                const descCell = newRow.insertCell();
                descCell.innerHTML = feature.description;
                //icon_url
                const iconCell = newRow.insertCell();
                iconCell.innerHTML =
                    `<img style="width:120px;height:70px" src="${feature.icon_url}" alt="" />`;
                //edit cell
                const editCell = newRow.insertCell();
                const editButton = document.createElement('button');
                editButton.classList.add('btn', 'btn-outline-success');
                editButton.textContent = 'Edit';
                editButton.type = 'button';
                // edit Listener
                editButton.addEventListener('click', (e) => {
                    e.preventDefault();
                    const index = newRow.rowIndex - 1;
                    setFeature(featurs, index)
                    addfeaturButton.style.display = 'none';
                    updateFeatureButton.style.display = 'block';

                    // Store the index in a data attribute of the "Update" button
                    updateFeatureButton.dataset.index = index;
                });
                editCell.appendChild(editButton);

                // delete cell
                const deleteCell = newRow.insertCell();
                const deleteButton = document.createElement('button');
                deleteButton.classList.add('btn', 'btn-outline-danger');
                deleteButton.textContent = 'Delete';
                deleteButton.addEventListener('click', () => {
                    deleteFeature(newRow.rowIndex - 1);
                });
                deleteCell.appendChild(deleteButton);
            });

        }
    </script>
@endpush
