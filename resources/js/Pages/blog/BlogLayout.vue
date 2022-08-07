<template>
<Head>

</Head>
<Guest>
    <section>
        <nav class="flex justify-center relative bg-white border rounded-lg p-2  h-10">
            <div class="absolute left-0 top-0 z-10 flex items-center h-100">
                <button @click="showCategories=true" class="flex justify-center items-center rounded-lg border w-8 h-8 text-black m-2 text-xs hover:bg-blue-100"><i class="bi bi-chevron-double-right"></i></button>
            </div>
            <ul class=" hidden lg:flex ">
                <li>
                    <Link :href="route('home.index')" class="hover:bg-blue-100 text-black  hover:text-white px-3 py-1 rounded-lg">Gbairai chaud</Link>
                </li>
                <li>
                    <Link :href="route('post.index')" class="hover:bg-blue-100 text-black  hover:text-white px-3 py-1 rounded-lg">Buzz du moment</Link>
                </li>
                <li>
                    <Link :href="route('home.support')" class="hover:bg-blue-100 text-black hover:text-white px-3 py-1 rounded-lg">Dernier series</Link>
                </li>
                <li>
                    <Link :href="route('home.support')" class="hover:bg-blue-100 text-black hover:text-white px-3 py-1 rounded-lg">Evenments </Link>
                </li>
                <li>
                    <Link :href="route('home.help')" class="hover:bg-blue-100 text-black  hover:text-white px-3 py-1 rounded-lg">Actualites du pays</Link>
                </li>

            </ul>
            <div class="absolute right-0 top-0 z-10 flex items-center h-100">
                <button @click="showSearch=true" class="flex justify-center items-center rounded-lg border w-8 h-8 text-black m-2 text-xs hover:bg-blue-100"><i class="bi bi-search"></i></button>
            </div>
        </nav>
    </section>
    <slot/>
</Guest>
<Dialog v-model:visible="showSearch" :breakpoints="{'960px': '75vw', '640px': '90vw'}" :style="{width: '50vw'}" :closable="false" class="rounded-lg overflow-hidden">
    <template #header>
        <div class="w-full">
            <div class="flex justify-between items-center mb-2">
                <h3 class="text-bold text-xl">Recherche</h3>
                <button @click="showSearch=false" class="flex justify-center items-center rounded-lg border w-8 h-8  text-xs text-gray-500 hover:bg-blue-100"><i class="pi pi-times text-xs"></i></button>

            </div>
            <div class="flex">
                <input type="text" name="search" class="rounded-lg bg-blue-100 w-full"  v-model="search" placeholder="Chercher des articles" id="">
            </div>
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
       
    </template>
</Dialog>
<Dialog v-model:visible="showCategories" :breakpoints="{'960px': '75vw', '640px': '90vw'}" :style="{width: '50vw'}" :closable="false" class="rounded-lg overflow-hidden">
            <template #header>
                <div class="w-full">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-bold text-xl">Categories</h3>
                        <button @click="showCategories=false" class="flex justify-center items-center rounded-lg border w-8 h-8  text-xs text-gray-500 hover:bg-blue-100"><i class="pi pi-times text-xs"></i></button>

                    </div>
                    <div class="flex">
                        <input type="text" name="search" class="rounded-lg bg-blue-100 w-full"  v-model="search" placeholder="Recherche de categories" id="">
                    </div>
                </div>
                
            </template>
           <div v-for="(item, index) in 40" :key="index" class="my-2">
                <Link class="flex justify-between w-full text-black p-3 py-2 border rounded-lg hover:bg-gray-100" >
                <span>Gbairai chaud</span>
                <span class="text-gray-500 text-sm">344456</span>
                </Link>
           </div>
           <template #footer>
       
    </template>
           
        </Dialog>
</template>

<script setup>
import Guest from '@/Layouts/Guest.vue';
import Dialog from 'primevue/dialog';
import {
    Head,
    Link
} from '@inertiajs/inertia-vue3';
import {
    ref
} from 'vue';
const showCategories = ref(false);
const showSearch = ref(false);
</script>
