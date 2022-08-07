<template>
    <Head>
        
    </Head>
    <Auth>
        <ConfirmPopup></ConfirmPopup>
        <h3 class="text-3xl text-bold text-center my-3">Mes publications</h3>
        <section class="container mx-auto mb-5">
            <nav class="flex justify-between relative bg-white border rounded-lg p-2 h-14 my-3">
                
                <div class="flex">
                        <select name="" id="" class="rounded-lg border h-10 text-black  text-sm hover:bg-blue-100 ">
                        <option value="1">cette semaine</option>
                    </select>
                        <select v-model="sortByCategory" @change="sortByCategoryF" name="" id="" class="rounded-lg border mx-2 h-10 text-black  text-sm hover:bg-blue-100 ">
                        <option :value="0">Touts</option>
                        <option v-for="(cat, index) in props.categories" :key="index" :value="cat.id">{{cat.name}}</option>
                    </select>
                </div>

                <div class="">
                    <input type="text" class="rounded-lg border h-10 text-black text-sm hover:bg-blue-100 focus:shadow" placeholder="Recherche ...">
                </div>
                <Link :href="route('dashboard.post.create')"  class="rounded-lg border h-10 text-white text-sm bg-blue-500 hover:bg-blue-900 focus:shadow flex items-center px-2" >Ajouter un article</Link>

            </nav>

            <table class="table table-hover shadow bg-white border rounded-lg">
            <thead>
                <tr>
                    <th>#</th>
                    <th colspan="4">titre</th>
                    <th>description</th>
                    <th class="text-end">actions</th>
                </tr>
                
            </thead>

            <tbody>
                <tr class="" v-for="(post, index) in props.posts.data" :key="index">
                    <td>{{post.id}}</td>
                    <td colspan="4" class="">{{post.title}}</td>
                    <td class="">
                        <div class="line-clamp-1">
                            {{post.description}}
                        </div>
                    </td>
                    <td>
                        <div class="flex items-center justify-end">
                            <Link v-tooltip.bottom="'Voire'" :href="route('post.show',post.slug)" class="flex justify-center items-center rounded-lg border w-8 h-8 text-xs bg-blue-100 hover:bg-blue-300 text-blue-900"><i class="bi bi-eye"></i></Link>
                            <Link v-tooltip.bottom="'Modifier'" :href="route('dashboard.post.edit',post.slug)" class="flex justify-center items-center rounded-lg border w-8 h-8 mx-2 text-xs bg-yellow-100 hover:bg-yellow-300 text-yellow-900 hover:text-yellow-900"><i class="bi bi-pen"></i></Link>
                            <button v-tooltip.bottom="'Supprimer'" @click="deletePost(e,post.id)" class="flex justify-center items-center rounded-lg border w-8 h-8  text-xs bg-red-100 hover:bg-red-300 text-red-900"><i class="bi bi-trash"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
            </table>

            <nav class="flex justify-center relative bg-white border rounded-lg p-2 h-14 my-3">
                <div class="flex mx-3 items-center">
                    <Link  v-if="props.posts.current_page>1" :href="`?page=${props.posts.current_page-1}`" class="flex items-center justify-center rounded-lg border px-2 h-8 text-black hover:bg-blue-300"><i class="bi bi-chevron-left"></i> </Link>
                    <button v-else  disabled class="flex items-center justify-center rounded-lg border px-2 h-8 text-black bg-blue-500 text-white"><i class="bi bi-chevron-left"></i></button>
                </div>
                <div v-for="(item, index) in props.posts.last_page" :key="index" class="mx-1 flex items-center justify-end left-0">
                    <Link  :href="`?page=${item}`" :class="`${props.posts.current_page==item?'bg-blue-500 text-white':''} hover:bg-blue-300 rounded-lg border w-8 h-8 text-black flex items-center justify-center`">{{item}}</Link>
                </div>
                <div class="flex items-center mx-3  left-0">
                    <Link  v-if="props.posts.current_page<props.posts.last_page" :href="`?page=${props.posts.current_page+1}`" class="flex items-center justify-center rounded-lg border px-2 h-8 text-black hover:bg-blue-300"><i class="bi bi-chevron-right"></i> </Link>
                    <button v-else  disabled class="flex items-center justify-center rounded-lg border px-2 h-8 text-black bg-blue-500 text-white"><i class="bi bi-chevron-right"></i></button>

                </div>
            </nav>

        </section>
    </Auth>
</template>
<script setup>
import Auth from '@/Layouts/Auth.vue';
import { Inertia } from '@inertiajs/inertia';
import { Head,Link } from '@inertiajs/inertia-vue3';
import ConfirmPopup from 'primevue/confirmpopup';
import QueryString from 'qs';
import { ref } from 'vue';
import { useConfirm } from "primevue/useconfirm";

const props = defineProps({
                posts:Object,
                categories:Object,
                flash:Object,
                });


let queryString = new URLSearchParams(window.location.search);
let cat = queryString.has('category')?queryString.get('category'):0;
const sortByCategory = ref(cat);
const sortByDate = ref();

const sortByCategoryF = (e)=>{
    if(e.target.value == 0){
        queryString.delete('category');
    }else{
        queryString.set('category',e.target.value)
    }
    Inertia.get(`?${queryString}`);
};

const sortByDateF = (e)=>{

};

const confirm = useConfirm();

const deletePost = (e,id)=>{
    confirm.require({
        message: 'Vous etes sur de suprimer ca ?',
        header: 'Supression d\'article',
        icon: 'pi pi-info-circle',
        acceptClass: 'p-button-danger',
        accept: () => {
            Inertia.post(route('dashboard.post.delete'),{id:id})
        },
        reject: () => {
            //callback to execute when user rejects the action
        }
    });
}

</script>