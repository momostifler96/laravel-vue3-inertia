<template>
    <Head>
        
    </Head>
    <Auth>
        <section class="container mx-auto my-5">
                    <nav class="flex justify-between relative bg-white border rounded-lg p-2 h-14 my-3">
                        <select name="" id="" class="rounded-lg border h-10 text-black  text-sm hover:bg-blue-100 ">
                            <option value="1">cette semaine</option>
                        </select>

                        <div class="">
                            <input type="text" class="rounded-lg border h-10 text-black text-sm hover:bg-blue-100 focus:shadow" placeholder="Recherche ...">
                        </div>
                        <Link class="rounded-lg border h-10 text-white text-sm bg-blue-500 hover:bg-blue-900 focus:shadow flex items-center px-2" >Ajouter un article</Link>

                    </nav>

            <table class="table table-hover shadow bg-white border rounded-lg">
            <thead>
                <tr>
                    <th>#</th>
                    <th>titre</th>
                    <th>description</th>
                    <th class="text-end">actions</th>

                </tr>
                
            </thead>

            <tbody>
                <tr v-for="(item, index) in 25" :key="index">
                    <td>{{index}}</td>
                    <td>data title</td>
                    <td>data description</td>
                    <td>
                        <div class="flex items-center justify-end">
                            <Link class="flex justify-center items-center rounded-lg border w-8 h-8 text-xs bg-blue-100 hover:bg-blue-300 text-blue-900"><i class="bi bi-eye"></i></Link>
                            <Link :href="route('dashboard.post.edit',index)" class="flex justify-center items-center rounded-lg border w-8 h-8 mx-2 text-xs bg-yellow-100 hover:bg-yellow-300 text-yellow-900 hover:text-yellow-900"><i class="bi bi-pen"></i></Link>
                            <button class="flex justify-center items-center rounded-lg border w-8 h-8  text-xs bg-red-100 hover:bg-red-300 text-red-900"><i class="bi bi-trash"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
            </table>
        </section>
    </Auth>
</template>
<script setup>
import Auth from '@/Layouts/Auth.vue';
import { Head,Link } from '@inertiajs/inertia-vue3';

</script>