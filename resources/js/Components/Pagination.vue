<template>
    <nav class="flex justify-center relative bg-white border rounded-lg p-2 h-14 my-3">
        <div class="flex mx-3 items-center">
            <Link  v-if="currentPage>1" :href="`?page=${currentPage-1}`" class="flex items-center justify-center rounded-lg border px-2 h-8 text-black hover:bg-blue-300"><i class="bi bi-chevron-left"></i> </Link>
            <button v-else  disabled class="flex items-center justify-center rounded-lg border px-2 h-8 text-black bg-blue-500 text-white"><i class="bi bi-chevron-left"></i></button>
        </div>
        <div v-for="(item, index) in lastPage" :key="index" class="mx-1 flex items-center justify-end left-0">
            <Link  :href="`?page=${item}`" :class="`${currentPage==item?'bg-blue-500 text-white':''} hover:bg-blue-300 rounded-lg border w-8 h-8 text-black flex items-center justify-center`">{{item}}</Link>
        </div>
        <div class="flex items-center mx-3  left-0">
            <Link  v-if="currentPage<lastPage" :href="`?page=${currentPage+1}`" class="flex items-center justify-center rounded-lg border px-2 h-8 text-black hover:bg-blue-300"><i class="bi bi-chevron-right"></i> </Link>
            <button v-else  disabled class="flex items-center justify-center rounded-lg border px-2 h-8 text-black bg-blue-500 text-white"><i class="bi bi-chevron-right"></i></button>

        </div>
    </nav>
</template>
<script setup>
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
    currentPage:Number,
    lastPage:Number,
})

</script>
