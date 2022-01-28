<template>
    <div>
        <div v-if="this.post != null">

            <h3>{{ post.title }}</h3>

            <!-- <router-link :to="{name: 'post', params: {id: post.id}}"> vai ai dettagli di "{{post.title}}"</router-link>     -->

            <p>{{ post.content }}</p>

            <p class="small">{{ post.category.name }}</p>
            <p class="small">{{ creationDate }}</p>
            
            <p class="small my-0 mx-2 badge rounded-pill bg-primary text-white" v-for="(tag, i) in post.tags" :key="i">{{ tag.name }}</p>

        </div>
        
        <div v-else>
            nessun post
        </div>
        <router-link to="../" class="btn btn-primary text-white mt-5" exact>torna alla home</router-link>  
    </div>  
</template>

<script>
import dayjs from "dayjs";
import axios from 'axios';


export default {
    name : "PostShow",
    data() {
        return {
            post: null
        }
    },
    computed: {
        creationDate(){
            return dayjs(this.post.created_at).format("DD/MM/YYYY HH:mm:ss");
        }
    },
    mounted() {
        // console.log(this.$route.params.id);
        let id = this.$route.params.id
        axios.get(`/api/posts/${id}`).then((resp) => {
            this.post = resp.data
        })
    } 
}
</script>

<style>

</style>