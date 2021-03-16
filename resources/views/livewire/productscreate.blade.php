<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden"></span>​

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
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
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button wire:click.prevent="store()" type="button"  class="btn btn-success border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full mt-2">
                            Add
                        </button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button wire:click="closeModal()" type="submit" class="btn btn-light border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full mt-2">
                            Cancel
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
