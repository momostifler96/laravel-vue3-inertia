<template>
    <Head>
        {{props.post.title}}
    </Head>
    <BlogLayout>
        <div class="grid grid-cols-7 mt-5">
            <div class="col-span-5">
                <div class="container mx-auto">
                     <h1 class="bg-white border rounded-lg p-3 my-3">{{props.post.title}}</h1>
                    <div class="bg-white border rounded-lg p-3 my-3">
                        <img :src="props.post.picture" class="rounded-lg" alt="">
                    </div>
                    <div class="bg-white border rounded-lg p-3 my-3" v-html="props.post.description">
                        
                    </div>
                    <div  class="bg-white border rounded-lg p-3 my-3 flex justify-between">
                        <div class="flex">
                            <div class="h-10 w-10 overflow-hidden rounded-lg">
                                <img :src="props.post.owner.picture" alt="">
                            </div>
                            <div class="items-center flex ml-2">
                                <h2 class="text-sm text-bolde">{{props.post.owner.full_name}}</h2>
                            </div>
                        </div>
                        <Link v-if="$page.props.auth && $page.props.auth.id == props.post.user_id " v-tooltip.bottom="'Modifier'" :href="route('dashboard.post.edit',post.slug)" class="flex justify-center items-center rounded-lg border px-2 h-8 mx-2 text-xs bg-blue-500 hover:bg-blue-700 text-white"><i class="bi bi-pen mr-2"></i> Modifier</Link>
                    </div>
                    <div  class="bg-white border rounded-lg p-3 my-3">
                       <h4 class="text-xl">Laisser un avis</h4>
                       <div class="grid "></div>
                       
                       <form @submit.prevent="submitComment" class="form-group col-span-2">
                        <div class="my-2">
                            <p>Note</p>
                            <Rating v-model="form.rate" :cancel="false"/>
                        </div>
                         <label for="">Commentaire ({{props.post.comments_count}}) - ({{rate}})</label>
                         <textarea v-model="form.comment"  class="form-control mt-2" name="" id="" rows="3"></textarea>
                            <button type="submit" class="p-2 mt-3 bg-blue-500 hover:bg-blue-700 text-white rounded">Commenter</button>
                       </form>
                      
                    </div>
                    <div  class="bg-white border rounded-lg p-3 my-3">
                         <div class="">
                        <div class="flex items-center">
                            <div class=" rating-box">
                                <Rating v-model="val5" :cancel="false"/>
                            </div>
                            <span class="mx-2 w-24">({{props.post.rate_5_count}})</span>
                            <ProgressBar :value="ratePercent(props.post.rate_5_count,props.post.rate_count)" color="bg-green-500"/>
                        </div>
                        <div class="flex items-center">
                            <div class=" rating-box">
                            <Rating v-model="val4" :cancel="false"/> 
                            </div>
                            <span class="mx-2 w-24">({{props.post.rate_4_count}})</span>
                            <ProgressBar :value="ratePercent(props.post.rate_4_count,props.post.rate_count)" color="bg-blue-500"/>

                        </div>
                        <div class="flex items-center">
                            <div class=" rating-box">
                            <Rating v-model="val3" :cancel="false"/> 
                            </div>
                            <span class="mx-2  w-24">({{props.post.rate_3_count}})</span>
                            <ProgressBar :value="ratePercent(props.post.rate_3_count,props.post.rate_count)" color="bg-pink-500"/>
                        
                        </div>
                        <div class="flex items-center">
                            <div class=" rating-box">
                            <Rating v-model="val2" :cancel="false"/>
                            </div>
                            <span class="mx-2 w-24">({{props.post.rate_2_count}})</span>
                            <ProgressBar :value="ratePercent(props.post.rate_2_count,props.post.rate_count)" color="bg-orange-500"/>
                        
                        </div>
                        <div class="flex items-center">
                            <div class=" rating-box">
                            <Rating v-model="val1" :cancel="false"/>
                            </div>
                            <span class="mx-2 w-24">({{props.post.rate_1_count}})</span>
                            <ProgressBar :value="ratePercent(props.post.rate_1_count,props.post.rate_count)" color="bg-red-500" />
                        
                        </div>
                           
                       </div>
                    </div>

                    <div  class="bg-white border rounded-lg p-3 my-3">
                        <div v-for="(comment, index) in props.post.comments" :key="index" class="border rounded-lg p-3 my-3">
                             <div class="flex">
                                <div class="h-10 w-10 overflow-hidden rounded-lg">
                                    <img :src="comment.owner.picture" alt="">
                                </div>
                                <div class="items-center flex flex-col ml-2">
                                    <h2 class="text-sm text-bolde">{{comment.owner.full_name}}</h2>
                                    <p class="text-xs text-gray-500">{{comment.created}}</p>
                                </div>
                            </div>
                            <div class=" rating-box my-3">
                                <Rating v-model="val5" :cancel="false"/>
                            </div>
                            <div class="rounded-lg border bg-gray-100 p-3">
                                <p>{{comment.comment}}</p>
                            </div>

                        </div>
                    </div>

                </div>
               
            </div>
            <div class="col-span-2 mx-2">
               <PopularPostBar/>
            </div>
        </div>
    </BlogLayout>
</template>
<script setup>
import Guest from '@/Layouts/Guest.vue';
import { Head,Link } from '@inertiajs/inertia-vue3';
import PopularPostBar from '@/Components/PopularPostBar.vue';
import BlogLayout from './BlogLayout.vue';
import Rating from 'primevue/rating';
import { onMounted,ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import ProgressBar from '@/Components/ProgressBar.vue';
    const props = defineProps({
        post:Object,
        comment:Object,
        rate:Object,
    });

    console.log('post data',props.post)
    console.log('post comment',props.comment)
    console.log('post rate',props.rate)

    const val1 = 1;
    const val2 = 2;
    const val3 = 3;
    const val4 = 4;
    const val5 = 5;

    const ratePercent = (value,total) =>{
        return total!=0 ?Math.round(value*100/total):0;
    }

    let post = props.post;
    let rate_count = (post.rate_5_count*5)+(post.rate_4_count*4)+(post.rate_3_count*3)+(post.rate_2_count*2)+(post.rate_1_count*1);
    console.log('fdgrtg',rate_count/post.rate_count)
     const rate = ref(post.rate_count !=0?Math.round(rate_count/post.rate_count):0);

    const form = ref({
        rate_id:props.rate?props.rate.id:false,
        comment_id:props.comment?props.comment.id:false,
        comment:props.comment?props.comment.comment:'',
        rate:props.rate?props.rate.rate:0,
        id:props.post.id,
    });

    const submitComment = ()=>{
        Inertia.post(route('post.comment.new',form.value))
    }

</script>