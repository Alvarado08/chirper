<x-layout>
   <x-slot:title>Welcome</x-slot:title>
   <div class="max-w-2xl mx-auto">
      <div class="card bg-base-100 shadow mt-8">
         <div class="card-body">
            <div>
               <h1 class="text-3xl font-bold">Welcome to Chirper!</h1>
               <p class="mt-4 text-base-content/60">This is your brand new Laravel application.
                  Time to make it
                  sing (or chirp)!</p>
            </div>
         </div>
      </div>
      @foreach ($chirps as $chirp)
         <div class="card bg-base-100 shadow mt-4">
            <div class="card-body">
               <h2 class="text-xl font-bold">{{ $chirp['author'] }}</h2>
               <p class="mt-2">{{ $chirp['message'] }}</p>
               <p class="mt-2 text-base-content/60">{{ $chirp['time'] }}</p>
            </div>
         </div>
      @endforeach
   </div>
</x-layout>
