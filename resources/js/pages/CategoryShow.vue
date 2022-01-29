<template>
  <div class="container">
    <div class="row">
      <div class="col-9">
        <h1>questa è la pagina dei post con categoria: {{ categoryName }}</h1>
        <div v-if="loading === true">
          <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
        </div>

        <div class="bg-light" v-else v-for="post in posts" :key="post.id">
          <h3>{{ post.title }}</h3>

          <router-link :to="{ name: 'post', params: { id: post.id } }"
            >vai ai dettagli di "{{ post.title }}"</router-link
          >

          <p>{{ post.content }}</p>

          <p class="small">{{ post.creationDate }}</p>
        </div>
      </div>

      <div class="col-3">
        <h4>Torna alla home</h4>

        <div v-if="loading === true">
          <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
        </div>

        <div v-else>
          <div class="btn btn-success text-white">
            <router-link to="/" exact="" class="text-white">home</router-link>
          </div>
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
      posts: [],
      categoryName: "",
      loading: true,
    };
  },
  methods: {
    getData() {
      this.loading = true;
      const id = this.$route.params.category;
      axios.get(`/api/category/${id}`).then((resp) => {
        this.posts = resp.data.post;
        this.categoryName = resp.data.name;
        this.loading = false;
        // console.log(resp.data.post);
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