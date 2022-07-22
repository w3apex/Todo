<div class="form-row">
    <div class="form-group col-md-6">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="{{ old('name', isset($user) ? $user->name : '' )}}" class="form-control" placeholder="Enter name">
        
        <p class="text-danger">
            {{ $errors->first('name')}}
        </p>
    </div>
    <div class="form-group col-md-6">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email', isset($user) ? $user->email : '' )}}" class="form-control" placeholder="Enter email">
        
        <p class="text-danger">
            {{ $errors->first('email')}}
        </p>
    </div>
</div>

@if(empty($user))
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Enter password">
            
            <p class="text-danger">
                {{ $errors->first('name')}}
            </p>
        </div>
        <div class="form-group col-md-6">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Enter email">
            
            <p class="text-danger">
                {{ $errors->first('email')}}
            </p>
        </div>
    </div>
@endif

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="roles">Assign Roles</label>
        <select name="roles[]" class="form-control select2" id="roles" multiple>
            <option value="">Select Roles</option>
            @foreach ($roles as $role)
                <option value="{{ $role->name }}" {{ isset($user) ? ($user->hasRole($role->name) ? 'selected' : '') : '' }} >{{ $role->name }}</option>
            @endforeach
        </select>
        <p class="text-danger">
            {{ $errors->first('roles')}}
        </p>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12">
        <button type="submit" class="btn btn-success waves-effect waves-light m-1"><i class="fe-check-circle mr-1"></i> {{ $buttonText }}</button>
    </div>
</div>