<template>
  <section>
    <b-container v-if="login" fluid>
      <b-row class="mt-5">
        <b-col></b-col>
        <b-col>
          <div>
            <b-card
              title="LOGIN"
              img-src="https://picsum.photos/600/300/?image=25"
              img-alt="Image"
              img-top
              tag="article"
              style="max-width: 20rem;"
              class="mb-2"
            >
              <b-card-text>
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
              </b-card-text>

              <b-button @click="authenticate" variant="outline-primary"
                >Submit</b-button
              >
            </b-card>
          </div>
        </b-col>
        <b-col></b-col>
      </b-row>
    </b-container>

    <b-container v-else fluid>
      <div>
        <b-navbar toggleable="lg" type="dark" variant="dark">
          <b-navbar-brand href="#">W.H.M</b-navbar-brand>

          <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

          <b-collapse id="nav-collapse" is-nav>
            <b-navbar-nav>
              <b-nav-item v-on:click='suppliers = !suppliers' href="#">Suppliers</b-nav-item>
              <b-nav-item v-on:click='categories = !categories' href="#">Categories</b-nav-item>
              <b-nav-item v-on:click='products = !products' href="#">Products</b-nav-item>
              <b-nav-item v-on:click='orders = !orders' href="#">Orders</b-nav-item>
            </b-navbar-nav>

            <!-- Right aligned nav items -->
            <b-navbar-nav class="ml-auto">
              <b-nav-form>
                <b-form-input
                  size="sm"
                  class="mr-sm-2"
                  placeholder="Search"
                ></b-form-input>
                <b-button size="sm" class="my-2 my-sm-0" type="submit"
                  >Search</b-button
                >
              </b-nav-form>

              <b-nav-item-dropdown right>
                <!-- Using 'button-content' slot -->
                <template v-slot:button-content>
                  <em>User</em>
                </template>
                <b-dropdown-item href="#">Profile</b-dropdown-item>
                <b-dropdown-item href="#">Sign Out</b-dropdown-item>
              </b-nav-item-dropdown>
            </b-navbar-nav>
          </b-collapse>
        </b-navbar>
      </div>

      <b-container class="bv-example-row">
        <b-row>
          <b-col v-if="suppliers">
            <b-table striped hover :items="suppliers_content"></b-table>
          </b-col>
          <b-col v-if="products">
            <b-table striped hover :items="products_content"></b-table>
          </b-col>
          <b-col v-if="orders">
            <b-table striped hover :items="orders_content"></b-table>
          </b-col>
          <b-col v-if="categories">
            <b-table striped hover :items="categories_content"></b-table>
          </b-col>
        </b-row>
      </b-container>


    </b-container>
  </section>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      username: "",
      password: "",
      login: false,
      suppliers:false,
      suppliers_content:[],
      products: false,
      products_content:[],
      orders: false,
      orders_content:[],
      categories: false,
      categories_content:[],
    };
  },
  methods: {
    authenticate() {
      const url = "/api/login";
      const user = {
        username: this.username,
        password: this.password
      };

      axios({
        method: "post",
        url: url,
        data: {
          user
        }
      })
        .then(data => {
          this.login = false;
        })
        .catch(err => console.log(err));
    },
    getProducts() {
      const url = "/api/products/";

      axios({
        method: "get",
        url: url,
      })
        .then((data)=>{
          this.products_content = data.data
        })
        .catch(err => console.log(err));
    },
    getOrders() {
      const url = "/api/order_details/";

      axios({
        method: "pogetst",
        url: url,
      })
        .then((data)=>{
          this.orders_content = data.data
        })
        .catch(err => console.log(err));
    },
    getSuppliers() {
      const url = "/api/suppliers/";

      axios({
        method: "get",
        url: url,
      })
        .then((data)=>{
          
          data.data.forEach(el => {
            this.suppliers_content.push({ CompanyName: e.CompanyName, ContactName: e.ContactName, ContactTitle: e.ContactTitle })
          });
        })
        .catch(err => console.log(err));
    },
    getCategories() {
      const url = "/api/categories/";
      axios({
        method: "get",
        url: url,
      })
        .then((data)=>{
          this.categories_content = data.data
        })
        .catch(err => console.log(err));
    }
  },
  watch: {
    suppliers: function(newValue) {
      if(newValue = true){
        this.getSuppliers();
      }
    },
    orders: function(newValue) {
      if(newValue = true){
        this.getOrders();
      }
    },
    products: function(newValue) {
      if(newValue = true){
        this.getProducts();
      }
    },
    categories: function(newValue) {
      if(newValue = true){
        this.getCategories();
      }
    }
  }
};
</script>
