<script setup>
import { Inertia } from '@inertiajs/inertia'
import NavLink from '@/Components/NavLink.vue';
import DarkModeToggle from '@/Components/DarkModeToggle.vue';

const logout = () => {
  Inertia.post(route('logout'));
};

</script>
<template>
<nav class="sticky top-0 z-10 flex items-center justify-between text-xl p-6  bg-stone-100 dark:bg-stone-900
opacity-95 backdrop-blur-4xl">

  <Link href="/" class="text-3xl font-logo select-none font-bold text-slate-900 dark:text-slate-100">
    Rally To Flag
  </Link>

  <div class="flex items-center">
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
</nav>
</template>
