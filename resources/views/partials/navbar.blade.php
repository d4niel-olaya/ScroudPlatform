<div class="drawer z-10">
    <input id="my-drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
      <!-- Page content here -->
      <label for="my-drawer" class="btn btn-square btn-ghost">  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg></label>
    </div> 
    <div class="drawer-side">
      <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
      <ul class="menu p-4 w-80 min-h-full bg-base-200 text-base-content">
        <!-- Sidebar content here -->
        <li><a class="link" href="/dashboard">Dashboard</a></li>
        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
          @csrf
  
          <x-dropdown-link :href="route('logout')" class="link"
                  onclick="event.preventDefault();
                              this.closest('form').submit();">
              {{ __('Salir') }}
          </x-dropdown-link>
      </form>
        
      </ul>
    </div>
  </div>