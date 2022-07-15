<template>
  <div class="container">
    <h1>Contattaci</h1>

    <div v-if="success" class="alert alert-success" role="alert">
      <span class="text-success">Richiesta Inviata!</span>
    </div>

    <form class="my-5">
      <div class="form-group">
        <label for="exampleFormControlInput1">Name</label>
        <input
          type="text"
          class="form-control"
          id="name"
          name="name"
          placeholder="Name"
          v-model="name"
        />
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Email address</label>
        <input
          type="email"
          class="form-control"
          id="email"
          name="email"
          placeholder="name@example.com"
          v-model="email"
        />
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Request</label>
        <textarea
          class="form-control"
          id="request"
          name="request"
          rows="3"
          placeholder="Text..."
          v-model="request"
        ></textarea>
      </div>
      <button
        @click.prevent="sendContactRequest"
        type="submit"
        class="btn btn-primary"
      >
        Invia
      </button>
    </form>
  </div>
</template>

<script>
export default {
  name: "AppContact",
  data() {
    return {
      name: "",
      email: "",
      request: "",
      success: false,
    };
  },
  methods: {
    sendContactRequest() {
      axios
        .post("/api/leads", {
          name: this.name,
          email: this.email,
          request: this.request,
        })
        .then((resp) => {
          if (resp.data.success) {
            this.success = true;
            this.name = "";
            this.email = "";
            this.request = "";
          }
        });
    },
  },
};
</script>

<style>
</style>