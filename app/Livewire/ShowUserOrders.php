<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ShowUserOrders extends Component
{

    use WithPagination;
    use WithFileUploads;

    public string $campo = "id", $orden="desc";
    public string $cadena = "";
    public int $num = 0;

    public function render()
    {
        $user_id = Auth::id();
        $orders = Order::where('user_id',$user_id)
        ->where(function($query){
            $query->where('title', 'like', "%{$this->cadena}%")
            ->orWhere('state','like',"%{$this->cadena}%")
            ->orWhere('amount','=',$this->num);
        })
        ->orderBy($this->campo, $this->orden)
        ->paginate(5);
        return view('livewire.show-user-orders', compact('orders'));
    }

    public function updatingCadena(){
        $this->resetPage();
    }

    public function ordenar(string $campo){
        $this->orden=($this->orden=='desc') ? 'asc' :'desc';
        $this->campo=$campo;
    }
}
