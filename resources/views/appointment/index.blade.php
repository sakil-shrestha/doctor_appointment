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

                                            <select class="status-dropdown" data-id="{{ $appointment->id }}"
                                                onchange="updateStatus(this, {{ $appointment->id }})">
                                                <option value="pending"
                                                    {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pending
                                                </option>
                                                <option value="confirmed"
                                                    {{ $appointment->status == 'confirmed' ? 'selected' : '' }}>
                                                    Confirmed</option>
                                                <option value="completed"
                                                    {{ $appointment->status == 'completed' ? 'selected' : '' }}>
                                                    Completed</option>
                                                <option value="cancelled"
                                                    {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>
                                                    Cancelled</option>
                                            </select>

                                        </td>
                                        <td>
                                            @can('edit appointment')
                                            <a href="{{ route('appointment.edit', $appointment->id) }}"
                                                class="btn btn-primary">Edit</a>
                                                @endcan

                                            @can('delete appointment')

                                            <form action="{{ route('appointment.destroy', $appointment->id) }}"
                                                method='POST' style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                            @endcan
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
        function updateStatus(select, id) {
            fetch(`/appointments/${id}/status`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify({
                        status: select.value
                    }),
                })
                .then(res => res.json())
                .then(data => alert(data.message))
                .catch(() => alert('Failed to update status.'));
        }
    </script>
</x-layout.admin>
