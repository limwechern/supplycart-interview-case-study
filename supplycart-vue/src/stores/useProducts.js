import { ref } from 'vue';
import { defineStore } from 'pinia';
import axios from '@/utils/axios';

export const useProductsStore = defineStore('products', () => {
  const products = ref([]);
  const loading = ref(false);
  const error = ref(null);

  const fetchProducts = async () => {
    loading.value = true;
    error.value = null;
    try {
      const response = await axios.get('/api/products');
      products.value = response.data;
    } catch (err) {
      error.value = 'Error fetching products.';
    } finally {
      loading.value = false;
    }
  };

  return {
    products,
    loading,
    error,
    fetchProducts,
  };
});
