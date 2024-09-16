<div class="container my-5">
    <div class="mx-2">
        <h2 class="fw-bold fs-2 mb-5 pb-2">Edit USER</h2>
        <form method="POST" action="{{ route('users.update', $user['id']) }}" class="form-horizontal form-label-left">
            @csrf
            @method('put')
            <div class="form-group mb-3 row">
                <label for="" class="form-label col-md-2 fw-bold text-md-end">Name:</label>
                <div class="col-md-5">
                    <input type="text" placeholder="First Name" name="firstName"
                        value="{{ old('firstName', $user['firstName']) }}"class="form-control py-2" />
                    @error('firstName')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-5">
                    <input type="text" placeholder="Last Name" name="lastName"
                        value="{{ old('lastName', $user['lastName']) }}" class="form-control py-2" />
                    @error('lastName')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="" class="form-label col-md-2 fw-bold text-md-end">UserName:</label>
                <div class="col-md-10">
                    <input type="text" placeholder="e.g. Jhon33" name="userName"
                        value="{{ old('userName', $user['userName']) }}"class="form-control py-2" />
                    @error('userName')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="" class="form-label col-md-2 fw-bold text-md-end">Email:</label>
                <div class="col-md-10">
                    <input type="email" placeholder="e.g. Jhon@example.com" name="email"
                        value="{{ old('email', $user['email']) }}" class="form-control py-2" />
                    @error('email')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="" class="form-label col-md-2 fw-bold text-md-end">Password:</label>
                <div class="col-md-10">
                    <input type="password" placeholder="Password" name="password" value="{{ old('password') }}"
                        class="form-control py-2" />
                    @error('password')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="" class="form-label col-md-2 fw-bold text-md-end">Active:</label>
                <div class="col-md-10">
                    <input type="hidden" name="active" value="0">
                    <input type="checkbox" class="form-check-input" name="active" style="padding: 0.7rem;"
                        value="1" @checked(old('active', $user->active)) />
                    @error('active')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="text-md-end">
                <button type="submit" class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
                    Edit User
                </button>
            </div>
        </form>
    </div>
</div>
</main>
