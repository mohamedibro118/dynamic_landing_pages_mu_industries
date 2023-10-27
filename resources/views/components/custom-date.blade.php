
@props(['name'])

<div class="custom-date-input">
    <input type="text" name="{{$name}}" id="{{}}" {{attributes}} readonly>
    <button type="button" {{attributes}} >Select</button>
</div>