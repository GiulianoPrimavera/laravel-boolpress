<template>
    <div>
        <h1>
            {{ helloMsg }}
        </h1>
        <div class="container text-center my-5">
            
            <ul class="list-group">
                <li class="list-group-item" v-for="(post, i) in postList" :key="i">
                    {{ post["title"] }}
                </li>
            </ul>
        
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "App",
    components: {},
    data() {
        return {
            helloMsg: "pagina geusts dei post",
            postList: []
        }
    },
    mounted() {
        axios.get("/api/posts").then( (resp) => {
            this.postList = resp.data;
        })
    }
}
</script>