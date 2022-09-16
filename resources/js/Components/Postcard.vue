<template>

   <div class="p-1 rounded-3 bg-white shadow">
            <Link :href="route('post.show',[post.slug])">
                <div class="overflow-hidden rounded-3 relative w-full" style="">
                    <img class="" :src="post.picture" alt="">
                </div>
            </Link>

            <div class="p-2">
                <div class="mt-2">
                    <h5>{{post.title}}</h5>
                    <p class="mt-3 line-clamp-4">{{post.description}}</p>
                    <div class="my-3"></div>
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

    const props = defineProps({post:Object});

</script>
