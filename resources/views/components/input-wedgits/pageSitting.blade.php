@props(['page'])
<div class="row">
    <div class="col-md-4">
        <x-bladewind.input name="mobile" value="{{$page?->mobile}}" label="Phone" required="true" numeric="true" />
    </div>
    <div class="col-md-4">
        <x-bladewind.input name="whats" value="{{$page?->whats}}" required="true" label="What’s App" numeric="true" />
    </div>
    <div class="col-md-4">
        <x-bladewind.input name="email" value="{{$page?->email}}" required="true" label="Email" />
    </div>
    
</div>
