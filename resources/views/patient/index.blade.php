<x-layout.admin>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header flex justify-content-between">
                    <h4>Multi Select</h4>
                    <a href="{{ route('patient.create') }}" class="btn btn-primary ">+ Add New</a>
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
                                    <th>Full Name</th>
                                    <th>Email</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($patients as $patient)
                                    <tr>
                                        <td class="text-center pt-2">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup"
                                                    class="custom-control-input" id="checkbox-1">
                                                <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>{{ $patient->name }}</td>
                                        <td>{{ $patient->email }}</td>

                                        <td>
                                            <a href="{{route('patient.edit',$patient->id)}}" class="btn btn-primary">Edit</a>
                                            <form action="{{route('patient.destroy',$patient->id)}}" method='POST' style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
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
</x-layout.admin>
