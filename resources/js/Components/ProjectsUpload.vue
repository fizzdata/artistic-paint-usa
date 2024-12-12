<template>
       <div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Add New Projects</h2>

    <div class="flex flex-col items-center justify-center space-y-6">
      <!-- Address -->
      <div class="w-full max-w-md">
        <label class="block mb-2 text-gray-700">Project Full Address:</label>
        <input 
          type="text" 
          v-model="address" 
          class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" 
          required
        />
      </div>

      <!-- Units -->
      <div class="w-full max-w-md">
        <label class="block mb-2 text-gray-700">Project Units Amount:</label>
        <input 
          type="number" 
          v-model="units"  
          class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" 
          required 
        />
      </div>

      <!-- Type -->
      <div class="w-full max-w-md">
        <label class="block mb-2 text-gray-700">Project Type:</label>
        <select 
          v-model="type" 
          class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
          <option value="com">Commercial</option>
          <option value="res">Residential</option>
          <option value="otr">Other</option>
        </select>
      </div>

      <!-- Outside Transparent Picture -->
      <div class="w-full max-w-md">
        <label class="block mb-2 text-gray-700">Outside Transparent Picture:</label>
        <div v-if="outsideTransparentUrl" class="mb-2">
          <img :src="outsideTransparentUrl" alt="Outside Transparent" class="max-w-full h-auto rounded-lg shadow-lg" />
        </div>
        <input 
          type="file" 
          @change="onOutsideTransparentChange" 
          class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" 
          required
        />
      </div>

      <!-- Outside Lifestyle Picture -->
      <div class="w-full max-w-md">
        <label class="block mb-2 text-gray-700">Outside Lifestyle Picture:</label>
        <div v-if="outsideLifestyleUrl" class="mb-2">
          <img :src="outsideLifestyleUrl" alt="Outside Lifestyle" class="max-w-full h-auto rounded-lg shadow-lg" />
        </div>
        <input 
          type="file" 
          @change="onOutsideLifestyleChange" 
          class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" 
          required
        />
      </div>

      <!-- Unlimited Inside Pictures -->
      <div class="w-full max-w-md">
        <label class="block mb-2 text-gray-700">Inside Pictures:</label>
        <div v-for="(url, index) in insideUrls" :key="index" class="mb-2">
          <img :src="url" :alt="'Inside Picture ' + (index + 1)" class="max-w-full h-auto rounded-lg shadow-lg" />
        </div>
        <input 
          type="file" 
          @change="onInsideChange" 
          multiple 
          class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" 
          required
        />
      </div>

      <!-- Upload Button -->
      <button 
        @click="uploadImages" 
        class="bg-blue-500 text-white py-3 px-6 rounded-lg shadow-md hover:bg-blue-700 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
        Upload Images
      </button>
    </div>
  </div>
</template>



<script setup>
import { ref } from 'vue';
import axios from 'axios';

const outsideTransparentUrl = ref(null);
const outsideTransparentFile = ref(null);
const outsideLifestyleUrl = ref(null);
const outsideLifestyleFile = ref(null);
const insideUrls = ref([]);
const insideFiles = ref([]);
const address = ref('');
const units = ref(0);
const type = ref(0);


const onOutsideTransparentChange = (event) => {
  const file = event.target.files[0];
  if (file && file.type.startsWith('image/')) {
    resizeImage(file, (resizedDataUrl) => {
      outsideTransparentUrl.value = resizedDataUrl;
      outsideTransparentFile.value = dataURLtoFile(resizedDataUrl, file.name);
    } );
  } else {
    alert('Please select an image file.');
  }
};

const onOutsideLifestyleChange = (event) => {
  const file = event.target.files[0];
  if (file && file.type.startsWith('image/')) {
    resizeImage(file, (resizedDataUrl) => {
      outsideLifestyleUrl.value = resizedDataUrl;
      outsideLifestyleFile.value = dataURLtoFile(resizedDataUrl, file.name);
    }, 1000);
  } else {
    alert('Please select an image file.');
  }
};

const onInsideChange = (event) => {
  const files = event.target.files;
  for (let i = 0; i < files.length; i++) {
    const file = files[i];
    if (file.type.startsWith('image/')) {
      resizeImage(file, (resizedDataUrl) => {
        insideUrls.value.push(resizedDataUrl);
        insideFiles.value.push(dataURLtoFile(resizedDataUrl, file.name));
      });
    } else {
      alert('Please select an image file.');
    }
  }
};

const resizeImage = (file, callback, maxSize = 800) => {
  const reader = new FileReader();
  reader.onload = (event) => {
    const img = new Image();
    img.onload = () => {
      const canvas = document.createElement('canvas');
      const ctx = canvas.getContext('2d');
      let width = img.width;
      let height = img.height;

      if (width > height) {
        if (width > maxSize) {
          height = Math.round((height *= maxSize / width));
          width = maxSize;
        }
      } else {
        if (height > maxSize) {
          width = Math.round((width *= maxSize / height));
          height = maxSize;
        }
      }

      canvas.width = width;
      canvas.height = height;
      ctx.drawImage(img, 0, 0, width, height);
      const resizedDataUrl = canvas.toDataURL(file.type);
      callback(resizedDataUrl);
    };
    img.src = event.target.result;
  };
  reader.readAsDataURL(file);
};

const dataURLtoFile = (dataUrl, filename) => {
  const arr = dataUrl.split(',');
  const mime = arr[0].match(/:(.*?);/)[1];
  const bstr = atob(arr[1]);
  let n = bstr.length;
  const u8arr = new Uint8Array(n);
  while (n--) {
    u8arr[n] = bstr.charCodeAt(n);
  }
  return new File([u8arr], filename, { type: mime });
};

const uploadImages = async () => {

    if (!address.value) {
    alert('Address Required')
    return
  }

  if (!units.value) {
    alert('Units Required')
    return
  }
  if (!type.value) {
    alert('Type Required')
    return
  }

  if (!outsideTransparentFile.value) {
    alert('outsideTransparentFile Required')
    return
  }

  if (!outsideLifestyleFile.value) {
    alert('outsideLifestyle Required')
  }
  const filesData = [];

  filesData.push({
      address: address.value,
      units: units.value,
      type: type.value,

      outsideTransparent: await toBase64(outsideTransparentFile.value),
      outsideLifestyle: await toBase64(outsideLifestyleFile.value)

    });


 // Create an array for inside files
  const insideFilesData = [];
  for (const file of insideFiles.value) {
    insideFilesData.push(await toBase64(file));
  }

  // Push the inside files array to filesData
  filesData.push({
    inside: insideFilesData
  });

  
    const response = await axios.post('/a/project/upload', JSON.stringify(filesData), {
      headers: {
        'Content-Type': 'application/json',
      },
    }).then(response => {
    // Handle the response data
    const responseData = response.data.message;

    // Display the JSON in a readable format
    alert(JSON.stringify(responseData, null, 2));
       // Resetting form values
    address.value = '';
    units.value = '';
    outsideTransparentUrl.value = null;
    outsideTransparentFile.value = []; // Clear the file input
    outsideLifestyleUrl.value = [];
    outsideLifestyleFile.value = []; // Clear the file input
    insideFiles.value = []; // Reset inside files array
    insideUrls.value = [];

  })
  .catch(error => {
    // Handle errors
    console.error(error);
  });
}
const toBase64 = file => new Promise((resolve, reject) => {
  const reader = new FileReader();
  reader.readAsDataURL(file);
  reader.onload = () => resolve(reader.result);
  reader.onerror = error => reject(error);
});

</script>
