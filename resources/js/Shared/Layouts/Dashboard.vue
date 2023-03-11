<template>
    <section class="p-6 bg-gray-200">
        <header class="flex justify-between">
            <div class="flex gap-x-10">
                <h1 class="font-bold text-lg">My App</h1>
                <span>Welcome back, {{username}}</span>
            </div>
            <Nav/>
        </header>
    </section>
    <section class="p-6">
        <div class="max-w-3xl mx-auto">
            <slot/>
        </div>
    </section>
</template>

<script setup>
import Nav from "../Nav.vue";
import {computed} from "vue";
import { usePage, Head } from '@inertiajs/vue3'

let username = computed(() => {
    return usePage().props.auth.user.username
})

</script>
