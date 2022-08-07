<template>
    <div class="">
        <h3 class="text-bold">Recherche</h3>
        <form @submit.prevent="submit" class="flex items-center">
            <input type="text" name="search" class="rounded-lg bg-white-100 hover:bg-blue-300 h-10 w-full border"  v-model="search" placeholder="Chercher des articles" id="">
            <button type="submit" class="flex justify-center items-center rounded-lg border w-10 h-10 text-black m-2 text-xs bg-white hover:bg-blue-100 ml-2"><i class="bi bi-search"></i></button>
        </form>

    </div>
</template>
<script>
import { Inertia } from "@inertiajs/inertia"

const props = defineProps({
    route:String,
    param:String,
})

const submit = ()=>{
    Inertia.get(props.route);
}
</script>