@props(['features', 'section' => 'features','label'=>'project Feature Description'])
@php
    $initialfeatures = $features; // Assuming $features is the variable from your backend
@endphp
<div class="row">
    <div class="row accordion-body" style="align-items: flex-start">
        <div class="col-md-8 mt-2">
            <x-input-wedgits.description :label="$label" height="200" name="feature_description"
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
            const featurs_desc = {!! $initialfeatures ? $initialfeatures->toJson():'[]' !!}; // Array to store featur data
            const addfeaturButton = document.getElementById('addfeaturesButton_{{ $section }}');
            const featurTableBody = document.getElementById('featurTableBody_{{ $section }}');
            const updateFeatureButton = document.getElementById("updateFeatureButton_{{ $section }}");
            const featurDataInput = document.getElementById('featureData_{{ $section }}');
            document.addEventListener('DOMContentLoaded', function() {
                intializeTableFeature(featurs_desc);
                // Add variables for form input elements

                addfeaturButton.addEventListener('click', async (e) => {
                    e.preventDefault();
                    const description = $(`#description_{{ $section }}`).val();
                    // Handle the file upload and store on the server


                    // Add the feature data to the array
                    featurs_desc.push({
                        description,
                    });

                    // Update the hidden input with the JSON representation of the array
                    featurDataInput.value = JSON.stringify(featurs_desc);
                    // Create a new row in the table
                    const newRow = featurTableBody.insertRow();
                    // description
                    const descCell = newRow.insertCell();
                    descCell.innerHTML = description;

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
                        setFeature(featurs_desc, index)
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

                    restFeature();
                });

                //action update button
                updateFeatureButton.addEventListener('click', function(event) {
                    const index = event.target.dataset.index;
                    updateFeature(index, event);
                });
            });

        

        function restFeature() {
            const descriptionTextarea = tinymce.get('description_{{ $section }}');
            if (descriptionTextarea) {
                descriptionTextarea.setContent('');
            }
        }

        function setFeature(array, index) {
            // Populate the form fields with the unit data for editing
            const fearure = array[index];
            const descriptionTextarea = tinymce.get('description_{{ $section }}');
            if (descriptionTextarea) {
                descriptionTextarea.setContent(fearure.description);
            }

        }

        async function updateFeature(index, event) {
            const description = $(`#description_{{ $section }}`).val();
            const row = featurTableBody.rows[index];
            // update reset of data 
            featurs_desc[index].description = description;
            row.cells[0].innerHTML = description;
            restFeature();
            event.target.style.display = 'none';
            addfeaturButton.style.display = 'block';
            featurDataInput.value = JSON.stringify(featurs_desc);

        }

        function deleteFeature(index) {
            // Remove the unit from the featurs_desc array
            featurs_desc.splice(index, 1);

            // Remove the row from the table
            featurTableBody.deleteRow(index);
            restFeature();
            updateFeatureButton.style.display = 'none';
            addfeaturButton.style.display = 'block';
            // Update the hidden input with the JSON representation of the updated featurs_desc array
            featurDataInput.value = JSON.stringify(featurs_desc);
        }

        function intializeTableFeature(features) {
          
            features.forEach((feature, index) => {
                const newRow = featurTableBody.insertRow();
                // description
                const descCell = newRow.insertCell();
                descCell.innerHTML = feature.description;
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
                    setFeature(featurs_desc, index)
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
