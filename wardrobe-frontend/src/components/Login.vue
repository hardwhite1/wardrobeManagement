<script setup>
import { ref } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';

const router = useRouter();
const email = ref('');
const password = ref('');
const errorMessage = ref('');

const login = async () => {
  try {
    const response = await axios.post('http://127.0.0.1:8000/api/login', {
      email: email.value,
      password: password.value,
    });

    localStorage.setItem('token', response.data.token);
    router.push('/clothing'); // Redirect to clothing list
  } catch (error) {
    errorMessage.value = error.response?.data?.message || 'Login failed!';
  }
};
</script>

<template>
  <div class="auth-container">
    <h2>Login</h2>
    <p v-if="errorMessage" class="error">{{ errorMessage }}</p>
    <input v-model="email" type="email" placeholder="Email" />
    <input v-model="password" type="password" placeholder="Password" />
    <button @click="login">Login</button>
  </div>
</template>

<style scoped>
.auth-container {
  max-width: 400px;
  margin: auto;
  text-align: center;
}
.error {
  color: red;
}
</style>
