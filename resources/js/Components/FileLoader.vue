<template>
    <div>
        <FileUpload name="demo[]"
            :previewWidth="250" 
            :showUploadButton="false" 
            chooseLabel="Charger" 
            cancelLabel="Annuler" 
            :customUpload="true" 
            v-on:upload="onUpload"
            v-on:uploader="onUploader"
            :fileLimit="props.fileLimit" 
        :progress="progress"
            :multiple="true" 
            :accept="`${props.fileType}/*`" 
            :maxFileSize="props.maxFileSize*1000000"
            :invalidFileTypeMessage="`Veillez choisir des ${props.fileType}s uniquement`"
            :invalidFileSizeMessage="`
            Taille de ficher invalide : votre ${props.fileType} doit avoir une taille inferieur ou egale a {1}
            `"
            invalidFileLimitMessage="Choisisser un maximum de {0} fichers"
            >
            <template #empty>
            <slot name="empty">

            </slot>

        </template>
        </FileUpload>
    </div>
</template>
<script setup>
import FileUpload from 'primevue/fileupload';
import { ref } from 'vue';
const props = defineProps({
    fileType:String,
    maxFileSize:Number,
    fileLimit:Number,
    //onUploader:Function,
    onUpload:Function,
})

const form = ref({});

const onUploader = (e) =>{
    form.value.files = e.files;
    console.log('event files',e.files )
 }

const onUpload = () =>{ 
    console.log('event files');
 }


</script>