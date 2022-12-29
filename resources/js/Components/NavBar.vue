<script setup>
import { Inertia } from '@inertiajs/inertia'
import { ref } from 'vue'
import NavLink from '@/Components/NavLink.vue';
import DarkModeToggle from '@/Components/DarkModeToggle.vue';

const logout = () => {
  Inertia.post(route('logout'));
};

let showMenu = ref(false);

</script>
<template>
<nav class="sticky top-0 z-10 text-xl p-6  bg-stone-100 dark:bg-stone-900 opacity-95 backdrop-blur-4xl">
<div class="flex items-center justify-between">
  <Link href="/" class="text-3xl font-logo select-none font-bold text-slate-900 dark:text-slate-100">
    Rally To Flag
  </Link>

  <div class="flex items-center hidden sm:block">
    <DarkModeToggle class="mr-4"/>
    <NavLink :href="'/events'" class="pr-4">
    Events
    </NavLink>

    <template v-if="$page.props.auth.user">
    <NavLink :href="'/dashboard'" class="pr-4">
    Dashboard
    </NavLink>
    <form method="POST" @submit.prevent="logout" class="">
      <button type="submit" class="hover:text-violet-300">
          Logout
      </button>
    </form>
    </template>

    <template v-else>
    <NavLink :href="'/login'" class="mr-4">
    Login
    </NavLink>
    <NavLink :href="'/register'">
    Register
    </NavLink>
    </template>
  </div>

  <div class="flex items-center xl:lg:md:hidden">
    <DarkModeToggle class="mr-4"/>
    <button @click="showMenu = !showMenu">
      <font-awesome-icon icon="fa-solid fa-bars" class="text-2xl"/>
    </button>
  </div>
</div>
<div id="menu" :class="{ hidden: !showMenu, 'inline-flex': showMenu}" class="w-full sm:items-center sm:w-auto">
  <div class="flex-grow">
  <NavLink :href="'/events'" class="block">
  Events
  </NavLink>
  <template v-if="$page.props.auth.user">
  <NavLink :href="'/dashboard'" class="block">
  Dashboard
  </NavLink>
  <form method="POST" @submit.prevent="logout" class="">
    <button type="submit" class="hover:text-violet-300">
        Logout
    </button>
  </form>
  </template>

  <template v-else>
  <NavLink :href="'/login'" class="block">
  Login
  </NavLink>
  <NavLink :href="'/register'" class="block">
  Register
  </NavLink>
  </template>
</div>
</div>
</nav>
</template>
