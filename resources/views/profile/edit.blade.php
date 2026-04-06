<x-layout.admin>

    <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Profile</div>
        </div>
    </div>

    <div class="section-body">

        {{-- Profile Header Card --}}
        <div class="card mb-4">
            <div class="card-body py-4">
                <div class="d-flex align-items-center">
                    <div class="mr-4">
                        <div
                            style="width:72px;height:72px;border-radius:50%;background:#6777ef;display:flex;align-items:center;justify-content:center;font-size:28px;font-weight:600;color:#fff;">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                    </div>
                    <div>
                        <h5 class="mb-0 font-weight-bold">{{ auth()->user()->name }}</h5>
                        <p class="text-muted mb-0">{{ auth()->user()->email }}</p>
                        <span class="badge badge-primary mt-1">Active</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            {{-- Update Profile Information --}}
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-user mr-2 text-primary"></i>Profile Information</h4>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-4" style="font-size:13px;">
                            Update your account's profile information and email address.
                        </p>

                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', auth()->user()->name) }}" required autofocus
                                    autocomplete="name">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', auth()->user()->email) }}" required autocomplete="username">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !auth()->user()->hasVerifiedEmail())
                                <div class="alert alert-warning py-2" style="font-size:13px;">
                                    <i class="fas fa-exclamation-triangle mr-1"></i>
                                    Your email address is unverified.
                                    <button form="send-verification" class="btn btn-link p-0 align-baseline"
                                        style="font-size:13px;">
                                        Click here to re-send the verification email.
                                    </button>
                                </div>
                                @if (session('status') === 'verification-link-sent')
                                    <div class="alert alert-success py-2" style="font-size:13px;">
                                        <i class="fas fa-check-circle mr-1"></i>
                                        A new verification link has been sent to your email address.
                                    </div>
                                @endif
                            @endif

                            <div class="d-flex align-items-center">
                                <button type="submit" class="btn btn-primary mr-3">
                                    <i class="fas fa-save mr-1"></i> Save Changes
                                </button>
                                @if (session('status') === 'profile-updated')
                                    <span class="text-success" style="font-size:13px;">
                                        <i class="fas fa-check-circle mr-1"></i> Saved successfully.
                                    </span>
                                @endif
                            </div>
                        </form>

                        {{-- Hidden verification form --}}
                        <form id="send-verification" method="POST" action="{{ route('verification.send') }}"
                            class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>

            {{-- Update Password --}}
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-lock mr-2 text-warning"></i>Update Password</h4>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-4" style="font-size:13px;">
                            Ensure your account is using a long, random password to stay secure.
                        </p>

                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <input id="current_password" type="password" name="current_password"
                                    class="form-control @error('current_password', 'updatePassword') is-invalid @enderror"
                                    autocomplete="current-password">
                                @error('current_password', 'updatePassword')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input id="password" type="password" name="password"
                                    class="form-control @error('password', 'updatePassword') is-invalid @enderror"
                                    autocomplete="new-password">
                                @error('password', 'updatePassword')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirm New Password</label>
                                <input id="password_confirmation" type="password" name="password_confirmation"
                                    class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror"
                                    autocomplete="new-password">
                                @error('password_confirmation', 'updatePassword')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex align-items-center">
                                <button type="submit" class="btn btn-warning mr-3">
                                    <i class="fas fa-key mr-1"></i> Update Password
                                </button>
                                @if (session('status') === 'password-updated')
                                    <span class="text-success" style="font-size:13px;">
                                        <i class="fas fa-check-circle mr-1"></i> Password updated.
                                    </span>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Delete Account --}}


            <div class="col-12">
                <div class="card border-danger">
                    <div class="card-header bg-danger text-white">
                        <h4 class="mb-0"><i class="fas fa-exclamation-triangle mr-2"></i>Delete Account</h4>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-3" style="font-size:13px;">
                            Once your account is deleted, all of its resources and data will be permanently deleted.
                            Before deleting your account, please download any data or information that you wish to
                            retain.
                        </p>

                        {{-- <button class="btn btn-danger" data-toggle="modal" data-target="#deleteAccountModal">
                            <i class="fas fa-trash mr-1"></i> Delete Account
                        </button> --}}
                        <form action="{{ route('profile.destroy') }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash mr-1"></i>Delete Account</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>{{-- end row --}}
    </div>{{-- end section-body --}}

    {{-- Delete Account Modal --}}
    {{-- <div class="modal fade" id="deleteAccountModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">
                        <i class="fas fa-exclamation-triangle mr-2"></i>Are you sure?
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-muted" style="font-size:13px;">
                        Once your account is deleted, all of its resources and data will be permanently deleted.
                        Please enter your password to confirm you would like to permanently delete your account.
                    </p>

                    <form method="POST" action="{{ route('profile.destroy') }}" id="deleteAccountForm">
                        @csrf
                        @method('DELETE')

                        <div class="form-group">
                            <label for="delete_password">Password</label>
                            <input id="delete_password" type="password" name="password"
                                class="form-control @error('password', 'userDeletion') is-invalid @enderror"
                                placeholder="Enter your password to confirm">
                            @error('password', 'userDeletion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i> Cancel
                    </button>
                    <button type="submit" form="deleteAccountForm" class="btn btn-danger">
                        <i class="fas fa-trash mr-1"></i> Delete Account
                    </button>
                </div>
            </div>
        </div>
    </div>

    @if ($errors->userDeletion->isNotEmpty())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                $('#deleteAccountModal').modal('show');
            });
        </script>
    @endif --}}

</x-layout.admin>
