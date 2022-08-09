<template>
    <Head>
        {{props.post.title}}
    </Head>
    <BlogLayout>
        <div class="grid grid-cols-7 mt-5">
            <div class="col-span-5">
                <div class="container mx-auto">
                     <h1 class="bg-white border rounded-lg p-3 my-3">{{props.post.title}}</h1>
                    <div class="bg-white border rounded-lg p-3 my-3">
                        <img :src="props.post.picture" class="rounded-lg" alt="">
                    </div>
                    <div class="bg-white border rounded-lg p-3 my-3" v-html="props.post.description">
                        
                    </div>
                    <div  class="bg-white border rounded-lg p-3 my-3 flex justify-between">
                        
                        <Link v-if="$page.props.auth && $page.props.auth.id == props.author.id " v-tooltip.bottom="'Modifier'" :href="route('dashboard.user.edit',props.author.id)" class="flex justify-center items-center rounded-lg border px-2 h-8 mx-2 text-xs bg-blue-500 hover:bg-blue-700 text-white"><i class="bi bi-pen mr-2"></i> Modifier</Link>
                    </div>
                </div>
               
            </div>
            <div class="col-span-2 mx-2">
               <PopularPostBar/>
            </div>
        </div>
    </BlogLayout>
</template>
<script setup>
import Guest from '@/Layouts/Guest.vue';
import { Head,Link } from '@inertiajs/inertia-vue3';
import PopularPostBar from '@/Components/PopularPostBar.vue';
import BlogLayout from './BlogLayout.vue';
    const props = defineProps({
        author:Object,
    });

</script>