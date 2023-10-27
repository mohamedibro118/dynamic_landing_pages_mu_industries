@props(['ctas','name','id'])
<div class="row">
    <div class="col-sm-6 col-md-3">
        <div class="custom-control custom-checkbox">
            <input name="{{$name}}" value="Whats"
            class="custom-control-input custom-control-input-success" type="checkbox"
            @checked(collect(old('{{$name}}',json_decode($ctas?->cta)))->contains('Whats'))
            id="ctaonlandWhats_{{$id}}">
            <label for="ctaonlandWhats_{{$id}}" style="font-weight: 200" class="custom-control-label">Whats</label>
        </div>
    </div>
   
    <div class="col-sm-6 col-md-3">
        <div class="custom-control custom-checkbox">
            <input
                @checked(collect(old('{{$name}}',json_decode($ctas?->cta)))->contains('Call'))
                name="{{$name}}" value="Call" class="custom-control-input custom-control-input-success"
                type="checkbox" id="ctaonlandcall_{{$id}}">
            <label for="ctaonlandcall_{{$id}}" style="font-weight: 200"  class="custom-control-label">Call</label>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="custom-control custom-checkbox">
            <input
            @checked(collect(old('{{$name}}',json_decode($ctas?->cta)))->contains('Contact-Form'))
                name="{{$name}}" value="Contact-Form" id="ctaonlandContactForm_{{$id}}"
                class="custom-control-input custom-control-input-success" type="checkbox">
            <label for="ctaonlandContactForm_{{$id}}" style="font-weight: 200" class="custom-control-label">Contact Form</label>
        </div>
    </div>
</div>