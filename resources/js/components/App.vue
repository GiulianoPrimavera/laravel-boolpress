<template>
    <div>
        <h1>{{helloMsg}}</h1>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "App",
    components: {},
    data() {
        return {
            helloMsg: "Ce la faremo?",
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