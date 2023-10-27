@if (session()->has('failures'))
    <table class="table table-danger">
        <tr>
              <th>Row</th>
              <th>Attribute</th>
              <th>Errores</th>
              <th>Value</th>
        </tr>
        @foreach (session()->get('failures') as $error)
            <tr>
                <td>{{$error->row()}}</td>
                <td>{{$error->attribute()}}</td>
                <td>
                  <ul>
                    @foreach ($error->errors() as $e)
                       <li>{{$e}}</li> 
                    @endforeach
                  </ul>  
                </td>
                <td>{{$error->values()[$error->attribute()]}}</td>
            </tr>
        @endforeach
    </table>
@endif