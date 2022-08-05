<template>
    <header class="lg:container mx-auto p-3">
        <nav class="grid grid-cols-1 lg:grid-cols-3 gap-1 relative">
            <div class="flex lg:hidden  items-center justify-end absolute lg:relative left-0">
                <button class="flex bg-white justify-center items-center rounded-lg border w-8 h-8 text-black hover:bg-blue-300"><i class="bi bi-justify-left"></i></button>
            </div>
            <div class="flex justify-center lg:justify-start text-xl text-700">
                <div class=""><Logo/></div>
            </div>
            <div class=" hidden lg:flex justify-center items-center sm:mt-3 lg:mt-0">
                <ul class="flex text-sm">
                    <li><Link :href="route('home.index')" class="hover:bg-blue-300 text-black  hover:text-white px-2 lg:px-3 py-1 rounded-lg">Acceuil</Link></li>
                    <li><Link :href="route('post.index')" class="hover:bg-blue-300 text-black  hover:text-white px-2 lg:px-3 py-1 rounded-lg">Actus</Link></li>
                    <li><Link :href="route('home.help')" class="hover:bg-blue-300 text-black  hover:text-white px-2 lg:px-3 py-1 rounded-lg">Infos</Link></li>
                    <li><Link :href="route('home.support')" class="hover:bg-blue-300 text-black hover:text-white px-2 lg:px-3 py-1 rounded-lg">Contacts</Link></li>
                </ul>
            </div>
            <div class="flex items-center justify-end absolute lg:relative right-0">
                <template v-if="$page.props.auth">
                    <Link :href="route('dashboard.index')" class="flex mx-2 bg-white justify-center items-center rounded-lg border w-10 h-10 text-black hover:bg-blue-300"><img :src="$page.props.auth.picture" alt=""></Link>
                </template>
                <template v-else>
                    <Link :href="route('login')" class="flex mx-2 bg-white justify-center items-center rounded-lg border w-8 h-8 text-black hover:bg-blue-300"><i class="bi bi-person"></i></Link>
                    <Link :href="route('register')" class="flex bg-white justify-center items-center rounded-lg border w-8 h-8 text-black hover:bg-blue-300"><i class="bi bi-person-plus"></i></Link>
                </template>

            </div>
        </nav>
    </header>
    <Dialog header="Header" v-model:visible="showSearch" :breakpoints="{'960px': '75vw', '640px': '90vw'}" :style="{width: '50vw'}">
            <template #header>
                <div class="flex justify-between">
                    <h3>Recherche</h3>

                    <div class="">
                        <button class="flex justify-center items-center rounded-lg border w-8 h-8 text-black m-2 text-xs hover:bg-blue-100" @click="showSearch=false"><i class="bi bi-search"></i></button>
                    </div>

                </div>
                <div class="flex bg-blue-100 border">
                    <input type="text" name="search" v-model="search" placeholder="Chercher des articles" id="">
                </div>
            </template>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                culpa qui officia deserunt mollit anim id est laborum.</p>

            <p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est,
                qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam,
                quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur,
                vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>

            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident,
                similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio
                cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe
                eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
            <template #footer>
                <Button label="No" icon="pi pi-times" @click="closeBasic2" class="p-button-text"/>
                <Button label="Yes" icon="pi pi-check" @click="closeBasic2" autofocus />
            </template>
        </Dialog>
        
</template>
<script setup>
import { Link, usePage } from '@inertiajs/inertia-vue3';
import Logo from '@/Components/Logo.vue';
import { ref } from 'vue';
const showPages = ref(false)
const page = usePage().props.value;

if(page.flash.success){
    toast.fire({text:page.flash.success,icon:"success"});
}
if(page.flash.warning){
    toast.fire({text:page.flash.warning,icon:"warning"});
}
if(page.flash.error){
    toast.fire({text:page.flash.error,icon:"error"});
}

</script>