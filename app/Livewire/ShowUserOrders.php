<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ShowUserOrders extends Component
{

    use WithPagination;
    use WithFileUploads;

    public string $campo = "id", $orden="desc";
    public string $cadena = "";

    public bool $openModalUpdate=false;

    public function render()
    {
        $user_id = Auth::id();
        $orders = Order::where('user_id',$user_id)
        ->where(function($query){
            $query->where('name', 'like', "%{$this->cadena}%")
            ->orWhere('state','like',"%{$this->cadena}%")
            ->orWhere('amount','like',$this->cadena);
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


    //Update

    public function changeState(Order $order){
        $this->authorize('update',$order);
        $state=($order->state=="Pending")?"Completed":"Pending";
        $order->update([
            'state'=>$state,
        ]);

    }

    // public function changeState(Order $order, Request $request)
    // {
    //     $request->validate($this->rules($order->id));
    //     $state = ($order->state == "Pending") ? "Completed" : "Pending";
    //     $order->update([
    //         'name' => $request->name,
    //         'image' => $request->image,
    //         'state' => $state,
    //         'amount' => $request->amount,
    //         'user_id' => $request->user_id,
    //     ]);
    // }

    // public function rules(?int $id = null){
    //     return [
    //         'name'=>['required','string','min:3','max:55','unique:orders,name,'.$id],
    //         'image'=>['nullable','max:2048'],
    //         'state'=>['required','in:Pending,Completed'],
    //         'amount'=>['required','integer','min:0','max:1000'],
    //         'user_id'=>['required','integer','exists:users,id'],
    //     ];
    // }


}
