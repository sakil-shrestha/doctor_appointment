<x-layout.admin>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Doctor Information</h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('doctor.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Full Name</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="name">
                            </div>
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Contact Number</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="contact">
                            </div>
                            <span class="text-danger">{{ $errors->first('contact') }}</span>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Specialization</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="specialization">
                            </div>
                            <span class="text-danger">{{ $errors->first('specialization') }}</span>

                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Experience
                                Years</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="experience_year">
                            </div>
                            <span class="text-danger">{{ $errors->first('experience_year') }}</span>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Add Your Bio</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="summernote" name="bio"></textarea>
                            </div>
                            <span class="text-danger">{{ $errors->first('bio') }}</span>
                        </div>
                        <div class="form-group row mb-4">
                            <div class="control-label">Status</div>
                            <div class="custom-switches-stacked mt-2">
                                <label class="custom-switch">
                                    <input type="radio" name="status" value="1" class="custom-switch-input"
                                        checked>
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">Active</span>
                                </label>
                                <label class="custom-switch">
                                    <input type="radio" name="status" value="0" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">Inactive</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Add Your Profile
                                Image</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="file" class="form-control" name="profile_image">
                            </div>
                            <span class="text-danger">{{ $errors->first('profile_image') }}</span>
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
