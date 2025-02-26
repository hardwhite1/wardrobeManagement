<template>
  <div class="login-container">
    <h2>Login</h2>
    <form @submit.prevent="login">
      <div>
        <label>Email:</label>
        <input type="email" v-model="email" required />
      </div>

      <div>
        <label>Password:</label>
        <input type="password" v-model="password" required />
      </div>

      <button type="submit">Login</button>
    </form>

    <!-- Link to Registration Page -->
    <p>Don't have an account? 
      <router-link to="/register">Sign Up</router-link>
    </p>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios';

const email = ref('');
const password = ref('');
const router = useRouter();

const login = async () => {
  try {
    const response = await axios.post('http://127.0.0.1:8000/api/login', {
      email: email.value,
      password: password.value
    });

    localStorage.setItem('token', response.data.token);
    router.push('/clothing'); // Redirect after login
  } catch (error) {
    console.error("Login failed", error);
  }
};
</script>

<style scoped>
/* Add your styles here */
</style>
