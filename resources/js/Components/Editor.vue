<template>
    <Editor :editorStyle="'height:'+props.height" :class="props.class" :id="props.id" />
        
</template>
<script setup>
    import Editor from 'primevue/editor';
    const props = defineProps({
        class:String,
        id:String,
        height:String
    });

</script>
