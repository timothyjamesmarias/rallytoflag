<nav class="sticky top-0 z-10 bg-black flex align-center justify-between text-xl p-6 border-b border-slate-500 dark:border-slate-700">
  <div>
    <x-nav-link :href="route('home')">
      Home
    </x-nav-link>
  </div>
  <div class="flex">
    <x-dark-mode-toggle />
  @auth
    <x-nav-link :href="route('dashboard')">
      Account
    </x-nav-link>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button onclick="even.preventDefault(); this.closest('form').submit();"
      class="ml-4">
        <x-nav-link>
          Sign Out
        </x-nav-link>
      </button>
    </form>
  @else
    <x-nav-link :href="route('login')">
      Sign In
    </x-nav-link>
    <x-nav-link :href="route('register')" class="ml-4">
      Sign Up
    </x-nav-link>
  @endauth
<div>
</nav>
