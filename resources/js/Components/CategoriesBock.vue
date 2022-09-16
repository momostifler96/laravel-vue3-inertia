<template>
           <section class=" border-top my-5 p-5">
            <div class=" grid grid-cols-2 lg:grid-cols-3 sm:gap-2 lg:gap-5">
                <Link href="#">
                    <div class="border rounded-3 bg-white p-5 flex justify-center items-center">
                        <h5 class="text-3xl text-bold">Filme & série</h5>
                    </div>
                </Link>
                <Link href="#">
                    <div class="border rounded-3 bg-white p-5 flex justify-center items-center">
                        <h5 class="text-3xl text-bold">Sports</h5>
                    </div>
                </Link>
                <Link href="#">
                    <div class="border rounded-3 bg-white p-5 flex justify-center items-center">
                        <h5 class="text-3xl text-bold">Actualités</h5>
                    </div>
                </Link>
                <Link href="#">
                    <div class="border rounded-3 bg-white p-5 flex justify-center items-center">
                        <h5 class="text-3xl text-bold">Technologie</h5>
                    </div>
                </Link>
                <Link href="#">
                    <div class="border rounded-3 bg-white p-5 flex justify-center items-center">
                        <h5 class="text-3xl text-bold">Fait de société</h5>
                    </div>
                </Link>
                <Link href="#">
                    <div class="border rounded-3 bg-white p-5 flex justify-center items-center">
                        <h5 class="text-3xl text-bold">Show-biz</h5>
                    </div>
                </Link>
            </div>

        </section>
</template>
<script setup>
import {Link } from '@inertiajs/inertia-vue3';

</script>
