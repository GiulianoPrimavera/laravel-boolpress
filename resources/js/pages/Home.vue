<template>
  <div>
      <SinglePost class="my-5"
        v-for="post, i in postList" 
        :key="i"
        :post="post"
        ></SinglePost> 
  </div>
</template>

<script>
import axios from "axios";
import SinglePost from "./PostShow.vue";

export default {
  components: {
    SinglePost
  },
  data() {
    return {
      postList: [],
    }
  },
  methods: {
    getData() {
      axios.get("/api/posts").then((resp) => {
        this.postList = resp.data
      })
    }
  },
  mounted() {
    this.getData()
  }
}
</script>

<style>

</style>