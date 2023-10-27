@props(['name','value'=>'','options','label'=>''])


    @if ($label)
        <label for="gnselect" class="form-label">{{$label}} :</label>
    @endif
    <div class="row">
        @foreach ($options as $item)
        <div class="col-md-3">
            <div class="form-check">
              <input class="form-check-input @error($name) is-invalid @enderror" name="{{$name}}" type="checkbox" value="{{$item->id}}" id="{{$item->id}}"
                @checked(collect(old($name,$value))->contains($item->id))>
              <label class="form-check-label" for="{{$item->id}}">
                {{$item->name}}
              </label>
            </div>
          </div>
        @endforeach
    </div>
    <x-ajaxerror name="{{$name}}" />

    @error($name)
       <small class="text-danger">{{$message}}</small>   
    @enderror

 
 