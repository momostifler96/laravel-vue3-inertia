<template>

    <div class="p-2 rounded-3 bg-white shadow flex my-3">
             <Link :href="route('post.show',[post.slug])" class="col-span-2">
                 <div :class="`overflow-hidden rounded-3 relative ${csl?csl:'img-w-1'}`" style="">
                     <img class="w-full" :src="post.picture" alt="">
                 </div>
             </Link>
             <div class="col-span-3 flex flex-col justify-between ml-2">
                <div class="flex justify-between text-sm pt-2">
                    <p><strong><Link :ref="link">{{category}}</Link></strong></p>
                </div>
                <div class="flex items-center h-auto">
                    <p :class="`mt-3 line-clamp-${line?line:2}`">{{post.description}}</p>
                </div>
                <div class="flex justify-between text-sm pt-2 border-top">
                    <p>Par <strong><Link :ref="route('post.author',[post.owner.username])">{{post.owner.username}}</Link></strong></p>
                    <small>{{post.created}}</small>
                </div>

             </div>

     </div>
 </template>
 <script setup>
 import { Head,Link } from '@inertiajs/inertia-vue3';

     const props = defineProps({post:Object,line:String,category:String,csl:String});

 </script>
