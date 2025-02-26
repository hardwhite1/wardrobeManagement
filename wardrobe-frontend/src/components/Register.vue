<script setup>
import { ref } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';

const router = useRouter();
const name = ref('');
const email = ref('');
const password = ref('');
const password_confirmation = ref('');
const errorMessage = ref('');

const register = async () => {
  try {
    await axios.post('http://127.0.0.1:8000/api/register', {
      name: name.value,
      email: email.value,
      password: password.value,
      password_confirmation: password_confirmation.value,
    });

    router.push('/login'); // Redirect to login after successful registration
  } catch (error) {
    errorMessage.value = error.response?.data?.message || 'Registration failed!';
  }
};
</script>

<template>
  <div class="auth-container">
    <h2>Register</h2>
    <p v-if="errorMessage" class="error">{{ errorMessage }}</p>
    <input v-model="name" type="text" placeholder="Full Name" />
    <input v-model="email" type="email" placeholder="Email" />
    <input v-model="password" type="password" placeholder="Password" />
    <input v-model="password_confirmation" type="password" placeholder="Confirm Password" />
    <button @click="register">Register</button>
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
