<template>
<Head>

</Head>
    <BlogLayout>
    <section class="grid lg:grid-cols-2 sm:grid-cols-1 g-4 py-5">

        <Link v-for="(post, index) in posts.data" :key="index" class="m-3 block rounded-lg p-3 overflow-hidden bg-white border" :href="route('post.show',post.slug)">
            <div class="flex overflow-hidden ">
                <div class="rounded-lg mr-3">
                    <img class="w-10" src="/images/avatar.png" alt="">
                </div>
                <div class="flex flex-col justify-centerx">
                    <p class="text-sm">Lorem, ipsum dolor. </p>
                    <p class="text-gray-700 text-xs">{{post.created}}</p>
                </div>
            </div>
            <h2 class="my-3 line-clamp-2">{{post.title}}</h2>

            <div class="mt-3 ">
                <div class="rounded-lg overflow-hidden">
                    <img :src="post.picture" alt="">
                </div>
                <div class="mt-3 text-bold line-clamp-4" v-html="post.description">
                   
                </div>
            </div>

        </Link>
    </section>
    </BlogLayout>
</template>

<script setup>
import Guest from '@/Layouts/Guest.vue';
import Dialog from 'primevue/dialog';
import BlogLayout from './BlogLayout.vue';
import {
    Head,
    Link
} from '@inertiajs/inertia-vue3';
import {
    ref
} from 'vue';
const props = defineProps({
    posts:Object,
});
</script>
