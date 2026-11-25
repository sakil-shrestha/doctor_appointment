<x-layout.admin>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header flex justify-content-between">
                    <h4>Schedule Management</h4>
                    @can('create schedule')
                    <a href="{{ route('schedule.create') }}" class="btn btn-primary ">+ Add New</a>
                    @endcan
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
                                    <th>Doctor Name</th>
                                    <th>Week Day</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($schedules as $schedule)

                                    <tr>
                                        <td class="text-center pt-2">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup"
                                                    class="custom-control-input" id="checkbox-1">
                                                <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>{{ $schedule->doctor->user->name }}</td>
                                        <td>{{ $schedule->day }}</td>
                                        <td>{{ $schedule->start_time }}</td>
                                        <td>{{ $schedule->end_time }}</td>

                                        <td>
                                            @can('edit schedule')
                                            <a href="{{route('schedule.edit',$schedule->id)}}" class="btn btn-primary">Edit</a>
                                            @endcan
                                            @can('delete schedule')
                                            <form action="{{route('schedule.destroy',$schedule->id)}}" method='POST' style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
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
</x-layout.admin>
