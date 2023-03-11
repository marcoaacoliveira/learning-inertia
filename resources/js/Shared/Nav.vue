<script setup>
import {Link} from '@inertiajs/vue3'
import NavLink from "./NavLink.vue";
</script>

<template>
    <nav>
        <ul class="flex justify-between space-x-3">
            <li><NavLink href="/" :active="$page.component === 'Home'">Home</NavLink></li>
            <li><NavLink href="/users" :active="$page.component === 'Users'">Users</NavLink></li>
            <li><NavLink href="/settings" :active="$page.component === 'Settings'">Settings</NavLink></li>
            <li><NavLink href="/logout" method="post" as="button">Logout</NavLink></li>
        </ul>
    </nav>
</template>
