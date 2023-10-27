@props(['units', 'section' => 'units','theme' => 'theme1','unitTypes'])
@php
    $initialUnits = $units; // Assuming $units is the variable from your backend
@endphp
<div class="row">
    <div class="row accordion-body" style="align-items: flex-start">
        <div class="col-md-4 mt-2">
                <x-bladewind.filepicker label="Unit Logo"  required=true name="logo_unit"
                        placeholder="{{ __('choose your Logo') }}" id="unitlogo_{{ $section }}"  min_width="520"
                        min_height="400" sheight="250px" />
        </div>

        <div class="vstack col-md-4 mt-2 gap-2">
            <x-form-select label="{{ __('Bathrooms') }}" name="bedrooms" id="bedrooms_{{ $section }}"
                default="{{ __('Bedrooms') }}" selected="2" :options="[
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                    '7' => '7',
                    '8' => '8',
                    '9' => '9',
                    '10' => '10',
                ]" />

            <x-form-select label="{{ __('Bathrooms') }}" name="bathrooms" id="bathrooms_{{ $section }}"
                default="{{ __('Bathrooms') }}" selected="1" :options="[
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                    '7' => '7',
                    '8' => '8',
                    '9' => '9',
                    '10' => '10',
                ]" />
            <x-bladewind.input id="surface_{{ $section }}" name="surface" value="" label="surface" />
        </div>

        <div class="vstack col-md-4 mt-2 gap-2">
            <x-input-wedgits.description label="Unit price" name="price_unit" sheight='210'
                id="price_unit_{{ $section }}" :value="null" />

            <x-input-wedgits.unitTypes label="{{ __('Unit Types') }}" name="type" :section="$section"
                default="{{ __('Unit Types') }}" :unitTypes="$unitTypes" />
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
                        <th>Start Price</th>
                        <th>URL</th>
                        <th>Bedrooms</th>
                        <th>Bathrooms</th>
                        <th>surface</th>
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
        const units = {!! $initialUnits ? $initialUnits->toJson() : '[]' !!}; // Array to store unit data
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

                const logoFileInput = document.querySelector(`#unitlogo_{{ $section }}`);
                const logoFile = logoFileInput.files[0];
                // const description = $(`#description_unit_{{ $section }}`).val();
                const type = $(`#type_{{ $section }}`).val();
                const price = $(`#price_unit_{{ $section }}`).val();
                const surface = $(`#surface_{{ $section }}`).val();
                const bedrooms = $(`#bedrooms_{{ $section }}`).val();
                const bathrooms = $(`#bathrooms_{{ $section }}`).val();
                // const logoFile = img_url.files[0];
                var logoUrl = '';
                if (logoFile) {
                    // Handle the file upload and store on the server
                    const formData = new FormData();
                    formData.append('unit_photo', logoFile);
                    const headers = new Headers();
                    headers.append('X-CSRF-TOKEN', '{{ csrf_token() }}');
                    const url="{{ route('dashbourd.themes.'.$theme.'.uploade_unit_photo') }}"
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
                        alert('image not uploaded please try again')
                    }
                    units.push({
                        img_url: logoUrl,
                        type: type,
                        // description: description,
                        price: price,
                        surface: surface,
                        bedrooms: bedrooms,
                        bathrooms: bathrooms,
                    });

                    // Update the hidden input with the JSON representation of the array
                    unitDataInput.value = JSON.stringify(units);
                    // Create a new row in the table
                    const newRow = unitTableBody.insertRow();
                    // type 
                    const typeCell = newRow.insertCell();
                    typeCell.textContent = type;
                    //price
                    const priveCell = newRow.insertCell();
                    priveCell.innerHTML = price;
                    //img_url
                    const logoCell = newRow.insertCell();
                    logoCell.innerHTML =`<img style="width:120px;height:70px" src="${logoUrl}" alt="" />`;
                    //edit cell
                    //bedrooms
                    const bedCell = newRow.insertCell();
                    bedCell.textContent = bedrooms;
                    //bathrooms
                    const bathCell = newRow.insertCell();
                    bathCell.textContent = bathrooms;
                    //surface
                    const surfaceCell = newRow.insertCell();
                    surfaceCell.textContent = surface;
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
                }
                restUnit();
            });


            //action update button
            updateUnitButton.addEventListener('click', async function(event) {
                const index = event.target.dataset.index;
                updateUnit(index, event);
            });

        });

        function restUnit() {
            const logoInput = document.querySelector(`#unitlogo_{{ $section }}`);
            const imagePreview = document.querySelector('.unitlogo_{{ $section }} .image-preview__image');
            const defaultText = document.querySelector('.unitlogo_{{ $section }} .image-preview__text-default');
            const priceTextarea = tinymce.get('price_unit_{{ $section }}');
            $(`#type_{{ $section }}`).val('apartment');
            $(`#bedrooms_{{ $section }}`).val('2');
            $(`#bathrooms_{{ $section }}`).val('1');
            $(`#surface_{{ $section }}`).val('');

            logoInput.value = ''; // Clear the file input

            $(`#type_{{ $section }}`).val('apartment'); // Reset the type to the default value
            // Reset the image preview
            imagePreview.style.display = 'none';
            defaultText.style.display = 'block';

            if (priceTextarea) {
                priceTextarea.setContent('');
            }

        }

        function setUnit(array, index) {
            // Populate the form fields with the unit data for editing

            const unit = array[index];
            // console.log(unit);
            const imagePreview = document.querySelector('.unitlogo_{{ $section }} .image-preview__image');
            const defaultText = document.querySelector('.unitlogo_{{ $section }} .image-preview__text-default');
            const priceTextarea = tinymce.get('price_unit_{{ $section }}');
            $(`#price_unit_{{ $section }}`).val(unit.price);
            $(`#surface_{{ $section }}`).val(unit.surface);
            $(`#bedrooms_{{ $section }}`).val(unit.bedrooms);
            $(`#bathrooms_{{ $section }}`).val(unit.bathrooms);
            $(`#type_{{ $section }}`).val(unit.type); // Reset the type to the default value
            // Reset the image preview
            imagePreview.src = unit.img_url;
            imagePreview.style.display = 'block';
            defaultText.style.display = 'none';

            if (priceTextarea) {
                priceTextarea.setContent(unit.price);
            }

        }

        async function updateUnit(index, event) {


            const logoFileInput = document.querySelector(`#unitlogo_{{ $section }}`);
            const logoFile = logoFileInput.files[0];
            // const description = $(`#description_unit_{{ $section }}`).val();

            const type = $(`#type_{{ $section }}`).val();
            const price = $(`#price_unit_{{ $section }}`).val();
            const surface = $(`#surface_{{ $section }}`).val();
            const bedrooms = $(`#bedrooms_{{ $section }}`).val();
            const bathrooms = $(`#bathrooms_{{ $section }}`).val();
            const row = unitTableBody.rows[index];

            if (logoFile) {
                // Handle the file upload and store on the server
                const formData = new FormData();
                formData.append('unit_photo', logoFile);
                const headers = new Headers();
                headers.append('X-CSRF-TOKEN', '{{ csrf_token() }}');
                const response = await fetch(
                    "{{ route('dashbourd.themes.theme1.uploade_unit_photo') }}", {
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

                // Update the unit data in the units array
                units[index].img_url = logoUrl;
                row.cells[2].innerHTML = `<img style="width:120px;height:70px" src="${logoUrl}" alt="" />`;
                // Update the table row with the new data
            }
            units[index].price = price;
            units[index].type = type;
            units[index].bedrooms = bedrooms;
            units[index].bathrooms = bathrooms;
            units[index].surface = surface;
            row.cells[0].textContent = type;
            row.cells[1].innerHTML = price;
            row.cells[3].textContent = bedrooms;
            row.cells[4].textContent = bathrooms;
            row.cells[5].surface = surface;

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
                const priceCell = newRow.insertCell();
                priceCell.innerHTML = unit.price;
                const logoCell = newRow.insertCell();
                logoCell.innerHTML = `<img style="width:120px;height:70px" src="${unit.img_url}" alt="" />`;
                //bedrooms
                const bedCell = newRow.insertCell();
                bedCell.textContent = unit.bedrooms;
                //bathrooms
                const bathCell = newRow.insertCell(); 
                bathCell.textContent =unit.bathrooms;
                //surface
                const surfaceCell = newRow.insertCell();
                surfaceCell.textContent =unit.surface;
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
