@props(['bgcolor' => 'rgba(29, 28, 28, 0.436)',
'section','page',
'ctas','style'=>'width:50px;height:40px',
'color'=>'yellow'])
<div style="display: inline-block;padding: 5px;border-radius:5px;background-color: {{$bgcolor}}">
    <div class=" text-center"
        style="display:flex ;justify-content: center;">
        @foreach (json_decode($ctas?->firstWhere('identifier', $section)?->cta)??[] as $type)
            <x-front-wedgits.cta :type="$type" :page="$page"
                iconStyle="{{$style}}" color="{{$color}}"/>
        @endforeach
    </div>
</div>