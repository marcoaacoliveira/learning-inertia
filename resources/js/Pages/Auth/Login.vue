<template>
    <div>
        <div class="flex items-center">
            <h1 class="text-2xl font-bold">Login</h1>
        </div>
        <div class="mt-8 p-4 bg-gray-100 rounded border border-1">
            <form @submit.prevent="submit" action="/login" method="post">
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" v-model="form.email" name="email" id="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <InputErrors v-if="form.errors.email" :error="form.errors.email"></InputErrors>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" v-model="form.password" name="password" id="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <InputErrors v-if="form.errors.password" :error="form.errors.password"></InputErrors>
                </div>
                <div class="mb-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input type="checkbox" name="remember_me" id="remember_me" class="form-checkbox">
                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                    </label>
                </div>
                <div class="mb-4">
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
    import Guest from "@/Shared/Layouts/Guest.vue";
    import {useForm} from "@inertiajs/vue3";
    import InputErrors from "../../Shared/Input/InputErrors.vue";
    defineOptions({
        layout: Guest
    })

    let form = useForm({
        email: '',
        password: '',
        remember_me: false
    })

    let submit = () => {
        form.post('/login')
    }
</script>
