<template>
    <header class="lg:container mx-auto p-3">
        <nav class="grid grid-cols-1 lg:grid-cols-2 gap-1">
            <div class="flex justify-center lg:justify-start text-xl text-700">
                <div class=""><Logo/></div>
            </div>
            <div class="flex justify-center items-center mt-3 lg:mt-0">
                <ul class="grid grid-cols-6 gap-4">
                    <li><Link href="/" class="hover:bg-blue-100 hover:text-blue-900  text-white px-3 py-1 rounded-lg">Acceuil</Link></li>
                    <li><Link href="/portfolio" class="hover:bg-blue-100 hover:text-blue-900  text-white px-3 py-1 rounded-lg">Portfolio</Link></li>
                    <li><Link href="/blogue" class="hover:bg-blue-100 hover:text-blue-900  text-white px-3 py-1 rounded-lg">Blogue</Link></li>
                    <li><Link href="/tutos" class="hover:bg-blue-100 hover:text-blue-900  text-white px-3 py-1 rounded-lg">Tutos</Link></li>
                    <li><Link href="/infos" class="hover:bg-blue-100 hover:text-blue-900  text-white px-3 py-1 rounded-lg">Infos</Link></li>
                    <li><Link href="/contacts" class="hover:bg-blue-100 hover:text-blue-900  text-white px-3 py-1 rounded-lg">Contacts</Link></li>
                </ul>
            </div>
        </nav>
    </header>
</template>
<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import Logo from '@/Components/Logo.vue';

</script>