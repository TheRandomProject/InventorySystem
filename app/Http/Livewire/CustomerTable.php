<?php

namespace App\Http\Livewire;

use App\Models\Customers;
use Livewire\Component;
use Livewire\WithPagination;

class CustomerTable extends Component
{
    use WithPagination;
    public $search, $deleteAction, $name, $address, $contact, $customer_id;
    public $orderBy = 'id';
    public $orderAsc = true;

    public function render()
    {
        return view('livewire.customer-table', [
            'customers' => Customers::search($this->search)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->paginate(10),
        ]);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'address' => 'required',
            'contact' => 'required'
        ]);

        Customers::updateOrCreate(['id' => $this->customer_id], [
            'name' => $this->name,
            'address' => $this->address,
            'contact' => $this->contact
        ]);

        session()->flash(
            'message',
            'Customer Have Been Udapted Successfully'
        );
    }

    public function edit($id)
    {
        $customer = Customers::findOrFail($id);
        $this->name = $customer->name;
        $this->address = $customer->address;
        $this->contact = $customer->contact;
        $this->customer_id = $id;
    }

    public function deleteId($id)
    {
        $this->deleteAction = $id;
    }

    public function deleteAction()
    {
        Customers::find($this->deleteAction)->delete();
        session()->flash(
            'message',
            'Customer Have Been Deleted Successfully'
        );
    }
}
