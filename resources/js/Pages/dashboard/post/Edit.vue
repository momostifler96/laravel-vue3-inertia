<template>
    <Head>
        
    </Head>
    <Auth>
        <h3 class="text-3xl text-bold text-center my-3">Ajouter une publication</h3>

        <form @submit.prevent="submit" class="mb-5">
            <div class="relative bg-white border rounded-lg p-2 my-3">
                <label for="title">Titre</label>
                <div class="">
                    <input required v-model="form.title" type="text" id="title" class="rounded-lg border h-10 w-full text-black text-sm hover:bg-blue-100 focus:shadow" placeholder="Titre">
                </div>
            </div>
            <div class="relative bg-white border grid grid-cols-1 g-4 lg:grid-cols-3 rounded-lg p-2 my-3">
                <div class="flex flex-col m-2">
                    <label for="title">Type</label>
                    <Dropdown v-model="form.type" :options="type" optionLabel="name"  optionValue="data" placeholder="Type de post" />
                </div>
                <div class="flex flex-col m-2">
                    <label for="title">Categorie</label>
                    <Dropdown v-model="form.categorie" :options="props.categories" optionLabel="name" filter="true" optionValue="id" placeholder="Categories" />
                </div>
                <div class="flex flex-col m-2">
                    <label for="title">Mots cle</label>
                    <MultiSelect filter v-model="form.tag" :options="props.tags" optionLabel="name" placeholder="Mots cle" display="chip" />
                </div>
            </div>
            <!-- <div class=" my-3 ">
                <div class="">
                    <label for="title">Telechager vos images ici</label>
                    <div class="">
                        <FileLoader fileType="image" :maxFileSize="5" :fileLimit="3" @uploader="(e)=>{form.images}">
                            <template #empty>
                                Gisser deposser vos images ici
                            </template>
                        </FileLoader>
                    </div>
                </div>
                <div class="mt-5">
                    <label for="title">Telechager vos videos ici</label>
                    <div class="">
                         <FileLoader fileType="video" :maxFileSize="100" :fileLimit="2" @uploader="(e)=>{form.videos}">
                            <template #empty>
                                Gisser deposser vos videos ici
                                
                            </template>
                        </FileLoader> 
                        
                        <ImageLoad/>

                    </div>
                </div>
            </div> -->
            <div class="relative bg-white border rounded-lg p-2 my-3">
                <label for="contente">Contenu</label>
                <div class="">
                    <Editor v-model="form.contente" required id="contente" height="200px" class="h-70"/>
                </div>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="py-2 px-3 rounded-lg bg-blue-500 hover:bg-blue-700 text-white"><i class="pi pi-plus"></i> Publier</button>
            </div>
        </form>
        
    </Auth>
</template>
<script setup>
import Auth from '@/Layouts/Auth.vue';
import { Head,Link } from '@inertiajs/inertia-vue3';
import Editor from '@/Components/Editor.vue';
import FileLoader from '@/Components/FileLoader.vue';
import { useToast } from 'primevue/usetoast';
import { Inertia } from '@inertiajs/inertia';
import { ref } from 'vue';
import Dropdown from 'primevue/dropdown';
import MultiSelect from 'primevue/multiselect';

const props = defineProps({
    categories:Object,
    tags:Object,
    post:Object,
    flash:Object,

})


console.log('props values',props.categories);
const form = ref({
    type:0,
    categorie:props.post.category_id,
    tag:[],
    title:props.post.title,
    contente:props.post.description,
    id:props.post.id,

});

const submit = ()=>{
    console.log('form data',form.value.categorie);

    if (form.value.categorie,form.value.type) {
        Inertia.post(route('dashboard.post.update'),form.value);
    }
    else{
        alert("Veillez tout complete les champs");
    }
}
const  type = ref( [
        {name:'Article',data:'article'},
        {name:'Video',data:'video'},
       
    ]);
const onUpload = () => {
    alert("Ficher charger")
}
</script>