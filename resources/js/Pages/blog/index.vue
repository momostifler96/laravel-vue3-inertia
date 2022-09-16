<template>
<Head>

</Head>
    <BlogLayout>
        <div class="grid git">

        </div>
        <div class="grid grid-cols-7 my-5 container">
            <div class="col-span-5">
                <section class=" my-5 container-sm">
                    <p class="text-4xl text-bold text-center mb-5">Les plus recents</p>
                    <div class="grid grid-cols-2 lg:grid-cols-2 gap-3">
                        <Postcard v-for="(post, index) in posts.data" :key="index" :post="post" />
                    </div>
                    <Pagination :currentPage="posts.current_page" :lastPage="posts.last_page" />

                </section>
            </div>
            <div class="col-span-2">
                <section class=" p-3">
                    <p class="text-xl text-bold text-center my-4">Les plus consulté</p>

            <Link :href="route('post.show',[posts.data[0].slug])">
                <div class="relative rounded-3 overflow-hidden">
                <img :src="posts.data[0].picture" alt="" class=" w-full ">
                <div class="w-full h-full flex items-end z-10 absolute top-0 p-3 bg-gradient-custom ">
                    <div class="">
                        <div class="mt-2">
                            <h5 class=" text-uppercase text-sm">{{posts.data[0].title}}</h5>
                            <p class="mt-3 line-clamp-2 font-bold ">{{posts.data[0].description}}</p>
                            <div class="my-3"></div>
                        </div>
                        <div class="flex justify-between text-sm pt-2 border-top">
                            <p>Par <strong><Link :ref="route('post.author',[posts.data[0].owner.username])">{{posts.data[0].owner.username}}</Link></strong></p>
                            <small>{{posts.data[0].created}}</small>
                        </div>
                    </div>

                </div>
            </div>
            </Link>

            <div class="border w-full my-3"></div>
            <Link :href="route('post.show',[posts.data[0].slug])">
                <div class="relative rounded-3 overflow-hidden">
                <img :src="posts.data[0].picture" alt="" class=" w-full ">
                <div class="w-full h-full flex items-end z-10 absolute top-0 p-3 bg-gradient-custom ">
                    <div class="">
                        <div class="mt-2">
                            <h5 class=" text-uppercase text-sm">{{posts.data[0].title}}</h5>
                            <p class="mt-3 line-clamp-2 font-bold ">{{posts.data[0].description}}</p>
                            <div class="my-3"></div>
                        </div>
                        <div class="flex justify-between text-sm pt-2 border-top">
                            <p>Par <strong><Link :ref="route('post.author',[posts.data[0].owner.username])">{{posts.data[0].owner.username}}</Link></strong></p>
                            <small>{{posts.data[0].created}}</small>
                        </div>
                    </div>

                </div>
            </div>
            </Link>
            <div class="border w-full my-3"></div>
            <Link :href="route('post.show',[posts.data[0].slug])">
                <div class="relative rounded-3 overflow-hidden">
                <img :src="posts.data[0].picture" alt="" class=" w-full ">
                <div class="w-full h-full flex items-end z-10 absolute top-0 p-3 bg-gradient-custom ">
                    <div class="">
                        <div class="mt-2">
                            <h5 class=" text-uppercase text-sm">{{posts.data[0].title}}</h5>
                            <p class="mt-3 line-clamp-2 font-bold ">{{posts.data[0].description}}</p>
                            <div class="my-3"></div>
                        </div>
                        <div class="flex justify-between text-sm pt-2 border-top">
                            <p>Par <strong><Link :ref="route('post.author',[posts.data[0].owner.username])">{{posts.data[0].owner.username}}</Link></strong></p>
                            <small>{{posts.data[0].created}}</small>
                        </div>
                    </div>

                </div>
            </div>
            </Link>


        </section>
            </div>
        </div>


    </BlogLayout>
</template>

<script setup>
import Guest from '@/Layouts/Guest.vue';
import Dialog from 'primevue/dialog';
import BlogLayout from './BlogLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import FileLoader from '@/Components/FileLoader.vue';

import {
    Head,
    Link
} from '@inertiajs/inertia-vue3';
import {
    ref
} from 'vue';
import Postcard from '@/Components/Postcard.vue';
const props = defineProps({
    posts:Object,
});
</script>
