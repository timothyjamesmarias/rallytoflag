<script setup>
import { Inertia } from '@inertiajs/inertia'
import NavLink from '@/Components/NavLink.vue';
import DarkModeToggle from '@/Components/DarkModeToggle.vue';

const logout = () => {
  Inertia.post(route('logout'));
};

</script>
<template>
<nav class="sticky top-0 z-10 flex align-center justify-between text-xl p-6 
border-b border-slate-500 dark:border-slate-700 bg-stone-100 dark:bg-stone-900
opacity-95 backdrop-blur-4xl">

  <NavLink :href="'/'">
  Home
  </NavLink>
  <DarkModeToggle />

  <div class="flex align-center" v-if="$page.props.auth.user">
    <NavLink :href="'/dashboard'">
    Dashboard
    </NavLink>
    <form method="POST" @submit.prevent="logout">
      <button type="submit" class="">
        Logout
      </button>
    </form>
  </div>
  <div class="flex align-center" v-else>
    <NavLink :href="'/login'">
    Login
    </NavLink>
    <NavLink :href="'/register'">
    Register
    </NavLink>
  </div>
</nav>
</template>
