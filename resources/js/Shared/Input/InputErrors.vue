<template>
    <div class="text-red-500 text-sm mt-1" v-text="error"></div>
</template>

<script setup>
    import {defineProps} from "vue";
    defineProps(['error'])
</script>
