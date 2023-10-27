<div class="row my-5">

    
<div class="col-dm-12  mt-2">
   <x-form-input2 label="Agent Name English" id="name_en" name="name_en" :value="$agent->name_en"/> 
</div>
<div class="col-dm-12  mt-2">
   <x-form-input2 label="Agent Name Arabic" id="name_ar" name="name_ar" :value="$agent->name_ar"/> 
</div>
<div class="col-dm-12  mt-2">
    <x-form-radio label="Status" name='status' :options="['active'=>'Active','inactive'=>'inactive']" :selected="$agent->status" />
   </div>

<div class="col-6 mt-2">
    <button type="submit" id="submit-button" class="btn btn-primary">{{ __('messages.Save') }}</button>
</div>
</div>
