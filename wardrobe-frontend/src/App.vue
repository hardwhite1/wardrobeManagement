<script setup>
import { useRouter } from 'vue-router';

const router = useRouter();

const logout = () => {
  localStorage.removeItem('token');
  router.push('/login'); // Redirect to login
};
</script>

<template>
  <div>
    <nav>
      <router-link to="/clothing">Clothing List</router-link> |
      <router-link to="/clothing/add">Add Clothing</router-link> |
      <button @click="logout">Logout</button>
    </nav>

    <!-- Load the current page -->
    <router-view></router-view>
  </div>
</template>

<style scoped>
nav {
  background: #333;
  padding: 10px;
  text-align: center;
}
nav a {
  color: white;
  text-decoration: none;
  margin: 0 10px;
}
button {
  background: red;
  color: white;
  border: none;
  padding: 5px 10px;
  cursor: pointer;
}
</style>
