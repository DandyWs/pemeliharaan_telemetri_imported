@php $editing = isset($user) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $user->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.email
            name="email"
            label="Email"
            :value="old('email', ($editing ? $user->email : ''))"
            maxlength="255"
            placeholder="Email"
            required
        ></x-inputs.email>
    </x-inputs.group>

    <div class="col-sm-12">
        <label for="role" class="col-form-label text-md-end">{{ __('Role') }}</label>

        <div>
            <select id="role" name="role" class="form-control @error('role') is-invalid @enderror" required autocomplete="role">
                <option value="mekanik">Mekanik</option>
                <option value="manager">Ka. Tim Kalibrasi Divisi</option>
            </select>
            
            @error('role')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-12">
        <label for="profile_photo_path" class="col-form-label text-md-end">{{ __('Profile Photo') }}</label>

        <div>
            <input id="profile_photo_path" type="file" class="form-control @error('profile_photo_path') is-invalid @enderror" name="profile_photo_path" autocomplete="profile_photo_path" accept="image/png, image/jpg, image/jpeg">
            
            @error('profile_photo_path')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <x-inputs.group class="col-sm-12">
        <x-inputs.password
            name="password"
            label="Password"
            maxlength="255"
            placeholder="Password"
            :required="!$editing"
        ></x-inputs.password>
    </x-inputs.group>
</div>
