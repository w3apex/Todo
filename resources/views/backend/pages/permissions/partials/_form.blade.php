<div class="row">
    <div class="col-xl-6">
        <div class="form-group">
            <label for="group_name">Group Name</label>
            <input type="text" id="group_name" name="group_name" value="{{ old('group_name', isset($permission) ? $permission->group_name : '' )}}" class="form-control" placeholder="Enter group name">
            
            <p class="text-danger">
                {{ $errors->first('group_name')}}
            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-6">
        <div class="form-group">
            <label for="name">Permission Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', isset($permission) ? $permission->name : '' )}}" class="form-control" placeholder="Enter permission name">
            
            <p class="text-danger">
                {{ $errors->first('name')}}
            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-6">
        <div class="form-group">
            <label for="guard_name">Guard Name</label>
            <input type="text" id="guard_name" name="guard_name" value="{{ old('guard_name', isset($permission) ? $permission->guard_name : '' )}}" class="form-control" placeholder="Enter guard name">
            
            <p class="text-danger">
                {{ $errors->first('guard_name')}}
            </p>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12">
        <button type="submit" class="btn btn-success waves-effect waves-light m-1"><i class="fe-check-circle mr-1"></i> {{ $buttonText }}</button>
    </div>
</div>