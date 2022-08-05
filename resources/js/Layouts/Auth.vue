<template>
    <Header/>
    <main class="container mx-auto min-h-screen">
            <section>
        <nav class="flex justify-center relative bg-white border rounded-lg p-2  h-10">
            
            <ul class="flex">
                <li>
                    <Link :href="route('dashboard.index')" class="hover:bg-blue-100 text-black  hover:text-white px-3 py-1 rounded-lg">Acceuil</Link>
                </li>
                <li>
                    <Link :href="route('dashboard.post.myPosts')" class="hover:bg-blue-100 text-black  hover:text-white px-3 py-1 rounded-lg">mes posts</Link>
                </li>
                <li>
                    <Link :href="route('dashboard.index')" class="hover:bg-blue-100 text-black hover:text-white px-3 py-1 rounded-lg">mes favorits</Link>
                </li>
                <li>
                    <Link :href="route('dashboard.index')" class="hover:bg-blue-100 text-black hover:text-white px-3 py-1 rounded-lg">mes abonner</Link>
                </li>
                <li>
                    <Link :href="route('dashboard.post.create')" class="hover:bg-blue-100 text-black  hover:text-white px-3 py-1 rounded-lg">Modifier mon profile</Link>
                </li>
                <li>
                    <Link :href="route('dashboard.edit-profile')" class="hover:bg-blue-100 text-black  hover:text-white px-3 py-1 rounded-lg">Modifier mon profile</Link>
                </li>

            </ul>
            <div class="absolute right-0 top-0 z-10 flex items-center h-100">
                <button  class="flex justify-center items-center rounded-lg border w-8 h-8 text-black m-2 text-xs hover:bg-blue-100"><i class="bi bi-search"></i></button>
            </div>
        </nav>
    </section>
        <slot/>
    </main>
    <Footer/>
</template>
<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import Footer from './Footer.vue';
import Header from './Header.vue';
</script>