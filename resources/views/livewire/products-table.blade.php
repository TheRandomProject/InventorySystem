<div class="row">
    <div class="col py-4">

        <div class="col-md-12 mt-2">
            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
        </div>

        <div class="card card-small mb-4">
            <div class="card-header border-bottom">
                <div class="row">
                    <div class="col-md-12 text-center my-2">
                        <h6 class="m-0">List Of Products</h6>
                    </div>
                    <div class="col-md-7">
                        <input wire:model.debounce.300ms="search" type="text"
                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                            placeholder="Search Product...">
                    </div>
                    <div class="col-md-2">
                        <select wire:model="orderBy"
                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                            <option value="id">ID</option>
                            <option value="name">Name</option>
                            <option value="price">Price</option>
                            <option value="brand">Brand</option>
                            <option value="stock">Stock</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select wire:model="orderAsc"
                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                            <option value="1">Ascending</option>
                            <option value="0">Descending</option>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <button wire:click="create()" class="btn btn-success mt-1 mt-1" style="margin-left:-10px">Add Product</button>
                        @if($isOpen)
                            @include('livewire.productscreate')
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body p-0 pb-3 text-center table-responsive">
                <table class="table mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col" class="border-0">#</th>
                            <th scope="col" class="border-0">Name</th>
                            <th scope="col" class="border-0">Price</th>
                            <th scope="col" class="border-0">Brand</th>
                            <th scope="col" class="border-0">Stock</th>
                            <th scope="col" class="border-0">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if (count($products) > 0)
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->brand}}</td>
                                    <td>{{$product->stock}}</td>
                                    <td classs=" px-4 py-2 w-full">
                                        <button wire:click="edit({{ $product->id }}, 'update')" class="btn btn-success border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"><i class="fas fa-edit"></i></button>
                                        <button type="button" wire:click="deleteId({{ $product->id }})" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <th colspan="13" class="text-center bg-danger text-white"> No Result </th>
                            </tr>
                        @endif

                    </tbody>
                </table>
            </div>
            <div class="card-footer">

                {{$products->links()}}
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
               <div class="modal-body">
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                    <button type="button" wire:click.prevent="deleteAction()" class="btn btn-danger close-modal" data-dismiss="modal">Yes, Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('closeModal', event => {
        $("#modalForm").modal('hide');
    })
    window.addEventListener('openModal', event => {
        $("#modalForm").modal('show');
    })
    window.addEventListener('openDeleteModal', event => {
        $("#modalFormDelete").modal('show');
    })
    window.addEventListener('closeDeleteModal', event => {
        $("#modalFormDelete").modal('hide');
    })
    // Opens the show photos modal
    window.addEventListener('openModalShowPhotos', event => {
        $("#modalShowPhotos").modal('show');
    })

    $(document).ready(function(){
        // This event is triggered when the modal is hidden
        $("#modalForm").on('hidden.bs.modal', function(){
            livewire.emit('forcedCloseModal');
        });
    });
</script>
