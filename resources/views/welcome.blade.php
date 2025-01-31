<x-app-layout>
    <div class="min-h-screen bg-gray-600 p-8">
        <h1 class="font-semibold text-4xl text-gray-600 dark:text-gray-200 leading-tight">
            All Orders
        </h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($orders as $item)
          <div class="relative bg-cover bg-center h-64 rounded-lg shadow-lg overflow-hidden" style="background-image: url('{{Storage::url($item->image)}}');">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            <div class="relative p-6 text-white">
              <h2 class="text-2xl font-bold mb-2">Orden #{{$item->id}}</h2>
              <p class="text-sm mb-1">Name: {{$item->name}}</p>
              <p class="text-sm mb-1">State: {{$item->state}}</p>
              <p class="text-sm mb-1">Amount: {{$item->amount}}</p>
            </div>
          </div>
          @endforeach
        </div>
            <div class="m-2">
                {{$orders->links()}}
            </div>
      </div>
</x-app-layout>
