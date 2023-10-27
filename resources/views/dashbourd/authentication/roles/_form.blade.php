<div class="row my-5">


    <div class="col-dm-12  mt-2">
        <x-form-input2 label="Role Name English" id="name_en" name="name_en" :value="$role->name_en" />
    </div>
    <div class="col-dm-12  mt-2">
        <x-form-input2 label="Role Name Arabic" id="name_ar" name="name_ar" :value="$role->name_ar" />
    </div>
    
    <fieldset>
        <legend>{{__('Abilities')}}</legend>
    </fieldset>

    @foreach (config('abilities') as $ability_code => $ability_name)
        <div class="row mb-2">
            <div class="col-md-6">
                {{$ability_name}}
            </div>
            <div class="col-md-2">
                <input type="radio" name="abilities[{{$ability_code}}]" value="allow"
                @if(isset($role_abilities))
                @checked(($role_abilities[$ability_code] ??'')=='allow')
                @else
                checked
                @endif
                >Allow
            </div>
            <div class="col-md-2">
                <input type="radio" name="abilities[{{$ability_code}}]" value="deny" @checked(($role_abilities[$ability_code] ??'')=='deny')>Deny
            </div>
        </div>
    @endforeach

    <div class="col-6 mt-2">
        <button type="submit" id="submit-button" class="btn btn-primary">{{ __('messages.Save') }}</button>
    </div>
</div>
