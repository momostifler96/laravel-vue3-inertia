<template>
    <section>
        <div class="container-sm mt-8 border-top pt-3">
            <div class="flex justify-between">
                <h3 class="text-bold text-xl">{{title}}</h3>
                <Link :href="link" class="">Voir plus</Link>
            </div>
            <div class="">
                <PostList v-for="(post, index) in posts" :key="index" :post="post" line="4" :category="title"/>
            </div>
        </div>

    </section>

 </template>
 <script setup>
 import {Link } from '@inertiajs/inertia-vue3';
 import PostList from '@/Components/PostList.vue';

     const props = defineProps({
        posts:Object,
        title:String,
        link:String,
    });

 </script>
