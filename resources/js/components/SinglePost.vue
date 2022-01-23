<template>
    <div>
        <h3>{{ title }}</h3>

        <p>{{ content }}</p>

        <p class="small">{{ category.name }}</p>
    </div>  
</template>

<script>


export default {
    name : "SinglePost",
    props: {
        title: String,
        content: String,
        category: Object,
    }
}
</script>

<style>

</style>