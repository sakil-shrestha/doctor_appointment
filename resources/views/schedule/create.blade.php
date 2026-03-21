<x-layout.admin>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-4">

                <div class="card-header bg-white border-0 pt-4">
                    <h4 class="fw-bold text-center">Doctor Schedule</h4>
                    <p class="text-muted text-center mb-0">Set your weekly availability</p>
                </div>

                <div class="card-body px-4 py-4">

                    <form action="{{ route('schedule.store') }}" method="POST">
                        @csrf

                        <!-- Full Name -->
                        <div class="mb-4 row align-items-center">
                            <label class="col-md-4 fw-semibold text-md-end">Week Day</label>
                            <div class="col-md-8">
                                <select class="form-select rounded-3" name="doctor_id">
                                    <option disabled selected>Select Doctor</option>
                                    @foreach ($doctors as $doctor)
                                        <option value="{{ $doctor->id }}">{{ $doctor->user->name }}</option>
                                    @endforeach
                                </select>
                                <small class="text-danger">{{ $errors->first('doctor_id') }}</small>
                            </div>
                        </div>

                        <!-- Week Day -->
                        <div class="mb-4 row align-items-center">
                            <label class="col-md-4 fw-semibold text-md-end">Week Day</label>
                            <div class="col-md-8">
                                <select class="form-select rounded-3" name="week_day">
                                    <option disabled selected>Select Day</option>
                                    <option value="Sun">Sunday</option>
                                    <option value="Mon">Monday</option>
                                    <option value="Tue">Tuesday</option>
                                    <option value="Wed">Wednesday</option>
                                    <option value="Thu">Thursday</option>
                                    <option value="Fri">Friday</option>
                                    <option value="Sat">Saturday</option>
                                </select>
                                <small class="text-danger">{{ $errors->first('week') }}</small>
                            </div>
                        </div>

                        <!-- Start Time -->
                        <div class="mb-4 row align-items-center">
                            <label class="col-md-4 fw-semibold text-md-end">Start Time</label>
                            <div class="col-md-8">
                                <input type="time" class="form-control rounded-3" name="start_time">
                                <small class="text-danger">{{ $errors->first('start_time') }}</small>
                            </div>
                        </div>

                        <!-- End Time -->
                        <div class="mb-4 row align-items-center">
                            <label class="col-md-4 fw-semibold text-md-end">End Time</label>
                            <div class="col-md-8">
                                <input type="time" class="form-control rounded-3" name="end_time">
                                <small class="text-danger">{{ $errors->first('end_time') }}</small>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="text-center mt-4">
                            <button class="btn btn-success px-5 py-2 rounded-pill shadow-sm">
                                Save Schedule
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout.admin>
