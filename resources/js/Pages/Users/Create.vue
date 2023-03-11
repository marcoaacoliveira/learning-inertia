<template>
    <Head>
        <title>Create User</title>
    </Head>

    <h1 class="text-3xl"> Create User </h1>

    <form @submit.prevent="submit" method="POST" class="max-w-md mx-auto mt-8">
        <div class="mb-6">
            <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Name
            </label>
            <input v-model="form.name" class="border border-gray-400 p-2 w-full" name="name" id="name" type="text">
            <input-errors v-if="form.errors.name" :error="form.errors.name" :key="form.errors.name"></input-errors>
        </div>
        <div class="mb-6">
            <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Email
            </label>
            <input v-model="form.email" class="border border-gray-400 p-2 w-full" name="email" id="email" type="email">
            <input-errors v-if="form.errors.email" :error="form.errors.email" :key="form.errors.email"></input-errors>
        </div>
        <div class="mb-6">
            <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Password
            </label>
            <input v-model="form.password"  class="border border-gray-400 p-2 w-full" name="password" id="password" type="password">
            <input-errors v-if="form.errors.password" :error="form.errors.password" :key="form.errors.password"></input-errors>
        </div>
        <div class="mb-6">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" :disabled="form.processing">
                Submit
            </button>
        </div>
    </form>
</template>

<script setup>
    import {Head} from "@inertiajs/vue3";
    import InputErrors from "@/Shared/Input/InputErrors.vue";
    import {useForm} from "@inertiajs/vue3";

    let form = useForm({
        name: '',
        email: '',
        password: ''
    })

    let submit = () => {
        form.post('/users')
    }
</script>
