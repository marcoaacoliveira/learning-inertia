<template>
    <div>
        <Component
            :is="link.url ? Link : 'span'"
            v-for="link in links"
            :href="link.url"
            v-html="link.label"
            class="px-1"
            :class="{
                'text-gray-500': ! link.url,
                'underline font-bold': link.active,
            }"
        />
    </div>
</template>

<script setup>
import {Link} from '@inertiajs/vue3'
defineProps({
    links: Object
})

</script>
