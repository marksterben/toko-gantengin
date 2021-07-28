<div class="row">
    <div class="col-10">
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 fw-bold">Edit Profil</h6>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="update">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input wire:model="user.name" type="text" class="form-control" id="name">
                        @error('user.name') <span class="small text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input wire:model="password" type="password" class="form-control" id="password">
                        @error('password') <span class="small text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <input wire:model="photo" type="file">
                        @if ($photo)
                            <div>
                                <img src="{{ $photo->temporaryUrl() }}" style="height: 100px">
                            </div>
                        @elseif ($user->photo)
                            <div>
                                <img src="{{ asset("storage/$user->photo") }}" style="height: 100px">
                            </div>
                        @endif
                        @error('photo') <span class="small text-danger">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"
                        aria-label="Close">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
