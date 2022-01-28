<template>
  <div class="container">
    <div class="row">

      <div class="col-10">
        <SinglePost class="my-5"
          v-for="post, i in postList" 
          :key="i"
          :post="post"
          ></SinglePost> 
      </div>
      <div class="col-2">
        <h2>questa è la sidebar</h2>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import SinglePost from "../components/SinglePost.vue";

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