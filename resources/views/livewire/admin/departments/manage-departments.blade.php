<div>
    {{-- Be like water. --}}

    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>Departments</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Departments</li>

                </ol>
            </div>
            <div class="col-sm-6">
                <!-- Bookmark Start-->
                <div class="bookmark">
                    <ul>

                        <li>
                            <a href="{{ route('admin.add-department') }}"
                                class="btn btn-pill btn-primary btn-air-primary" type="button">
                                <i class="fas fa-plus">

                                </i>
                            </a>

                        </li>
                    </ul>
                </div>
                <!-- Bookmark Ends-->
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5>Departments Data</h5>
                <div class="search-bg d-flex">
                    <input class="form-control-plaintext" placeholder="Search here....." wire:model="searchTerm">
                    <div wire:loading.delay wire:target="searchTerm" class="loader-box">
                        <div class="loader-30"></div>
                    </div>
                </div>
            </div>
            <div class="card-block row">
                <div class="col-sm-12 col-lg-12 col-xl-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Emal</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($departments as $department)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="align-middle text-nowrap">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar">
                                                    @if ($department->avatar_url)
                                                        <img src="{{ $department->avatar_url }}"
                                                            class="img-30 rounded-circle mr-5" alt="">
                                                    @else
                                                        <div class="badge rounded-pill badge-success">
                                                            <span>{{ Str::substr($department->name, 0, 1) }}</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="ms-2">{{ $department->name }}</div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-nowrap">
                                            <span
                                                class="badge rounded-pill badge-success">{{ $department->email }}</span>
                                        </td>

                                        <td class="align-middle text-nowrap">{{ $department->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.department.edit', $department) }}">
                                                <i class="fas fa-edit mr-2"></i>
                                            </a>
                                            <a href=""
                                                wire:click.prevent="confirmDepartmentRemoval({{ $department->id }})">
                                                <i class="fas fa-trash text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="8">
                                            <img src="{{ asset('assets/images/void.svg') }}" alt="No Result Found."
                                                width="100">
                                            <p class="mt-2">No Results Found!</p>
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card-footer d-flex justify-content-end">
                {{ $departments->links() }}
            </div>

        </div>
    </div>
    <x-inputs.confirmation-alert />
</div>
