<?php

namespace App\Http\Livewire;

use App\Models\Products;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsTable extends Component
{
    use WithPagination;

    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;
    public $description, $ref, $lot, $expiry, $quantity, $incomingdate, $asof, $ageing, $product_id, $deleteAction;
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
        $this->description      = '';
        $this->ref              = '';
        $this->lot              = '';
        $this->expiry           = '';
        $this->quantity         = '';
        $this->incomingdate     = '';
        $this->asof             = '';
        $this->ageing           = '';
    }

    public function store()
    {
        $this->validate([
            'description'   => 'required',
            'ref'           => 'required',
            'lot'           => 'required',
            'expiry'        => 'required',
            'quantity'      => 'required',
            'incomingdate'  => 'required',
            'asof'          => 'required',
            'ageing'        => 'required',
        ]);

        Products::updateOrCreate(['id' => $this->product_id], [
            'description'   => $this->description,
            'ref'           => $this->ref,
            'lot'           => $this->lot,
            'expiry'        => $this->expiry,
            'quantity'      => $this->quantity,
            'incomingdate'  => $this->incomingdate,
            'asof'          => $this->asof,
            'ageing'        => $this->ageing,
        ]);

        session()->flash(
            'message',
            $this->product_id ? 'Product Have Been Updated Successfully ' : 'Product Have Been Created Successfully'
        );
    }

    public function edit($id)
    {
        $product = Products::findOrFail($id);
        $this->description      = $product->description;
        $this->ref              = $product->ref;
        $this->lot              = $product->lot;
        $this->expiry           = $product->expiry;
        $this->quantity         = $product->quantity;
        $this->incomingdate     = $product->incomingdate;
        $this->asof             = $product->asof;
        $this->ageing           = $product->ageing;
        $this->product_id       = $id;
    }

    public function deleteId($id)
    {
        $this->deleteAction = $id;
    }


    public function deleteAction()
    {
        Products::find($this->deleteAction)->delete();
        session()->flash(
            'message',
            'Product Have Been Deleted Successfully '
        );
    }
}
