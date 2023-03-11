<template>
    <Head>
        <title>Users</title>
    </Head>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto flex items-center ">
                <h1 class="text-base font-semibold leading-6 text-gray-900">Users</h1>
                <Link href="/users/create" class="text-blue-500 text-sm ml-3"> New user </Link>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <input v-model="search" type="text" placeholder="Search..." class="border p-2 rounded-lg">
            </div>
        </div>
        <div class="mt-8 flow-root">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead>
                        <tr>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Name
                            </th>
                            <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Email</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                        <tr v-for="user in users.data" :key="user.email">
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                {{ user.name }}
                            </td>
                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ user.email }}</td>
                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900"
                                >Edit<span class="sr-only">, {{ user.name }}</span></a
                                >
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <Pagination class="mt-4" :links="users.links"/>
    </div>
</template>
<script setup>
import Pagination from "@/Shared/Pagination.vue";
import {ref, watch} from "vue";
import {router, Link} from "@inertiajs/vue3";
import debounce from "lodash/debounce";


let props = defineProps({
    users: Object,
    filters: Object
})

let search = ref(props.filters.search)

watch(search, debounce((value) => {
    console.log('triggered')
    router.get('/users', {search: value}, {
        preserveState: true,
        replace: true,
    })
},200))
</script>
