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
        <h4>questa è la sidebar</h4>
        <ul>
          <li v-for="category in categories" :key="category.id">
            <router-link to="/ciao">{{category.name}}</router-link>
          </li>
        </ul>
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
      categories: []
    }
  },
  methods: {
    getData() {
      axios.get("/api/posts").then((resp) => {
        console.log(resp.data);
        this.postList = resp.data.allPosts
        this.categories = resp.data.allCategories
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