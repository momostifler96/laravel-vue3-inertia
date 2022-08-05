<template>
    <Header/>
    <main class="container mx-auto min-h-screen">
        <slot/>
    </main>
    <Footer/>
</template>
<script setup>
import Footer from './Footer.vue';
import Header from './Header.vue';

</script>