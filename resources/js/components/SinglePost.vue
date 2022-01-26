<template>
    <div>
        <h3>{{ post.title }}</h3>

        <p>{{ post.content }}</p>

        <p class="small">{{ post.category.name }}</p>
        <!-- <p class="small">{{ post.created_at }}</p> -->
        <p class="small">{{ creationDate }}</p>
        
        <p class="small my-0 mx-2 badge rounded-pill bg-primary text-white" v-for="(tag, i) in post.tags" :key="i">{{ tag.name }}</p>
    </div>  
</template>

<script>
import dayjs from "dayjs";


export default {
    name : "SinglePost",
    props: {
        post: {
            type: Object,
            required: true,
        }
    },
    computed: {
        creationDate(){
            return dayjs(this.post.created_at).format("DD/MM/YYYY HH:mm:ss");
        }
    }
}
</script>

<style>

</style>