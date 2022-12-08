<nav class="flex align-center justify-between bg-black text-xl p-6">
  <div>
    <x-nav-link :href="route('home')">
      Home
    </x-nav-link>
  </div>
  <div class="flex">
  @auth
    <x-nav-link :href="route('dashboard')">
      Account
    </x-nav-link>
    <form method="POST" action={{ route('logout') }}>
      @csrf
      <x-nav-link :href="route('logout')" 
        onclick="even.preventDefault(); this.closest('form').submit();"
      >
        Sign Out
      </x-nav-link>
    </form>
  </div>
  @else
    <x-nav-link :href="route('login')">
      Sign In
    </x-nav-link>
    <x-nav-link :href="route('register')" class="pl-4">
      Sign Up
    </x-nav-link>
  @endauth
<div>
</nav>
