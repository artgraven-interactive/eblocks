<template>
  <section>
    <b-container fluid>
      <b-row>
        <b-col>1 of 3</b-col>
        <b-col>
          <h2>LOGIN</h2>
          <b-row class="mb-3">
            <b-col>
              <div>
                <b-form-input
                  v-model="username"
                  placeholder="Enter your name"
                ></b-form-input>
              </div>
            </b-col>
          </b-row>
          <b-row class="mb-3">
            <b-col>
              <div>
                <b-form-input
                  v-model="password"
                  type="password"
                  placeholder="Enter your password"
                ></b-form-input>
              </div>
            </b-col>
          </b-row>
          <b-row>
            <b-col class="mb-3">
              <div>
                <b-button @click="authenticate" variant="outline-primary">Login</b-button>
              </div>
            </b-col>
          </b-row>
        </b-col>
        <b-col>3 of 3</b-col>
      </b-row>
    </b-container>
  </section>
</template>

<script>
import axios from 'axios'

export default {
  data() {
    return {
      username: "",
      password: ""
    };
  },
  methods: {
    authenticate (){
      const url = '/api/login';
      const user={
        username: this.username,
        password: this.password
      }

      axios({
        method: 'post',
        url, url,
        data: {
          user
        }
      }).then(data=>console.log(data))
      .catch(err=>console.log(err))
    }
  }
};
</script>
