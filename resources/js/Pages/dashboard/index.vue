<template>
    <Head>
        
    </Head>
    <Auth>
        <div class="grid grid-cols-1 lg:grid-cols-4 g-4">
            <div class="h-64 grid grid-cols-1 lg:grid-cols-3 g-4 col-span-3">
                <div class="m-3 rounded-lg shadow bg-yellow-100 p-3 relative overflow-hidden">
                    <div class="w-full h-full flex absolute justify-center items-center text-9xl">
                        <i class="bi bi-star text-yellow-200"></i>
                    </div>
                    <h5 class="text-bold text-yellow-500">Mes notes</h5>
                    
                </div>
                <div class="m-3 rounded-lg shadow bg-pink-100 p-3 relative overflow-hidden">
                     <div class="w-full h-full flex absolute justify-center items-center text-9xl">
                        <i class="bi bi-chat-dots text-pink-200"></i>
                    </div>
                    <h5 class="text-bold text-pink-500">Mes commentaires</h5>
                    
                </div>
                <div class="m-3 rounded-lg shadow bg-blue-50 p-3 relative overflow-hidden">
                     <div class="w-full h-full flex absolute justify-center items-center text-9xl">
                        <i class="bi bi-newspaper text-blue-100"></i>
                    </div>
                    <h5 class="text-bold text-blue-500">Mes publications</h5>

                </div>
            </div>
            <div class="m-3 rounded-lg shadow bg-white flex flex-col items-center justify-center  col-span-1 p-3 py-5">
                <div class="h-32 w-32 rounded-full overflow-hidden border-lg">
                    <img src="/images/avatar.png" alt="">
                </div>
                <h2 class="my-1 mt-3">{{$page.props.auth.full_name}}</h2>
                <h2 class="my-1 text-sm">@{{$page.props.auth.username}}</h2>
                <h2 class="my-1 text-sm">{{$page.props.auth.email}}</h2>
                <h2 class="my-1 text-sm">{{$page.props.auth.phone}}</h2>
                <Link v-tooltip.bottom="'Modifier'" :href="route('dashboard.edit-profile')" class="flex justify-center items-center rounded-lg border px-2 h-8 mx-2 text-xs bg-blue-500 hover:bg-blue-700 text-white mt-2"><i class="bi bi-pen mr-2"></i> Modifier</Link>

            </div>
            
        </div>
    </Auth>
</template>
<script setup>
import Auth from '@/Layouts/Auth.vue';
import { Head,Link } from '@inertiajs/inertia-vue3';

</script>