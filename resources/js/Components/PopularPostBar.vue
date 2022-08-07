<template>
    <div>
        <h3 class="text-bold my-3">Les plus populaires</h3>
        <template v-for="(post, index) in posts" :key="index">
            <Link :href="route('post.show',post.slug)"  class="bg-white border rounded-lg p-3 my-3 block">
                <img :src="post.picture" class="rounded-lg" alt="">
                <p class="border rounded p-2 text-sm line-clamp-2 mt-2 bg-gray-100" >{{post.title}}</p>
            </Link>
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