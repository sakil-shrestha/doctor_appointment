<x-layout.admin>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Doctor Information</h4>
                </div>
                <div class="card-body">

                    <form action="{{route('doctor.update',$doctor->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Full Name</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="name" value="{{ $doctor->user->name }}" >
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Contact Number</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="contact" >
                                <span class="text-danger">{{ $errors->first('contact') }}</span>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Specialization</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="specialization" >
                                <span class="text-danger">{{ $errors->first('specialization') }}</span>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Experience
                                Years</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="experience_year" >
                                <span class="text-danger">{{ $errors->first('experience_year') }}</span>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Add Your Bio</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="summernote" name="bio"></textarea>
                                <span class="text-danger">{{ $errors->first('bio') }}</span>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Add Your Profile
                                Image</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="file" class="form-control" name="profile_image">
                                <span class="text-danger">{{ $errors->first('profile_image') }}</span>
                            </div>
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

</x-layout.admin>
