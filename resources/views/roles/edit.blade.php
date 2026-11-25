<x-layout.admin>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Roles Information</h4>
                </div>
                <div class="card-body">

                    <form action="{{route('roles.update',$role->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Roles Name</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="name" value="{{ old('name', $role->name) }}">
                            </div>
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-3">
                            @isset($permissions)
                                @foreach ($permissions as $permission)
                                    <div class="flex items-center space-x-2">
                                        <input type="checkbox" id="perm-{{ $permission->id }}" name="permission[]"
                                            value="{{ $permission->name }}" {{$hasPermissions->contains($permission->name)?'checked':''}}
                                            class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        <label for="perm-{{ $permission->id }}"
                                            class="text-sm font-medium text-gray-700 cursor-pointer">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                @endforeach
                            @endisset
                        </div>


                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </div>


                    </form>
                </div>


            </div>
        </div>
    </div>
    </div>

</x-layout.admin>
