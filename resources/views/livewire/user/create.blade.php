 <div class="row justify-content-center">
     <div class="col-md-8">
         <div class="card mb-4">
             <div class="card-header py-3">
                 <h6 class="m-0 fw-bold">Form Pengguna</h6>
             </div>
             <div class="card-body">
                 <form wire:submit.prevent="store">
                     <div class="mb-3">
                         <input wire:model="name" type="text" class="form-control" placeholder="Nama">
                         @error('name') <span class="small text-danger">{{ $message }}</span> @enderror
                     </div>
                     <div class="mb-3">
                         <input wire:model="email" type="email" class="form-control" placeholder="Email">
                         @error('email') <span class="small text-danger">{{ $message }}</span> @enderror
                     </div>
                     <div class="mb-3">
                         <input wire:model="password" type="password" class="form-control" placeholder="Password">
                         @error('password') <span class="small text-danger">{{ $message }}</span> @enderror
                     </div>
                     <div class="mb-3">
                         <div class="form-check form-check-inline">
                             <input wire:model="role" name="role" class="form-check-input" type="radio" id="admin"
                                 value="admin">
                             <label class="form-check-label" for="admin">Admin</label>
                         </div>
                         <div class="form-check form-check-inline">
                             <input wire:model="role" name="role" class="form-check-input" type="radio" id="customer"
                                 value="customer">
                             <label class="form-check-label" for="customer">Customer</label>
                         </div>
                         @error('role') <div class="small text-danger">{{ $message }}</div> @enderror
                     </div>
                     <div class="mb-3">
                         <div class="form-check form-check-inline">
                             <input wire:model="status" name="status" class="form-check-input" type="radio" id="active"
                                 value="active">
                             <label class="form-check-label" for="active">Aktif</label>
                         </div>
                         <div class="form-check form-check-inline">
                             <input wire:model="status" name="status" class="form-check-input" type="radio"
                                 id="notActive" value="not active">
                             <label class="form-check-label" for="notActive">Tidak Aktif</label>
                         </div>
                         @error('status') <div class="small text-danger">{{ $message }}</div> @enderror
                     </div>
                     <button type="submit" class="btn btn-sm btn-success">Submit</button>
                     <button wire:click="$emit('closeForm')" type="button" class="btn btn-sm btn-danger">Close</button>
                 </form>
             </div>
         </div>
     </div>
 </div>
