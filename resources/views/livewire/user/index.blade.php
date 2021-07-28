<div class="container py-3">
    @if ($formVisible)
        @livewire('user.create')
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header py-3">
                    <span class="m-0 fw-bold h6">Pengguna</span>
                    <span wire:click="openCreateForm" class="btn btn-sm btn-primary">
                        Tambah
                    </span>
                </div>
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session()->has('failed'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            {{ session('failed') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col">
                            <select wire:model="paginate" class="form-select form-select-sm w-auto">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                            </select>
                        </div>
                        <div class="col">
                            <input wire:model="search" type="text" class="form-control form-control-sm"
                                placeholder="Search">
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>
                                            <span class="badge rounded-pill
                                            {{ $user->status === 'active' ? 'bg-success' : 'bg-danger' }}">
                                                {{ $user->status }}
                                            </span>
                                        </td>
                                        <td>
                                            <img src="@empty($user->photo) https://via.placeholder.com/300 @else {{ asset("storage/$user->photo") }} @endempty"
                                                alt="" style="height: 150px">
                                        </td>
                                        <td>
                                            <span wire:click="deleteUser({{ $user->id }})" class="btn btn-sm">
                                                <i class="fas fa-trash text-danger"></i>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
