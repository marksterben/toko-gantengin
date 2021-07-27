 <div class="row justify-content-center">
     <div class="col-md-8">
         <div class="card mb-4">
             <div class="card-header py-3">
                 <h6 class="m-0 fw-bold">Form Produk</h6>
             </div>
             <div class="card-body">
                 <form wire:submit.prevent="store">
                     <div class="row mb-3">
                         <div class="col">
                             <input wire:model="name" type="text" class="form-control" placeholder="Nama">
                             @error('name') <span class="small text-danger">{{ $message }}</span> @enderror
                         </div>
                         <div class="col">
                             <input wire:model="price" type="text" class="form-control" placeholder="Harga">
                             @error('price') <span class="small text-danger">{{ $message }}</span> @enderror
                         </div>
                     </div>
                     <div class="mb-3">
                         <textarea wire:model="description" class="form-control" placeholder="Deskripsi"
                             rows="3"></textarea>
                         @error('description') <span class="small text-danger">{{ $message }}</span> @enderror
                     </div>
                     <div class="mb-3">
                         <input wire:model="image" type="file">
                         @if ($image)
                             <div>
                                 <img src="{{ $image->temporaryUrl() }}" style="height: 200px">
                             </div>
                         @endif
                         @error('image') <span class="small text-danger">{{ $message }}</span> @enderror
                     </div>
                     <div class="mb-3">
                         <div class="form-check form-check-inline">
                             <input wire:model="status" name="status" class="form-check-input" type="radio"
                                 id="available" value="available">
                             <label class="form-check-label" for="available">Tersedia</label>
                         </div>
                         <div class="form-check form-check-inline">
                             <input wire:model="status" name="status" class="form-check-input" type="radio"
                                 id="unavailable" value="unavailable">
                             <label class="form-check-label" for="unavailable">Tidak Tersedia</label>
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
