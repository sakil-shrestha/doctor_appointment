<x-layout.admin>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Doctor Information</h4>
                </div>
                <div class="card-body">

                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Full Name</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Contact Number</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="contact" value="9845678901">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Specialization</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="specialization" value="Cardiology">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Experience
                                Years</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="experience" value="5">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Add Your Bio</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="summernote"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Add Your Profile
                                Image</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="file" class="form-control" name="profile_image" value="">
                            </div>
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

</x-layout.admin>
