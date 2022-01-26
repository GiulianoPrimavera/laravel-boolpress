<template>
    <div class="container text-center">
        <!-- <SinglePost class="my-5"
        v-for="post, i in postList" 
        :key="i"
        :post="post"
        ></SinglePost>  -->
        
        <router-view>
        <!-- qui dentro ci saranno le varie pagine -->
        </router-view>
    </div>
</template>

<script>
import axios from "axios";
import SinglePost from "./components/SinglePost.vue";

export default {
    name: "App",
    components: { 
        SinglePost
        },
    data() {
        return {
            helloMsg: "pagina geusts dei post",
            postList: [],
            categoriesList: []
        }
    },
    mounted() {
        axios.get("/api/posts").then( (resp) => {
            this.postList = resp.data
        })
    }
}
</script>