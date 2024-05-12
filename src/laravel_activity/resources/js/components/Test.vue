<template>
    HelloWorld {{ greeting }}
</template>

<script setup lang="ts">
import { ref } from 'vue';
const greeting = ref('Welcome to Your Vue.js + TypeScript App');

</script>
