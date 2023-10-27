@extends('dashbourd.layouts.dashbourd')

@section('title', 'Admin Profile')


@section('breadcamp')
    @parent
    <li class="breadcrumb-item active">Profile</li>
@endsection



@section('content')

    {{-- <div class="my-5">
        <a href="{{ route('products.create') }}" class="btn btn-sm btn-outline-success">Create</a>
        {{-- <a href="{{ route('products.trash') }}" class="btn btn-sm btn-outline-dark">Trashed</a> 
    </div> --}}

    <x-alert class=" my-2" />


    
    <form class="mb-2"  method="POST" action="{{route('profile.update')}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-row">
            <div class="col-md-6">
                <x-form-input  name="username" required="true" label="User Name" :value="$user->username" />
            </div>
            <div class="col-md-6">
                <x-form-input type="password" name="password" required="true"  label="Password" value=""  />
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <x-form-input  name="phone_number"  label="phone" required="true" :value="$user->phone_number" />
            </div>
            <div class="col-md-6">
                <x-form-input  name="whats"  label="whats" required="true" :value="$user->profile->whats" />
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <x-form-input  name="first_name"  label="First Name" required="true" :value="$user->profile->first_name" />
            </div>
            <div class="col-md-6">
                <x-form-input  name="last_name"  label="Last Name" :value="$user->profile->last_name" />
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <x-form-input type="date" name="birthday"  label="Birthday" :value="$user->profile->birthday" />
            </div>
            <div class="col-md-6">
                <x-form-radio name="gender" label="Gender" :options="['male' => 'Male', 'female' => 'Female']" selected="male" />

            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4">
                  <x-form-input  name="street_address"  label="Street Address" :value="$user->profile->strret_adderss" />
            </div>
            <div class="col-md-4">
                  <x-form-input  name="city"  label="City" :value="$user->profile->city" />
            </div>
            <div class="col-md-4">
                  <x-form-input  name="state"  label="State" :value="$user->profile->state" />
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4">
              <x-form-input  name="postal_code"  label="Postal Code" :value="$user->profile->postal_code" />
            </div>
            <div class="col-md-4">
               <x-form-select  name="country" default="Country" :options="$countries" label="Country" :selected="$user->profile->country" />
            </div>
            <div class="col-md-4">
               <x-form-select  name="local"  label="Local" default="Local" :options="$locales"  :selected="$user->profile->local" />
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4">
              <x-form-input  name="facebook"  label="Facebook" placeholder="https://" :value="$user->profile->facebook" />
            </div>
            <div class="col-md-4">
                <x-form-input  name="linkedin"  label="Linkedin" placeholder="https://" :value="$user->profile->linkedin" />
            </div>
            <div class="col-md-4">
                <x-form-input  name="twitter"  label="Twitter" placeholder="https://" :value="$user->profile->twitter" />
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4">
              <x-form-input  name="instagram"  label="Instagram" placeholder="https://" :value="$user->profile->instagram" />
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                @include('dashbourd.inc.logo', [
                    'model' =>$user->profile,
                    'name' => 'Card Photo',
                    'required'=>false
                ])
            </div>
        </div>

        <button  type="submit" id="submit-button" class="btn btn-primary mt-2">Save</button>
        
       
    </form>

  
@endsection
@push('spscripts')
 <script src="{{asset('dist/js/cusjs.js')}}"></script>
@endpush 
