<template>
    <div>
        <h3>{{ title }}</h3>

        <p>{{ content }}</p>

        <p class="small">{{ category.name }}</p>
        <p class="small my-0 mx-2 badge rounded-pill bg-primary text-white" v-for="(tag, i) in tags" :key="i">{{ tag.name }}</p>
    </div>  
</template>

<script>


export default {
    name : "SinglePost",
    props: {
        title: String,
        content: String,
        category: Object,
        tags: Array,
    }
}
</script>

<style>

</style>