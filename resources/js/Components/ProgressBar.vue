<template>
    <div class="bg-blue-200 border rounded-full w-full overflow-hidden relative flex justify-center text-xs text-white justify-center items-center" style="height: 15px">
        <span class="z-10 ">{{value}}%</span>
        <div :class="`absolute top-0 left-0 h-full ${color}  overflow-center`" :style="`width: ${value}%;`">
        </div>
    </div>
</template>
<script setup>
    const props = defineProps({
        color:String,
        value:String,
    });
</script>