<template>
  <div class="container">
    <div class="row">

      <div class="col-9">
        <SinglePost class="my-5"
          v-for="post, i in postList" 
          :key="i"
          :post="post"
          ></SinglePost> 
      </div>
      <div class="col-3">
        <h4>scegli post per categoria</h4>
        <ul class="list-group">
          <li v-for="category in categories" :key="category.id" class="list-group-item">
            <router-link :to="{ name: 'categories', params: {category: category.id} }">{{category.name}}</router-link>
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