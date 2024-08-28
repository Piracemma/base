<x-div>
    
    <div class="flex justify-center items-center min-h-screen">

        <div class="w-full md:w-80 p-6 shadow-lg shadow-neutral-800 rounded-lg">

            <form wire:submit="logar">

                <p class="text-2xl font-semibold text-center text-stone-700">Login</p>

                <x-text-input model="email" label="E-mail:" type="email" classe="border-none bg-gray-200" />

                <x-text-input model="password" label="Senha:" type="password" classe="border-none bg-gray-200" />

                <div class="my-2">
                    <input type="checkbox" wire:model='remember' id="remember" class="rounded">
                    <label for="remember">Matenha-me conectado.</label>
                </div>

                <x-button-princ text="Entrar" load="logar" class="mt-4 mb-0"/>

            </form>

            <div class="flex items-center my-3">
                <div class="flex-grow border-t border-stone-500"></div>
                <span class="mx-4 text-stone-600">ou</span>
                <div class="flex-grow border-t border-stone-500"></div>
            </div>

            <div>

                <button wire:click="loginGoogle" type="button" class="py-3 px-3 bg-blue-700 hover:bg-blue-800 rounded-lg flex items-center justify-center w-full">
                    <svg class="w-6 h-6 text-white inline-block" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M12.037 21.998a10.313 10.313 0 0 1-7.168-3.049 9.888 9.888 0 0 1-2.868-7.118 9.947 9.947 0 0 1 3.064-6.949A10.37 10.37 0 0 1 12.212 2h.176a9.935 9.935 0 0 1 6.614 2.564L16.457 6.88a6.187 6.187 0 0 0-4.131-1.566 6.9 6.9 0 0 0-4.794 1.913 6.618 6.618 0 0 0-2.045 4.657 6.608 6.608 0 0 0 1.882 4.723 6.891 6.891 0 0 0 4.725 2.07h.143c1.41.072 2.8-.354 3.917-1.2a5.77 5.77 0 0 0 2.172-3.41l.043-.117H12.22v-3.41h9.678c.075.617.109 1.238.1 1.859-.099 5.741-4.017 9.6-9.746 9.6l-.215-.002Z" clip-rule="evenodd"/>
                    </svg>
                    
                    <span class="text-white ml-2 font-semibold">Entrar com Google</span>
                </button>

            </div>

        </div>

    </div>
    
</x-div>