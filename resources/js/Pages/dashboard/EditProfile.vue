<template>
    <Head>
        
    </Head>
    <Auth>
        <h3 class="text-3xl text-bold text-center my-3">Mon profile</h3>

        <div class="flex justify-center">
            <form @submit.prevent="submit" class="w-96">
                    <div class="flex justify-center my-5">
                        <div class="h-32 w-32 rounded-full overflow-hidden border-lg">
                            <img src="/images/avatar.png" alt="">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 mt-5 -mx-3">
                        <div class="px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">Nom</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                                <input type="text" v-model="form.first_name" v-maska="" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="John" required>
                            </div>
                        </div>
                        <div class=" px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">Prenom</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                                <input type="text" v-model="form.last_name" v-maska="" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="Smith"  required>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-2 -mx-3">
                        <div class="px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">Nom d'utilisateur</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                                <input type="text" v-model="form.username" v-maska="" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="John" required>
                            </div>
                        </div>
                        <div class=" px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">Numero de telephone</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                                <input type="text" v-model="form.phone" v-maska="" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="Smith"  required>
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">Email</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-email-outline text-gray-400 text-lg"></i></div>
                                <input type="email" v-model="form.email" v-maska="" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="johnsmith@example.com" required disabled>
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-12">
                            <label for="" class="text-xs font-semibold px-1">Mot de passe</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-lock-outline text-gray-400 text-lg"></i></div>
                                <input type="password" v-model="form.password" v-maska="" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="************" >
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-12">
                            <label for="" class="text-xs font-semibold px-1">Confirmer le mot de passe</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-lock-outline text-gray-400 text-lg"></i></div>
                                <input type="password" v-model="form.confirmPassword" v-maska="" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="************" >
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5 flex justify-center items-center ">
                            <button type="submit" class="flex justify-center items-center rounded-lg border px-2 h-10 mx-2 text-xs w-32 bg-blue-500 hover:bg-blue-700 text-white mt-2"><i class="bi bi-pen mr-2"></i> Modifier</button>
                        </div>
                    </div>
                </form>
        </div>
    </Auth>
</template>
<script setup>
import Auth from '@/Layouts/Auth.vue';
import { Inertia } from '@inertiajs/inertia';
import { Head,Link, usePage } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';

const props = usePage().props.value;

const form = ref({
    first_name:props.auth.first_name?props.auth.first_name:'',
    last_name:props.auth.last_name?props.auth.last_name:'',
    username:props.auth.username,
    phone:props.auth.phone,
    email:props.auth.email,
    password:'',
    confirmPassword:'',
});

const formError = ref({
    first_name:false,
    last_name:false,
    username:false,
    phone:false,
    password:false,
    confirmPassword:false,
});

 function submit() {
    let validated = true;

    

    if(form.value.confirmPassword != form.value.password){
        validated = false;
        formError.confirmPassword = true;
        formError.password = true;
        toast.fire({
            text:"Le mot de pass ne coresspond pas",
            icon:"error"
        })
    }
    if (validated) {
        Inertia.post(route("dashboard.updateProfile"), form.value);
    }

    }
</script>