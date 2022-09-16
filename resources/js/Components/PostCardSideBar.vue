<template>

    <div class="p-3 rounded-3 bg-white shadow grid grid-cols-2 gap-2">
        <Link :href="route('post.show',[post.slug])">
            <div class="overflow-hidden rounded-3 relative w-full" style="">
                <img class="" :src="post.picture" alt="">
            </div>
        </Link>

         <div class="">
            <small>{{post.created}}</small>
             <p class="mt-3 line-clamp-3 text-sm">{{post.description}}</p>
             <div class="my-3"></div>
         </div>

     </div>
 </template>
 <script setup>
 import { Head,Link } from '@inertiajs/inertia-vue3';

     const props = defineProps({post:Object});

 </script>
