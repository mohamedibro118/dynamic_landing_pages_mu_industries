    <div class="my-3">
        <!-- Name -->
        <div class="form-group " >
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name',$admin->name)" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="form-group mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email',$admin->email)" required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="form-group mt-4">
            <x-input-label for="username" :value="__('UserName')" />
            <x-text-input id="username" class="form-control" type="text" name="username" :value="old('username',$admin->username)"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>
        <div class="form-group mt-4">
            <x-input-label for="phone_number" :value="__('Phone Number')" />
            <x-text-input id="phone_number" class="form-control" type="text" name="phone_number"
                :value="old('phone_number',$admin->phone_number)" required autofocus autocomplete="phone_number" />
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="form-group mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="form-control" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="form-group mt-4">

            <x-form-select-local-woutselect2 label="Company Name"  name="agent_id"  default="Company Name" :options="$agents" :selected="$admin->agent_id"/>
        </div>
        <div class="col-md-12 mt-2">
            @php
            $rolesid=[];
            if ($admin->roles) {
                foreach ($admin->roles as $item) {
                $rolesid[]=$item->id;
            } 
            }
            @endphp
            <x-roles label="Roles" name="roles[]" :options="$roles" :value="$rolesid" />
        </div>

       

        <div class="form-group flex items-center justify-end mt-4">
            <x-primary-button class="ml-4 btn-sm btn-dark" id="submit-button">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </div>
