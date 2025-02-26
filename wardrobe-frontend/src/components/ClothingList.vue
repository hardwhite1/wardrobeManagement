<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';

const router = useRouter();
const clothingItems = ref([]);
const errorMessage = ref('');

const fetchClothing = async () => {
  try {
    const token = localStorage.getItem('token');
    const response = await axios.get('http://127.0.0.1:8000/api/clothing', {
      headers: { Authorization: `Bearer ${token}` },
    });
    clothingItems.value = response.data;
  } catch (error) {
    errorMessage.value = 'Error fetching clothing items!';
  }
};

const deleteClothing = async (id) => {
  try {
    const token = localStorage.getItem('token');
    await axios.delete(`http://127.0.0.1:8000/api/clothing/${id}`, {
      headers: { Authorization: `Bearer ${token}` },
    });
    fetchClothing();
  } catch (error) {
    errorMessage.value = 'Error deleting item!';
  }
};

onMounted(fetchClothing);
</script>

<template>
  <div>
    <h2>Clothing List</h2>
    <p v-if="errorMessage" class="error">{{ errorMessage }}</p>
    <button @click="router.push('/clothing/add')">Add New Clothing</button>
    <ul>
      <li v-for="item in clothingItems" :key="item.id">
        {{ item.name }} - {{ item.category }} ({{ item.color }})
        <button @click="router.push(`/clothing/edit/${item.id}`)">Edit</button>
        <button @click="deleteClothing(item.id)">Delete</button>
      </li>
    </ul>
  </div>
</template>

<style scoped>
.error {
  color: red;
}
</style>
