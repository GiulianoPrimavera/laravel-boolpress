<template>
    <div class="container text-center">
        <SinglePost class="my-5"
        v-for="singlePost, i in postList" 
        :key="i"
        :title="singlePost.title"
        :content="singlePost.content"
        :category="singlePost.category"
        :tags="singlePost.tags"
        ></SinglePost> 
        <!-- {{ postList[1]["tags"][0]["name"] }} -->
    </div>
</template>

<script>
import axios from "axios";
import SinglePost from "./SinglePost.vue";

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