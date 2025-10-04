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
      <!-- Chirp Form -->
      <div class="card bg-base-100 shadow mt-8">
         <div class="card-body">
            <form method="POST" action="/chirps">
               @csrf
               <div class="form-control w-full">
                  <textarea name="message" placeholder="What's on your mind?"
                     class="textarea textarea-bordered w-full resize-none @error('message') textarea-error @enderror"
                     rows="4" maxlength="255" required>{{ old('message') }}</textarea>

                  @error('message')
                     <div class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                     </div>
                  @enderror
               </div>

               <div class="mt-4 flex items-center justify-end">
                  <button type="submit" class="btn btn-primary btn-sm">
                     Chirp
                  </button>
               </div>
            </form>
         </div>
      </div>
      {{-- @foreach ($chirps as $chirp)
         <div class="card bg-base-100 shadow mt-4">
            <div class="card-body">
               <h2 class="text-xl font-bold">{{ $chirp['author'] }}</h2>
               <p class="mt-2">{{ $chirp['message'] }}</p>
               <p class="mt-2 text-base-content/60">{{ $chirp['time'] }}</p>
            </div>
         </div>
      @endforeach --}}
      {{-- @forelse ($chirps as $chirp)
         <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
               <div>
                  <div class="font-semibold"> {{ $chirp->user ? $chirp->user->name : 'Anonymous' }}
                  </div>
                  <div class="mt-1">{{ $chirp->message }}</div>
                  <div class="text-sm text-gray-500 mt-2">
                     {{ $chirp->created_at->diffForHumans() }}
                  </div>
               </div>
            </div>
         </div>
      @empty
         <p class="text-gray-500">No chirps yet. Be the first to chirp!</p>
      @endforelse --}}
      <h1 class="text-3xl font-bold mt-8">Latest Chirps</h1>

      <div class="space-y-4 mt-8">
         @forelse ($chirps as $chirp)
            <x-chirp :chirp="$chirp" />
         @empty
            <div class="hero py-12">
               <div class="hero-content text-center">
                  <div>
                     <svg class="mx-auto h-12 w-12 opacity-30" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                        </path>
                     </svg>
                     <p class="mt-4 text-base-content/60">No chirps yet. Be the first to chirp!</p>
                  </div>
               </div>
            </div>
         @endforelse
      </div>
   </div>
</x-layout>
