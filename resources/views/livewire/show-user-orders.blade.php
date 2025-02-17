<div>
    <x-self.base> All Orders
  <!-- Barra de Búsqueda y Tabla -->
  <div class="container mx-auto p-4">
    <!-- Barra de Búsqueda -->

    <div class="mb-6 flex justify-start">
      <x-input
        type="search"
        placeholder="Buscar..."
        wire:model.live="cadena"
        class="w-full rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600 mr-3"
      />
        {{-- <div>
            <x-input type="search" placeholder="Buscar..." wire:model.live="cadena" /><i class="fas fa-search"></i>
        </div> --}}
        @livewire('create-post')
    </div>


    <!-- Tabla -->
    @if($orders->count())
    <div class="bg-white rounded-lg shadow overflow-hidden">
      <table class="min-w-full bg-gray-300">
        <thead class="bg-gray-500">
          <tr>
            <th  scope="col" class="px-6 py-3 text-left text-xs font-bold  uppercase cursor-pointer" wire:click="ordenar('name')">Name<i class="ml-1 fas fa-sort"></i></th>
            <th  scope="col" class="px-6 py-3 text-left text-xs font-bold  uppercase cursor-pointer" >Image</th>
            <th  scope="col" class="px-6 py-3 text-left text-xs font-bold  uppercase cursor-pointer" wire:click="ordenar('state')">State<i class="ml-1 fas fa-sort"></i></th>
            <th  scope="col" class="px-6 py-3 text-left text-xs font-bold  uppercase cursor-pointer" wire:click="ordenar('amount')">Amount<i class="ml-1 fas fa-sort"></i></th>
            <th  scope="col" class="px-6 py-3 text-left text-xs font-bold  uppercase ">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <!-- Fila de ejemplo -->
          @foreach($orders as $item)
          <tr class="hover:bg-gray-50 transition duration-200">
            <td class="px-6 py-4 text-sm text-gray-900">{{$item->name}}</td>
            <td class="px-6 py-4">
              <img src="{{Storage::url($item->image)}}"  class="w-10 h-10 rounded-full">
            </td>
            <td class="px-6 py-4 text-sm text-gray-900">
                <button @class([ ' text-white font-semibold py-3 px-6 rounded-xl shadow-lg hover:from-purple-600 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50',
                    'bg-gradient-to-r from-yellow-500 to-purple-600 hover:to-green-500 transition-all duration-300'=>$item->state=="Pending",
                    'bg-gradient-to-r from-blue-500 to-green-600 hover:to-yellow-500 transition-all duration-300'=>$item->state=="Completed"
                ])
                wire:click="changeState({{$item}})">
                {{$item->state}}
                </button>
            </td>
            <td class="px-6 py-4 text-sm text-gray-900">{{$item->amount}}</td>
            <td class="px-6 py-4 text-sm text-gray-900">
              <button class="text-blue-600 hover:text-blue-800 mr-2">
                <i class="fas fa-edit"></i>
              </button>
              <button class="text-red-600 hover:text-red-800">
                <i class="fas fa-trash"></i>
              </button>
            </td>
          </tr>
          @endforeach
          <!-- Más filas pueden agregarse aquí -->
        </tbody>
      </table>
    </div>
    <div class="mt-2">
        {{$orders->links()}}
    </div>
    @else
    <div class="bg-black text-white p-2 rounded-xl font-semibold mt-2">
       The order doesn't exists.
    </div>
    @endif
  </div>
</x-self.base>
<div class="fixed bottom-4 right-4">
    <button
      onclick="document.documentElement.classList.toggle('dark')"
      class="bg-blue-600 text-white p-3 rounded-full shadow-lg hover:bg-blue-700 transition duration-300">
      <i class="fas fa-moon"></i>
    </button>
  </div>
</div>

