<template>
  <div>
    <h1>questa è la pagina delle categories</h1>

    <div class="bg-light" v-for="post in posts" :key="post.id">
      <h3>{{ post.title }}</h3>

      <router-link :to="{ name: 'post', params: { id: post.id } }">vai ai dettagli di "{{ post.title }}"</router-link>

      <p>{{ post.content }}</p>

      <p class="small">{{ creationDate }}</p>

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
    };
  },
  methods: {
    getData() {
      const id = this.$route.params.category;
      axios.get(`/api/category/${id}`).then((resp) => {
        this.posts = resp.data.post;
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