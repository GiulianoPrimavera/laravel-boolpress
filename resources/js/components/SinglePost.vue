<template>
    <div>
        <h3>{{ post.title }}</h3>

        <router-link :to="{name: 'post', params: {id: post.id}}"> vai ai dettagli di "{{post.title}}"</router-link>    

        <p>{{ post.content }}</p>

        <p class="small">{{ post.category.name }}</p>
        <p class="small">{{ creationDate }}</p>
        
        <p class="small my-0 mx-2 badge rounded-pill bg-primary text-white" v-for="(tag, i) in post.tags" :key="i">{{ tag.name }}</p>
    </div>  
</template>

<script>
import dayjs from "dayjs";
import axios from 'axios';


export default {
    name : "SinglePost",
    props: {
        post: {
            type: Object,
            required: true,
        }
    },
    data() {
        return {
            singlePost: []
        }
    },
    computed: {
        creationDate(){
            return dayjs(this.post.created_at).format("DD/MM/YYYY HH:mm:ss");
        }
    }/* ,
    mounted() {
        console.log(this.$router);
        axios.get(`/api/posts/${id}`).then((resp) => {
            this.singlePost = resp.data
        })
    } */
}
</script>

<style>

</style>