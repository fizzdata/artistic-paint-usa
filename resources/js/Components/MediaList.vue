<template>
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-center mb-6">Media List</h1>

    <!-- Loading State -->
    <div v-if="loading" class="text-center text-xl text-gray-500">
      Loading...
    </div>

    <!-- Error State -->
    <div v-if="error" class="text-center text-xl text-red-600">
      <p>Error: {{ errorMessage }}</p>
    </div>

    <!-- Items List -->
    <ul v-if="!loading && !error" class="space-y-4">
      <li v-for="item in items" :key="item.id" class="bg-gray-100 p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200">
        <p class="text-lg font-semibold"><b>{{ item.title }}</b> - {{ item.description }}
        <button @click="deleteItem(item.id)" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 focus:outline-none float-right">
          Delete
        </button></p>
      </li>
    </ul>
  </div>
</template>


<script setup>
import axios from 'axios';
import { ref, onMounted } from 'vue';


    const items = ref([]);
    const loading = ref(true);
    const error = ref(false);
    const errorMessage = ref('');

    // Fetch items from the API
    const fetchItems = async () => {
      try {
        const response = await axios.get('/a/media/load'); // Replace with your API URL
        items.value = response.data.projects;
        loading.value = false;
      } catch (err) {
        error.value = true;
        errorMessage.value = err.message || 'Failed to load items.';
        loading.value = false;
      }
    };

    // Delete item by ID
    const deleteItem = async (id) => {
      try {
        let token =Math.floor(Math.random() * 2000000)
        // Call API to delete item (you should replace this with your actual API endpoint)
        await axios.delete(`/a/${token}/delete/media/${id}`);
        
       fetchItems();

      } catch (err) {
        console.error('Error deleting item:', err);
      }
    };

    // Fetch items when the component is mounted
    onMounted(() => {
      fetchItems();
    });




</script>
