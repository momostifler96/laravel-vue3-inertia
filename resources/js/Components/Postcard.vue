<template>
   <div class="p-3 rounded-3 bg-white shadow">
        <div class="overflow-hidden rounded-3 relative w-full" style="">
            <img class="" :src="post.picture" alt="">
        </div>
        <div class="mt-2">
            <h5>{{post.title}}</h5>
            <p class="mt-3 line-clamp-4">{{post.description}}</p>
            <div class="my-3"></div>
        </div>
        <div class="flex justify-between text-sm pt-2 border-top">
            <p>Par <strong>Mohamed doumbia</strong></p>
            <p>20 septembre 2022 a 19h45</p>
        </div>
    </div>
</template>
<script setup>
    const props = defineProps({post:Object});

</script>
