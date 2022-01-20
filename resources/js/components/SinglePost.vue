<template>
    <div>
        <h3>{{ title }}</h3>

        <p>{{ content }}</p>
    </div>  
</template>

<script>


export default {
    name : "SinglePost",
    props: {
        title: String,
        content: String
    }
}
</script>

<style>

</style>