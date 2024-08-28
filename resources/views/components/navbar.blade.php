<nav class="shadow-lg shadow-stone-400 mb-8">
  
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-3">
    <a wire:navigate href="{{ route('index') }}" class="flex items-center rtl:space-x-reverse">
        <img src="{{ url('img/logo.png') }}" class="h-11 ml-5 md:ml-10" alt="logo" />
    </a>
    
    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        @auth
          <button type="button" class="flex text-sm rounded-full md:me-0" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">

            <span class="sr-only">Open user menu</span>
            
            <div class="w-8 h-8 rounded-full bg-blue-600 flex justify-center items-center text-white font-semibold">{{auth()->user()->name[0]}}</div>
            
          </button>
          <!-- Dropdown menu -->
          <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-lg shadow-stone-400 sha w-56" id="user-dropdown">
            <div class="px-4 py-3">
              @php
                  $explode = explode(" ", auth()->user()->name);
                  $name = $explode[0];
              @endphp
              <span class="block text-sm text-gray-900 dark:text-white">{{ $name }}</span>
            </div>
            <ul class="py-2" aria-labelledby="user-menu-button">
              <li>
                <a wire:navigate href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                  <svg class="w-5 h-5 text-gray-700 inline-block mr-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd"/>
                  </svg>
                  <span class="text-gray-700 pt-1">Perfil</span>
                </a>
              </li>
              <li>
                <a wire:navigate href="#" class="flex items-center justify-start px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                  <svg class="w-4 h-4 text-gray-700 inline-block mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
                  </svg>  
                  <span class="text-gray-700 pt-1">Gostei</span>
                </a>
              </li>
              <li>
                <a wire:navigate href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                  <svg class="w-5 h-5 text-gray-700 inline-block mr-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd"/>
                  </svg>
                  <span class="text-gray-700 pt-1">Canais</span>
                </a>
              </li>
              <li>
                <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-red-500 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                  <svg class="w-5 h-5 text-red-500 inline-block mr-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2"/>
                  </svg>
                  <span class="text-red-500 pt-1">Sair</span>
                </a>
              </li>
            </ul>
          </div>
        @endauth
          <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 mr-2 justify-center text-sm text-gray-500 rounded-lg md:hidden" aria-controls="navbar-user" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
          </button>
      </div>

    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">

        @auth
        
          <x-nav-link :link="route('index')" :active="request()->routeIs('index')">
            Inicio
          </x-nav-link>  
    
          <x-nav-link :link="route('login')" :active="request()->routeIs('login')">
            Inicio
          </x-nav-link> 

          <x-nav-link :link="route('login')" :active="request()->routeIs('login')">
            Inicio
          </x-nav-link> 

        @else

          <x-nav-link :link="route('login')" :active="request()->routeIs('login')">
            Login
          </x-nav-link>  
    
          <x-nav-link :link="route('register')" :active="request()->routeIs('register')">
            Cadastre-se
          </x-nav-link> 

        @endauth

        
               
      </ul>
    </div>
  </div>
</nav>