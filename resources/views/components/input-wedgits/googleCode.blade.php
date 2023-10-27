@props(['page'])
<div class="row">
    <div class="col-md-12">
        <x-bladewind.input name="google_script" value="{{$page?->google_script}}" label="Google Script"   />
    </div>
    <div class="col-md-12">
        <x-bladewind.input name="google_noscript" value="{{$page?->google_noscript}}"  label="Google NoScript"  />
    </div>
    
</div>
