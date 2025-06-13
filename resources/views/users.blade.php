@extends('layouts.tabler')

@section('content')
    <div class="container-xl">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                <h3 class="card-title mb-2 mb-md-0">Users</h3>

                <div class="d-flex flex-wrap gap-2">
                    <form method="GET" action="{{ route('users') }}" class="input-icon">
            <span class="input-icon-addon">
                <i class="ti ti-search"></i>
            </span>
                        <input type="text" class="form-control" placeholder="Search…" id="searchInput" name="search" value="{{ request('search') }}">
                    </form>

                    <a href="{{ route('users.export') }}" class="btn btn-outline-primary d-flex align-items-center">
                        <i class="ti ti-download me-1"></i> Export CSV
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>DOB</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Status</th>
                        <th class="w-1"></th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="userTableBody">
                    @foreach ($users as $user)
                        <tr>
                            <td class="text-secondary">{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->date_of_birth }}</td>
                            <td>{{ $user->city }}</td>
                            <td>{{ $user->country }}</td>
                            <td>
                                    <span class="badge bg-{{ $user->status === 'Active' ? 'green' : 'red' }}-lt">
                                        <span class="badge-dot bg-{{ $user->status === 'Active' ? 'green' : 'red' }}"></span>
                                        {{ $user->status }}
                                    </span>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <a href="#" class="btn-action" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#userModal{{ $user->id }}">
                                            View
                                        </a>
                                        <a class="dropdown-item text-danger" href="#">
                                            Delete
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-sm btn-primary">
                                    Edit
                                </a>
                                <!-- Delete Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-danger ms-1" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $user->id }}">
                                    Delete
                                </button>
                            </td>
                        </tr>

                        <!-- User Details Modal -->
                        <div class="modal modal-blur fade" id="userModal{{ $user->id }}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">User Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <dl class="row">
                                            <dt class="col-sm-4">Name</dt>
                                            <dd class="col-sm-8">{{ $user->name }}</dd>
                                            <dt class="col-sm-4">Email</dt>
                                            <dd class="col-sm-8">{{ $user->email }}</dd>
                                            <dt class="col-sm-4">Phone</dt>
                                            <dd class="col-sm-8">{{ $user->phone }}</dd>
                                            <dt class="col-sm-4">DOB</dt>
                                            <dd class="col-sm-8">{{ $user->date_of_birth }}</dd>
                                            <dt class="col-sm-4">Address</dt>
                                            <dd class="col-sm-8">{{ $user->address }}</dd>
                                            <dt class="col-sm-4">Occupation</dt>
                                            <dd class="col-sm-8">{{ $user->occupation }}</dd>
                                            <dt class="col-sm-4">Status</dt>
                                            <dd class="col-sm-8">{{ $user->status }}</dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal modal-blur fade" id="confirmDeleteModal{{ $user->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Confirm Delete</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete user <strong>{{ $user->name }}</strong>?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer d-flex justify-content-between align-items-center">
                <div>
                    @if($users->count())
                        <div>
                            Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} results
                        </div>
                    @endif
                </div>
                <div>
                    {{ $users->links('vendor.pagination.simple-bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
