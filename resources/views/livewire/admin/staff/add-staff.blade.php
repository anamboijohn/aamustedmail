<div>
    {{-- The best athlete wants his opponent at his best. --}}

    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>Staff</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Add Staff Forms</li>

                </ol>
            </div>
            <div class="col-sm-6">
                <!-- Bookmark Start-->
                <div class="bookmark">
                    <ul>

                        <li><a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-star bookmark-search">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                    </polygon>
                                </svg></a>
                            <form class="form-inline search-form">
                                <div class="form-group form-control-search">
                                    <input type="text" placeholder="Search..">
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
                <!-- Bookmark Ends-->
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <form wire:submit.prevent="createUser" autocomplete="off">
                            <div class="card-header pb-0">
                                <h5>Staff Form</h5>
                            </div>
                            <div class="card-body">

                                <h6>Add Account</h6>
                                <div class="row">
                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label" for="basic-form-name">Name:</label>
                                        <input wire:model.defer="state.name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            id="basic-form-name" type="text" placeholder="Name" />
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label" for="basic-form-email">Email address:</label>
                                        <input wire:model.defer="state.email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            id="basic-form-email" type="email" placeholder="name@example.com" />
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label" for="basic-form-staff_id">Staff ID:</label>
                                        <input wire:model.defer="state.staff_id"
                                            class="form-control @error('staff_id') is-invalid @enderror"
                                            id="basic-form-staff_id" type="text" placeholder="K0****" />
                                        @error('staff_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label" for="basic-form-phone">Phone:</label>
                                        <input wire:model.defer="state.phone"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            id="basic-form-phone" type="phone" placeholder="0*********" />
                                        @error('phone')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label" for="basic-form-department">Department:</label>

                                        <select wire:model.defer="state.department"
                                            class="form-control btn-square  @error('department') is-invalid @enderror"
                                            id="formcontrol-select1">

                                            <option selected>Select Department</option>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->name }}">{{ $department->name }}</option>
                                            @endforeach

                                        </select>

                                        @error('department')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label" for="basic-form-gender">Gender:</label>
                                        <select wire:model.defer="state.gender"
                                            class="form-control btn-square  @error('gender') is-invalid @enderror"
                                            id="formcontrol-select1">

                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>

                                        </select>
                                        @error('gender')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 mb-3">
                                        <label class="form-label" for="basic-form-address">Address:</label>
                                        <input wire:model.defer="state.address"
                                            class="form-control @error('address') is-invalid @enderror"
                                            id="basic-form-address" type="text" placeholder="Address" />
                                        @error('address')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label" for="basic-form-password">Password</label>
                                        <input type="password" wire:model.defer="state.password" id="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Password" />
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label" for="basic-form-password">Confirm Password</label>
                                        <input wire:model.defer="state.password_confirmation"
                                            id="password_confirmation" class="form-control"
                                            aria-describedby="passwordHelpBlock" placeholder="Confirm password"
                                            type="password" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Upload Image</label>
                                        <div x-data="{ isUploading: false, progress: 5 }" x-on:livewire-upload-start="isUploading = true"
                                            x-on:livewire-upload-finish="isUploading = false; progress = 5"
                                            x-on:livewire-upload-error="isUploading = false"
                                            x-on:livewire-upload-progress="progress = $event.detail.progress">
                                            <input wire:model="photo" type="file" class="form-control"
                                                id="customFile">
                                            <div x-show.transition="isUploading" class="progress">
                                                <div class="progress-bar-animated bg-primary progress-bar-striped"
                                                    role="progressbar" style="width: 10%" aria-valuenow="0"
                                                    aria-valuemin="0" aria-valuemax="100"
                                                    x-bind:style="`width: ${progress}%`"></div>
                                            </div>
                                        </div>
                                        @if ($photo)
                                            <div class="position-relative bg-200" style="height: 200px;">
                                                <img src="{{ $photo->temporaryUrl() }}"
                                                    class="rounded-circle position-absolute top-50 start-50 translate-middle mt-2 mb-2"
                                                    width="150" height="150">
                                            </div>
                                        @else
                                            <div class="position-relative bg-200" style="height: 200px;">
                                                <img src="{{ asset('assets/images/dashboard/1.png') }}"
                                                    class="rounded-2 position-absolute top-50 start-50 translate-middle mt-2 mb-2"
                                                    width="150" height="150">
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary" type="submit">Submit</button>
                                <button class="btn btn-secondary" type="reset">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
