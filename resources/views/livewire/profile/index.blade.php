<div class="container">
    <div class="row mt-3">
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    Menu
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="{{ route('profile') }}" class="text-decoration-none">
                            Profil Saya
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('myorder') }}" class="text-decoration-none">
                            Pesanan Saya
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-9">
            @if ($edit)
                @livewire('profile.update', ['user' => $user])
            @endif
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
                <div class="col-4">
                    <img src="@empty($user->photo) https://via.placeholder.com/300 @else {{ asset("storage/$user->photo") }} @endempty"
                        class="img-thumbnail img-fluid" alt="">
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">
                                Name : {{ $user->name }}
                            </p>
                            <p class="card-text">
                                E-mail : {{ $user->email }}
                            </p>
                            <button wire:click="openForm" type="button" class="btn btn-primary">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
