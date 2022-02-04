<template>
  <div>
      <h1>Questa è la pagina dei contatti</h1>
      <div>
        <form @submit.prevent="onSubmit()" v-if="!formSubmitted">

          <label class="form-group my-2" for="name">Nome</label>
          <input type="text" id="name" class="form-control" name="name" v-model="form.name">

          <label class="form-group my-2" for="email">La tua e-mail</label>
          <input type="text" id="email" class="form-control" name="email" v-model="form.email">

          <label class="form-group my-2" for="message">Scrivi il messaggio</label>
          <textarea type="text" id="message" class="form-control" name="message" v-model="form.message">
          </textarea>

          <button class="btn btn-success mt-4 text-white">Invia</button>
        </form>

        <div class="alert alert-success" v-else>
          E-mail inviata correttamente
        </div>
      </div>

  </div>
</template>

<script>
import axios from 'axios';

export default {
data() {
  return {
    formSubmitted: false,
    form:{
      name: "",
      email: "",
      message: "",
    }
  }
},
methods: {
  onSubmit(){
    axios.post("/api/contacts", this.form).then((resp) => {
      this.formSubmitted = true
    })
  }
}
}
</script>

<style>

</style>