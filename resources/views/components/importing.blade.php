@props(['route'])

<div class="d-flex flex-column my-2 my-md-0 float-end">
    <form action="{{ $route }}" class="d-flex" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="attatchment" accept=".xlsx" class="form-control" required>
        @error('attachment')
            <span class="alert-danger m-2 ms-0 p-1 rounded-2">{{ $message }}</span>
        @enderror
        <button class="btn mx-2 btn-outline-light bg-primary rounded-2" type="submit" id="button-addon2">Import</button>
    </form>
</div>
