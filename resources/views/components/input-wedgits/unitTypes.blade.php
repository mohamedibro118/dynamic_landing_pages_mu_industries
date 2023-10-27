@props([
    'name' => 'type',
    'unitTypes',
    'section' => 'units',
    'style' => '',
    'label' => null,
    'default',
    'required' => true,
])
<div class="relative">
    

    <select name="{{ $name }}" id="type_{{ $section }}" @error($name) is-invalid @enderror
        {{ $attributes }} style="width: 100%;{{ $style ?? '' }};border: 2px solid #eee;
      border-radius: 10px;">
        <option value="apartment">apartment</option>
        @foreach ($unitTypes as $type)
            <option value="{{ $type->name }}">{{ $type->name }}</option>
        @endforeach
        <option value="new">Add New Unit Type</option>
    </select>
    @if (!empty($label))
        <label for="type_{{ $section }}" class="form-label"
            onclick="dom_el('.{{ $name }}').focus()">{!! $label !!}
            @if ($required)
                <x-bladewind::icon name="star" class="!text-red-400 !w-2 !h-2 mt-[-2px]" type="solid" />
            @endif
        </label>
    @endif

    <div class="mt-1" id="new-unit-type-section_{{ $section }}" style="display: none;align-items: center">
        <input type="text" name="new_unit_type" id="new_unit_type_{{ $section }}" class="form-control"
            placeholder="Enter New Unit Type">
        <button type="button" class="btn btn-primary mt-2" id="add-unit-type_{{ $section }}"
            style="margin-top: 0px !important">Add</button>
    </div>
</div>
@push('spscripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const addUnitTypeButton = document.getElementById("add-unit-type_{{ $section }}");
            const selectInput = document.getElementById("type_{{ $section }}");
            const newUnitTypeSection = document.getElementById("new-unit-type-section_{{ $section }}");

            selectInput.addEventListener("change", function() {
                if (selectInput.value === "new") {
                    newUnitTypeSection.style.display = "flex";
                } else {
                    newUnitTypeSection.style.display = "none";
                }
            });

            addUnitTypeButton.addEventListener("click", function() {
                const newUnitTypeName = document.getElementById("new_unit_type_{{ $section }}").value;
                const url_type = "{{ route('dashbourd.add_unit_type') }}"
                if (newUnitTypeName) {
                    // Make an AJAX request to add the new unit type to the database.
                    // After a successful response, update the select input with the new option.
                    // Replace the following with your actual AJAX request and update logic.
                    fetch(url_type, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                name: newUnitTypeName
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                const newOption = document.createElement("option");
                                newOption.value = data.id;
                                newOption.textContent = newUnitTypeName;
                                selectInput.insertBefore(newOption, selectInput.firstChild
                                .nextSibling); // Insert before the button
                                selectInput.value = data.id; // Select the newly added option
                                newUnitTypeName.value = ""; // Clear the input
                                newUnitTypeSection.style.display = "none"; // Hide the new section
                            }
                        })
                        .catch(error => {
                            console.error(error);
                        });
                }
            });
        });
    </script>
@endpush
