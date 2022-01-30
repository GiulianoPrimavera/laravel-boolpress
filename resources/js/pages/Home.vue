<template>
  <div class="container">
    <div class="row">
      <!-- main content -->
      <div class="col-9">
        <div v-if="loading === true">
          <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
        </div>

        <div v-else>
          <SinglePost
            class="my-5"
            v-for="(post, i) in postList"
            :key="i"
            :post="post"
          ></SinglePost>
        </div>
      </div>
      <!-- sidebar con le categorie -->
      <div class="col-3">
        <h4>scegli post per categoria</h4>

        <div v-if="loading === true">
          <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
        </div>

        <div v-else>
          <ul class="list-group">
            <li
              v-for="category in categories"
              :key="category.id"
              class="list-group-item"
            >
              <router-link
                :to="{ name: 'categories', params: { category: category.id } }"
                >{{ category.name }}</router-link
              >
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import SinglePost from "../components/SinglePost.vue";

export default {
  components: {
    SinglePost,
  },
  data() {
    return {
      postList: [],
      categories: [],
      loading: true,
    };
  },
  methods: {
    getData() {
      this.loading = true;
      axios.get("/api/posts").then((resp) => {
        // console.log(resp.data);
        this.postList = resp.data.allPosts;
        this.categories = resp.data.allCategories;
        this.loading = false;
      });
    },
  },
  mounted() {
    this.getData();
  },
};
</script>

<style>
</style>