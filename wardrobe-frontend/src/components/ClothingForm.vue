<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { useRouter, useRoute } from 'vue-router';

const router = useRouter();
const route = useRoute();
const id = route.params.id;
const name = ref('');
const category = ref('');
const color = ref('');
const isEditMode = !!id;
const errorMessage = ref('');

onMounted(async () => {
  if (isEditMode) {
    try {
      const token = localStorage.getItem('token');
      const response = await axios.get(`http://127.0.0.1:8000/api/clothing/${id}`, {
        headers: { Authorization: `Bearer ${token}` },
      });
      name.value = response.data.name;
      category.value = response.data.category;
      color.value = response.data.color;
    } catch (error) {
      errorMessage.value = 'Error fetching clothing details!';
    }
  }
});

const saveClothing = async () => {
  try {
    const token = localStorage.getItem('token');
    const url = isEditMode ? `http://127.0.0.1:8000/api/clothing/${id}` : 'http://127.0.0.1:8000/api/clothing';
    const method = isEditMode ? 'put' : 'post';

    await axios[method](url, { name: name.value, category: category.value, color: color.value }, {
      headers: { Authorization: `Bearer ${token}` },
    });

    router.push('/clothing');
  } catch (error) {
    errorMessage.value = 'Error saving item!';
  }
};
</script>

<template>
  <div>
    <h2>{{ isEditMode ? 'Edit Clothing' : 'Add Clothing' }}</h2>
    <input v-model="name" type="text" placeholder="Name" />
    <input v-model="category" type="text" placeholder="Category" />
    <input v-model="color" type="text" placeholder="Color" />
    <button @click="saveClothing">{{ isEditMode ? 'Update' : 'Save' }}</button>
  </div>
</template>
