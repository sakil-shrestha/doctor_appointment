<x-layout.admin>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header flex justify-content-between">
                    <h4>Multi Select</h4>
                    <a href="{{ route('appointment.create') }}" class="btn btn-primary ">+ Add New</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-2">
                            <thead>
                                <tr>
                                    <th class="text-center pt-3">
                                        <div class="custom-checkbox custom-checkbox-table custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
                                                class="custom-control-input" id="checkbox-all">
                                            <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </th>
                                    <th>Patient Name</th>
                                    <th>Doctor Name</th>
                                    <th>Appointment Date</th>
                                    <th>Appointment Time</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($appointments as $appointment)
                                    <tr>
                                        <td class="text-center pt-2">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup"
                                                    class="custom-control-input" id="checkbox-1">
                                                <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>{{ $appointment->patient->name }}</td>
                                        <td>{{ $appointment->doctor->user->name }}</td>
                                        <td>{{ $appointment->appointment_date }}</td>
                                        <td>{{ $appointment->appointment_time }}</td>



                                        <td>

                                            <select class="status-dropdown" data-id="{{ $appointment->id }}">
                                                <option value="pending"
                                                    {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pending
                                                </option>
                                                <option value="confirmed"
                                                    {{ $appointment->status == 'confirmed' ? 'selected' : '' }}>
                                                    Confirmed</option>
                                                <option value="completed"
                                                    {{ $appointment->status == 'completed' ? 'selected' : '' }}>
                                                    Completed</option>
                                                <option value="canceled"
                                                    {{ $appointment->status == 'canceled' ? 'selected' : '' }}>Canceled
                                                </option>
                                            </select>

                                        </td>
                                        <td>
                                            <a href="{{ route('appointment.edit', $appointment->id) }}"
                                                class="btn btn-primary">Edit</a>
                                            <form action="{{ route('appointment.destroy', $appointment->id) }}"
                                                method='POST' style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        document.querySelectorAll('.status-dropdown').forEach(function(select) {
            select.addEventListener('change', function() {

                let appointmentId = this.getAttribute('data-id');
                let status = this.value;

                fetch(`/appointments/${appointmentId}/status`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            status: status
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Success:', data);

                        // Optional: show success message
                        alert('Status updated successfully');
                    })
                    .catch((error) => {
                        console.error('Error:', error);
                    });

            });
        });
    </script>
</x-layout.admin>
