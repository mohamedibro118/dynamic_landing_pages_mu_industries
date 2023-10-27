@props(['mdescriptions', 'section' => 'mdescriptions','label'=>'project Desc Description'])
@php
    $initialdescs = $mdescriptions; // Assuming $mdescriptions is the variable from your backend
@endphp
<div class="row">
    <div class="row accordion-body" style="align-items: flex-start">
        <div class="col-md-8 mt-2">
            <x-input-wedgits.description :label="$label" height="250" name="Desc_description"
                id="description_{{ $section }}" :value="null" />
        </div>
        <div class="row" style="justify-content: end">
            <div class="col-md-3">
                <button style="float: right" type="button" class="btn btn-outline-success"
                    id="addDescButton_{{ $section }}">Add</button>
                <button style="float: right; display: none" type="button" class="btn btn-outline-success"
                    id="updateDescButton_{{ $section }}">Update</button>
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
                <tbody id="descTableBody_{{ $section }}">
                </tbody>
            </table>
        </div>
    </div>
    <input type="hidden" id="descData_{{ $section }}" name="featurData[{{ $section }}]" value="">
</div>
@push('spscripts')
    <script>
            const descriptions = {!! $initialdescs ? $initialdescs->toJson() : '[]' !!};
            const addDescButton = document.getElementById('addDescButton_{{ $section }}');
            const descTableBody = document.getElementById('descTableBody_{{ $section }}');
            const updateDescButton = document.getElementById("updateDescButton_{{ $section }}");
            const DescDataInput = document.getElementById('descData_{{ $section }}');
            document.addEventListener('DOMContentLoaded', function() {
                intializeTableDesc(descriptions);
                // Add variables for form input elements

                addDescButton.addEventListener('click', async (e) => {
                    e.preventDefault();
                    const description = $(`#description_{{ $section }}`).val();
                    // Handle the file upload and store on the server


                    // Add the Desc data to the array
                    descriptions.push({
                        description,
                    });

                    // Update the hidden input with the JSON representation of the array
                    DescDataInput.value = JSON.stringify(descriptions);
                    // Create a new row in the table
                    const newRow = descTableBody.insertRow();
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
                        setDesc(descriptions, index)
                        addDescButton.style.display = 'none';
                        updateDescButton.style.display = 'block';

                        // Store the index in a data attribute of the "Update" button
                        updateDescButton.dataset.index = index;
                    });
                    editCell.appendChild(editButton);

                    // delete cell
                    const deleteCell = newRow.insertCell();
                    const deleteButton = document.createElement('button');
                    deleteButton.classList.add('btn', 'btn-outline-danger');
                    deleteButton.textContent = 'Delete';
                    deleteButton.addEventListener('click', () => {
                        deleteDesc(newRow.rowIndex - 1);
                    });
                    deleteCell.appendChild(deleteButton);

                    restDesc();
                });

                //action update button
                updateDescButton.addEventListener('click', function(event) {
                    const index = event.target.dataset.index;
                    updateDesc(index, event);
                });
            });

        

        function restDesc() {
            const descriptionTextarea = tinymce.get('description_{{ $section }}');
            if (descriptionTextarea) {
                descriptionTextarea.setContent('');
            }
        }

        function setDesc(array, index) {
            // Populate the form fields with the unit data for editing
            const fearure = array[index];
            const descriptionTextarea = tinymce.get('description_{{ $section }}');
            if (descriptionTextarea) {
                descriptionTextarea.setContent(fearure.description);
            }

        }

        async function updateDesc(index, event) {
            const description = $(`#description_{{ $section }}`).val();
            const row = descTableBody.rows[index];
            // update reset of data 
            descriptions[index].description = description;
            row.cells[0].innerHTML = description;
            restDesc();
            event.target.style.display = 'none';
            addDescButton.style.display = 'block';
            DescDataInput.value = JSON.stringify(descriptions);

        }

        function deleteDesc(index) {
            // Remove the unit from the descriptions array
            descriptions.splice(index, 1);

            // Remove the row from the table
            descTableBody.deleteRow(index);
            restDesc();
            updateDescButton.style.display = 'none';
            addDescButton.style.display = 'block';
            // Update the hidden input with the JSON representation of the updated descriptions array
            DescDataInput.value = JSON.stringify(descriptions);
        }

        function intializeTableDesc(mdescriptions) {
          
            mdescriptions.forEach((Desc, index) => {
                const newRow = descTableBody.insertRow();
                // description
                const descCell = newRow.insertCell();
                descCell.innerHTML = Desc.description;
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
                    setDesc(descriptions, index)
                    addDescButton.style.display = 'none';
                    updateDescButton.style.display = 'block';

                    // Store the index in a data attribute of the "Update" button
                    updateDescButton.dataset.index = index;
                });
                editCell.appendChild(editButton);

                // delete cell
                const deleteCell = newRow.insertCell();
                const deleteButton = document.createElement('button');
                deleteButton.classList.add('btn', 'btn-outline-danger');
                deleteButton.textContent = 'Delete';
                deleteButton.addEventListener('click', () => {
                    deleteDesc(newRow.rowIndex - 1);
                });
                deleteCell.appendChild(deleteButton);
            });

        }
        
    </script>
@endpush
