<div class="row">
    <div class="col py-4">

        <div class="col-md-12 mt-2">
            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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
                        <button wire:click="create()" class="btn btn-success mt-1 mt-1" style="margin-left:-10px" data-toggle="modal" data-target="#CreateModal"><i class="fas fa-plus"></i></button>
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
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->ref}}</td>
                                    <td>{{$product->lot}}</td>
                                    <td>{{$product->expiry}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>{{$product->incomingdate}}</td>
                                    <td>{{$product->asof}}</td>
                                    <td>{{$product->ageing}}</td>
                                    <td classs=" px-4 py-2 w-full">
                                        <button wire:click="edit({{ $product->id }})" class="btn btn-success" data-toggle="modal" data-target="#updateModal"><i class="fas fa-edit"></i></button>
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
    <!-- Create Modal -->
    <form>
        <div wire:ignore.self class="modal fade" id="CreateModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true close-btn">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="exampleFormControlInput1"
                                    class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                                <input type="text"
                                    class="@error('name') is-invalid @enderror form-control w-full mt-1 block  rounded-md focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    id="exampleFormControlInput1" placeholder="Enter Name" wire:model="name" required>
                                @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="exampleFormControlInput1"
                                    class="block text-gray-700 text-sm font-bold mb-2">Price:</label>
                                <input type="number"
                                    class="@error('price') is-invalid @enderror form-control w-full mt-1 block  rounded-md focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    id="exampleFormControlInput1" placeholder="Enter Price" wire:model="price" required>
                                @error('price') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="exampleFormControlInput1"
                                    class="block text-gray-700 text-sm font-bold mb-2">Brand:</label>
                                <input type="text"
                                    class="@error('brand') is-invalid @enderror form-control w-full mt-1 block  rounded-md focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    id="exampleFormControlInput1" placeholder="Enter Brand" wire:model="brand" required>
                                @error('brand') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="exampleFormControlInput1"
                                    class="block text-gray-700 text-sm font-bold mb-2">Stock:</label>
                                <input type="number"
                                    class="@error('stock') is-invalid @enderror form-control w-full mt-1 block  rounded-md focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    id="exampleFormControlInput1" placeholder="Enter Stock" wire:model="stock" required>
                                @error('stock') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                        <button wire:click.prevent="store()" type="button"  class="btn btn-success close-modal" data-dismiss="modal">Create</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Update Modal -->
    <form>
        <div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true close-btn">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="exampleFormControlInput1"
                                    class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                                <input type="text"
                                    class="@error('name') is-invalid @enderror form-control w-full mt-1 block  rounded-md focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    id="exampleFormControlInput1" placeholder="Enter Name" wire:model="name" required>
                                @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="exampleFormControlInput1"
                                    class="block text-gray-700 text-sm font-bold mb-2">Price:</label>
                                <input type="number"
                                    class="@error('price') is-invalid @enderror form-control w-full mt-1 block  rounded-md focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    id="exampleFormControlInput1" placeholder="Enter Price" wire:model="price" required>
                                @error('price') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="exampleFormControlInput1"
                                    class="block text-gray-700 text-sm font-bold mb-2">Brand:</label>
                                <input type="text"
                                    class="@error('brand') is-invalid @enderror form-control w-full mt-1 block  rounded-md focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    id="exampleFormControlInput1" placeholder="Enter Brand" wire:model="brand" required>
                                @error('brand') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="exampleFormControlInput1"
                                    class="block text-gray-700 text-sm font-bold mb-2">Stock:</label>
                                <input type="number"
                                    class="@error('stock') is-invalid @enderror form-control w-full mt-1 block  rounded-md focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    id="exampleFormControlInput1" placeholder="Enter Stock" wire:model="stock" required>
                                @error('stock') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                        <button wire:click.prevent="store()" type="button"  class="btn btn-success close-modal" data-dismiss="modal">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Delete Modal -->
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
