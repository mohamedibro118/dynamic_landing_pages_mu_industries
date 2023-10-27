@props(['path'=>null,'width'=>'100%','height'=>'auto','alt'=>'....'])
<img src="{{asset($path)}}" class="img-fluid" alt="{{$alt}}" style="width: {{$width}};height: {{$height}}">