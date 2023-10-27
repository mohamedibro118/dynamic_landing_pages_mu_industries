@props(['units', 'section' => 'units','unitTypes'])
@php
    $initialUnits = $units; // Assuming $units is the variable from your backend
@endphp
<div class="row">
    <div class="row accordion-body" style="align-items: flex-start">

        <div class="col-md-4 mt-2">
            <x-input-wedgits.description label="Unit Description" name="description_unit" sheight='200'
                id="description_unit_{{ $section }}" :value="null" />
        </div>

        <div class="vstack col-md-4 mt-2">

            <x-input-wedgits.unitTypes label="{{ __('Unit Types') }}" name="type" :section="$section"
            default="{{ __('Unit Types') }}"  :unitTypes="$unitTypes"/>




        </div>
        <div class="row" style="justify-content: end">
            <div class="col-md-3">
                <button style="float: right; display: block" type="button" class="btn btn-outline-success"
                    id="addUnitsButton_{{ $section }}">add
                    units</button>
                <button style="float: right; display: none" type="button" class="btn btn-outline-success"
                    id="updateUnitsButton_{{ $section }}">Update
                    units</button>
            </div>
        </div>


        <div class="col-md-12 mt-2">
            <table class="table table-dark table-hover rounded">
                <thead>
                    <tr>
                        <th>Unit Type</th>
                        <th>Description</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody id="unitTableBody_{{ $section }}">

                </tbody>
            </table>
        </div>
    </div>
    <input type="hidden" id="unitData_{{ $section }}" name="unitData[{{ $section }}]" value="">
</div>
@push('spscripts')
    <script>
        const units = {!! $initialUnits?$initialUnits->toJson():'[]' !!}; // Array to store unit data
        // console.log(units);
        const unitTableBody = document.getElementById("unitTableBody_{{ $section }}");
        const addUnitButton = document.getElementById("addUnitsButton_{{ $section }}");
        const updateUnitButton = document.getElementById("updateUnitsButton_{{ $section }}");
        const unitDataInput = document.getElementById("unitData_{{ $section }}");
        document.addEventListener('DOMContentLoaded', function() {

            //intialize table
            intializeTable(units);
            // Add variables for form input elements

            addUnitButton.addEventListener('click', async (e) => {
                e.preventDefault();
                const description = $(`#description_unit_{{ $section }}`).val();
                const type = $(`#type_{{ $section }}`).val();
                // const logoFile = img_url.files[0];
                units.push({
                    description: description,
                    type: type,
                });

                // Update the hidden input with the JSON representation of the array
                unitDataInput.value = JSON.stringify(units);
                // Create a new row in the table
                const newRow = unitTableBody.insertRow();
                // type 
                const typeCell = newRow.insertCell();
                typeCell.textContent = type;
                //price
                const descCell = newRow.insertCell();
                descCell.innerHTML = description;
                //edit cell
                const editCell = newRow.insertCell();
                const editButton = document.createElement('button');
                editButton.classList.add('btn', 'btn-outline-success');
                editButton.textContent = 'Edit';
                editButton.type = 'button';
                // edit Listener
                editButton.addEventListener('click', () => {
                    e.preventDefault();
                    const index = newRow.rowIndex - 1;
                    setUnit(units, index)
                    addUnitButton.style.display = 'none';
                    updateUnitButton.style.display = 'block';

                    // Store the index in a data attribute of the "Update" button
                    updateUnitButton.dataset.index = index;
                });
                editCell.appendChild(editButton);

                // delete cell
                const deleteCell = newRow.insertCell();
                const deleteButton = document.createElement('button');
                deleteButton.classList.add('btn', 'btn-outline-danger');
                deleteButton.textContent = 'Delete';
                deleteButton.addEventListener('click', () => {
                    deleteUnit(newRow.rowIndex - 1);
                });
                deleteCell.appendChild(deleteButton);

                restUnit();
            });


            //action update button
            updateUnitButton.addEventListener('click', async function(event) {
                console.log('update');
                const index = event.target.dataset.index;
                updateUnit(index, event);
            });

        });

        function restUnit() {
            const descriptionTextarea = tinymce.get('description_unit_{{ $section }}');
            logoInput.value = ''; // Clear the file input
            $(`#type_{{ $section }}`).val('apartment'); // Reset the type to the default value
            if (descriptionTextarea) {
                descriptionTextarea.setContent('');
            }

        }

        function setUnit(array, index) {
            // Populate the form fields with the unit data for editing

            const unit = array[index];
            const descriptionTextarea = tinymce.get('description_unit_{{ $section }}');
            $(`#type_{{ $section }}`).val(unit.type); // Reset the type to the default value

            if (descriptionTextarea) {
                descriptionTextarea.setContent(unit.description);
            }

        }

        async function updateUnit(index, event) {
            const description = $(`#description_unit_{{ $section }}`).val();

            const type = $(`#type_{{ $section }}`).val();
            const row = unitTableBody.rows[index];
            units[index].description = description;
            units[index].type = type;
            row.cells[0].textContent = type;
            row.cells[1].innerHTML = description;

            // Clear the form and reset the button display
            restUnit();
            event.target.style.display = 'none';
            addUnitButton.style.display = 'block';
            unitDataInput.value = JSON.stringify(units);

        }

        function deleteUnit(index) {
            // Remove the unit from the units array
            units.splice(index, 1);

            // Remove the row from the table
            unitTableBody.deleteRow(index);

            // Update the hidden input with the JSON representation of the updated units array
            unitDataInput.value = JSON.stringify(units);
        }

        function intializeTable(units) {
            units.forEach((unit, index) => {
                const newRow = unitTableBody.insertRow();
                const typeCell = newRow.insertCell();
                typeCell.textContent = unit.type;
                const descCell = newRow.insertCell();
                descCell.innerHTML = unit.description;
                const editCell = newRow.insertCell();
                const editButton = document.createElement('button');
                editButton.classList.add('btn', 'btn-outline-success');
                editButton.textContent = 'Edit';
                editButton.type = 'button';
                editButton.addEventListener('click', () => {
                    setUnit(units, index);
                    addUnitButton.style.display = 'none';
                    updateUnitButton.style.display = 'block';
                    updateUnitButton.dataset.index = index;
                });
                editCell.appendChild(editButton);
                const deleteCell = newRow.insertCell();
                const deleteButton = document.createElement('button');
                deleteButton.classList.add('btn', 'btn-outline-danger');
                deleteButton.textContent = 'Delete';
                deleteButton.addEventListener('click', () => {
                    deleteUnit(index);
                });
                deleteCell.appendChild(deleteButton);
            });
        }
    </script>
@endpush
