@extends('layouts.admin')

@section('content')
    <div class="container-fluid p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h4 mb-0 text-gray-800 fw-bold">Users List</h2>
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary shadow-sm d-flex align-items-center gap-2">
                <i class="bi bi-person-plus-fill"></i> Add New User
            </a>
        </div>

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                        <tr>
                            <th class="border-0 px-4 py-3">ID</th>
                            <th class="border-0 py-3">Name</th>
                            <th class="border-0 py-3">Email</th>
                            <th class="border-0 py-3">Role</th>
                            <th class="border-0 py-3">Joined Date</th>
                            <th class="border-0 px-4 py-3 text-end">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td class="px-4 text-muted">#{{ $user->id }}</td>
                                <td class="fw-semibold text-dark">{{ $user->name }}</td>
                                <td class="text-muted">{{ $user->email }}</td>
                                <td>
                                    @foreach($user->roles as $role)
                                        @if($role->name == 'admin')
                                            <span class="badge bg-danger bg-opacity-10 text-danger border border-danger px-2 py-1 rounded-pill">Admin</span>
                                        @else
                                            <span class="badge bg-primary bg-opacity-10 text-primary border border-primary px-2 py-1 rounded-pill">User</span>
                                        @endif
                                    @endforeach
                                </td>
                                <td class="text-muted">{{ $user->created_at ? $user->created_at->format('d M Y') : 'N/A' }}</td>
                                <td class="px-4 text-end">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-light text-primary me-1" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light text-danger" onclick="return confirm('Bu kullanıcıyı silmek istediğinize emin misiniz?')" title="Delete">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    <i class="bi bi-people fs-1 d-block mb-2"></i>
                                    No users found in the system.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
