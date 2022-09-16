<template>
    <div>
        <h3 class="text-bold my-3">Les plus populaires</h3>
        <template v-for="(post, index) in posts" :key="index">
            <Link :href="route('post.show',[post.slug])">
                <div class="relative rounded-3 overflow-hidden">
                <img :src="post.picture" alt="" class=" w-full ">
                <div class="w-full h-full flex items-end z-10 absolute top-0 p-3 bg-gradient-custom ">
                    <div class="">
                        <div class="mt-2">
                            <h5 class=" text-uppercase text-sm">{{post.title}}</h5>
                            <p class="mt-3 line-clamp-2 font-bold ">{{post.description}}</p>
                            <div class="my-3"></div>
                        </div>
                        <div class="flex justify-between text-sm pt-2 border-top">
                            <p>Par <strong><Link :ref="route('post.author',[post.owner.username])">{{post.owner.username}}</Link></strong></p>
                            <small>{{post.created}}</small>
                        </div>
                    </div>
                </div>
            </div>
            </Link>

            <div class="border w-full my-3"></div>
        </template>

    </div>
</template>
<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import axios from "axios";
import { onMounted, ref } from "vue";
const posts = ref([]);

 axios.get(route('Api-post.popular')).then((rsp)=>{
        console.log('get post',rsp.data)
        posts.value = rsp.data.posts;
    });
/* onMounted(() => {

});

 */

</script>
