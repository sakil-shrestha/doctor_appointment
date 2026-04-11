<x-layout.admin>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Permission Information</h4>
                </div>
                <div class="card-body">

                    <form action="{{route('permissions.store')}}" method="POST" >
                        @csrf
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Permission Name</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="name" value={{old('name')}}>
                            </div>
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>


                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>


                    </form>
                </div>


            </div>
        </div>
    </div>
    </div>

</x-layout.admin>
