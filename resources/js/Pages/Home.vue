<template>
    <Head>

    </Head>
    <Guest>
        <div class="flex justify-center items-center flex-col h-96 p-5 rounded-3 bg-white border">
            <h1 class="text-5xl text-bold text-center">Le monde Gbairai</h1>
            <h2 class="text-3xl text-bold text-pink-500 text-center my-3">Les meilleur buz</h2>
            <P class="text-grey text-sm text-center">Parcourir les différent categories pour découvrir <br> encore plus de sujet passionnant du moment et les actualités</P>
            <div class="p-2 flex bg-white rounded-3 mt-3">
                <input type="text" name="" id="" class="border border-transparent bg-transparent p-2 rounded-3" placeholder="Recherche...">
                <button class="rounded-3 p-2 bg-primary ml-2 text-white">Chercher</button>
            </div>
        </div>
        <div class="grid grid-cols-7 my-5 container">
            <div class="col-span-5">

        <section class=" p-3">
            <Link :href="route('post.show',[posts[0].slug])">
                <div class="relative rounded-3 overflow-hidden">
                <img :src="posts[0].picture" alt="" class=" w-full ">
                <div class="w-full h-full flex items-end z-10 absolute top-0 p-3 bg-gradient-custom ">
                    <div class="">
                        <div class="mt-2">
                            <h5 class=" text-uppercase font-bold">{{posts[0].title}}</h5>
                            <p class="mt-3 line-clamp-2 font-bold text-4xl">{{posts[0].description}}</p>
                            <div class="my-3"></div>
                        </div>
                        <div class="flex justify-between text-sm pt-2 border-top">
                            <p>Par <strong><Link :ref="route('post.author',[posts[0].owner.username])">{{posts[0].owner.username}}</Link></strong></p>
                            <small>{{posts[0].created}}</small>
                        </div>
                    </div>

                </div>
            </div>
            </Link>


        </section>
        <section>
            <div class="flex justify-center items-center flex-col h-96 p-5 rounded-3 bg-white border">

            </div>
        </section>
        <section class=" border-top my-5 container-sm">
            <p class="text-4xl text-bold text-center my-4">Les plus recents</p>
            <div class="grid grid-cols-2 lg:grid-cols-2 gap-3">
                <Postcard v-for="(post, index) in posts" :key="index" :post="post" />
            </div>

        </section>
        <PostListBlock title="Fil et série" link="#" :posts="posts"/>
        <PostListBlock title="Evenements" link="#" :posts="posts"/>
        <PostListBlock title="Sport" link="#" :posts="posts"/>
            </div>
            <div class="col-span-2">
                <PostList :post="posts[1]"/>
                    <PostList :post="posts[2]"/>
            </div>
        </div>


    </Guest>
</template>
<script setup>
import Guest from '@/Layouts/Guest.vue';
import { Head,Link } from '@inertiajs/inertia-vue3';
import Postcard from '@/Components/Postcard.vue';
import PostCardSieBar from '@/Components/PostCardSideBar.vue';
import CategoriesBock from '@/Components/CategoriesBock.vue';
import PostList from '@/Components/PostList.vue';
import PostListBlock from '@/Components/PostListBlock.vue';
const props = defineProps({
    posts:Object,
});

console.log('posts',props.posts)
</script>
