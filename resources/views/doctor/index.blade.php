<x-layout.admin>

    <style>
        .search-form{
            display:flex;
            align-items: center;
            justify-content: center;
            gap:8px;
            width:50%;


        }
    </style>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header flex justify-content-between">
                    <h4>Doctor Management</h4>
                    <form action="{{route('doctor.index')}}" class="search-form">
                        <input class="form-control" type="text" name="search" placeholder="search by name or category">

                        <button class="btn btn-success" type="submit">Search</button>
                    </form>
                    @can('create doctor')
                    <a href="{{ route('doctor.create') }}" class="btn btn-primary ">+ Add New</a>
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
                                    <th>Full Name</th>
                                    <th>Contact</th>
                                    <th>Specialization</th>
                                    <th>Bio</th>
                                    <th>Profile Image</th>
                                    <th>Experience</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($doctors as $user)


                                    <tr>
                                        <td class="text-center pt-2">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup"
                                                    class="custom-control-input" id="checkbox-1">
                                                <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->doctor?->contact?? 'N/A' }}</td>
                                        <td>{{ $user->doctor?->specialization ?? 'N/A' }}</td>
                                        <td>
                                            <div class="bio-content text-truncate" style="max-width: 200px;">
                                                {!! $user->doctor?->bio !!}
                                            </div>
                                        </td>
                                        <td>
                                            <img alt="image" src="{{ $user->doctor?->profile_image }}" width="35">
                                        </td>
                                        <td>{{ $user->doctor?->experience_years ?? 'N/A' }} years</td>
                                        <td>
                                            <div class="badge badge-success badge-shadow">{{ $user->doctor?->status ?? 'N/A' }}</div>
                                        </td>
                                        <td>
                                            @can('edit doctor')
                                            <a href="{{route('doctor.edit',$user->id)}}" class="btn btn-primary">Edit</a>
                                            @endcan
                                                @can('delete doctor')
                                            <form action="{{route('doctor.destroy',$user->id)}}" method='POST' style="display: inline;">
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
