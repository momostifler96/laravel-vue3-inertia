<template>
    <Head>

    </Head>
    <Guest>
        <div class="flex justify-center items-center flex-col h-96 p-5 rounded-3 bg-white border">
            <h1 class="text-5xl text-bold text-center">Le monde Gbairai</h1>
            <h2 class="text-3xl text-bold text-pink-500 text-center my-3">Les meilleur buz</h2>
            <P class="text-grey text-sm text-center">Parcourir les différent categories pour découvrir <br> encore plus de sujet passionnant du moment et les actualités</P>
            <div class="p-2 flex bg-white rounded-3 mt-3">
                <input type="text" name="" id="" class="border border-transparent bg-transparent p-2 rounded-3" placeholder="Recherche..."> <button class="rounded-3 p-2 bg-primary ml-2 text-white">Chercher</button>
            </div>
        </div>
        <section class="flex my-5 p-3">
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-5">
               <div class="lg:col-span-3">
                <Postcard :post="posts[0]" />

               </div>
                <div class="lg:col-span-2  grid grid-cols-2 lg:grid-cols-1 lg:gap-1 gap-2">
                    <div class="p-3 rounded-3 bg-white shadow">
                    <div class="overflow-hidden rounded-3 relative w-full" style="">
                        <img class="" :src="posts[1].picture" alt="">
                    </div>
                    <div class="mt-2">
                        <p class="mt-3 line-clamp-2 text-900">{{posts[1].description}}</p>
                        <div class="my-3"></div>
                    </div>
                </div>
                <div class="p-3 rounded-3 bg-white shadow lg:mt-5">
                    <div class="overflow-hidden rounded-3 relative w-full" style="">
                        <img class="" :src="posts[2].picture" alt="">
                    </div>
                    <div class="mt-2">
                        <p class="mt-3 line-clamp-2 text-bold">{{posts[2].description}}</p>
                        <div class="my-3"></div>
                    </div>
                </div>
                </div>
            </div>

        </section>
        <section>
            <div class="flex justify-center items-center flex-col h-96 p-5 rounded-3 bg-white border">

            </div>
        </section>
        <section class=" border-top my-5">
            <p class="text-4xl text-bold text-center my-4">Les plus recents</p>
            <div class="grid grid-cols-2 lg:grid-cols-3 sm:gap-2 lg:gap-5">
                <Postcard v-for="(post, index) in posts" :key="index" :post="post" />
            </div>

        </section>
    </Guest>
</template>
<script setup>
import Guest from '@/Layouts/Guest.vue';
import { Head,Link } from '@inertiajs/inertia-vue3';
import Postcard from '../Components/Postcard.vue';
const props = defineProps({
    posts:Object,
});

console.log('posts',props.posts)
</script>
