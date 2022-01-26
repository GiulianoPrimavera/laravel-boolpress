<template>
    <div class="container text-center">
        <Navbar></Navbar>


        <router-view>
        <!-- qui dentro ci saranno le varie pagine -->
        </router-view>
    </div>
</template>

<script>
import axios from "axios";
import Navbar from "./components/Navbar.vue";

export default {
    name: "App",
    components: { 
        Navbar
        },
    data() {
        return {
            helloMsg: "pagina geusts dei post",
            categoriesList: []
        }
    }
}
</script>