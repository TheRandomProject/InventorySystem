<?php

namespace App\Http\Livewire;

use App\Models\Products;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsTable extends Component
{
    use WithPagination;

    public $search = '';
    public $orderBy = 'name';
    public $orderAsc = true;
    public $isOpen = 0;
    public $name, $price, $brand, $stock, $product_id;

    public function render()
    {
        return view('livewire.products-table', [
            'products' => Products::search($this->search)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->paginate(10),
        ]);
    }
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->name  = '';
        $this->price = '';
        $this->brand = '';
        $this->stock = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'price' => 'required',
            'brand' => 'required',
            'stock' => 'required',
        ]);

        Products::updateOrCreate(['id' => $this->product_id], [
            'name' => $this->name,
            'price' => $this->price,
            'brand' => $this->brand,
            'stock' => $this->stock
        ]);

        session()->flash(
            'message',
            $this->product_id ? 'Product Have Been Updated Successfully' : 'Product Have Been Created Successfully'
        );

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $product = Products::findOrFail($id);
        $this->name = $product->name;
        $this->price = $product->price;
        $this->brand = $product->brand;
        $this->stock = $product->stock;

        $this->openModal();
    }

    public function delete($id)
    {
        Products::find($id)->delete();
        session()->flash(
            'message',
            'Product Have Been Deleted Successfully'
        );
    }
}
