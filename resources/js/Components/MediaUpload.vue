<template>
    <div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Submit New Project Details</h2>

    <div class="flex flex-col items-center justify-center space-y-6">
      <!-- Title -->
      <div class="w-full max-w-md">
        <label class="block mb-2 text-gray-700">Title:</label>
        <input 
          type="text" 
          v-model="title" 
          class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" 
          required
        />
      </div>

      <!-- Description -->
      <div class="w-full max-w-md">
        <label class="block mb-2 text-gray-700">Description:</label>
        <input 
          type="text" 
          v-model="description" 
          class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" 
          required 
        />
      </div>

      <!-- YouTube Video ID -->
      <div class="w-full max-w-md">
        <label class="block mb-2 text-gray-700">YouTube Video ID:</label>
        <div v-if="videoId" class="mb-2">
          <iframe 
            width="250" 
            height="150" 
            :src="videoSrc" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
            allowfullscreen>
          </iframe>
        </div>
        <input 
          type="text" 
          v-model="videoId" 
          class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" 
          required
        />
      </div>

      <!-- media Pictures -->
      <div class="w-full max-w-md">
        <label class="block mb-2 text-gray-700">Pictures:</label>
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

      <!-- Submit Button -->
      <button 
        @click="uploadImages" 
        class="bg-blue-500 text-white py-3 px-6 rounded-lg shadow-md hover:bg-blue-700 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
        Submit
      </button>
    </div>
  </div>
</template>



<script setup>
import { ref, watch } from 'vue';
import axios from 'axios';

const insideUrls = ref([]);
const insideFiles = ref([]);
const title = ref('');
const description = ref('');
const videoId = ref('');
const videoSrc = ref(`https://www.youtube.com/embed/${videoId.value}`); 

watch(videoId, (newVal) => { videoSrc.value = `https://www.youtube.com/embed/${newVal}`; });


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

    if (!title.value) {
    alert('Title Required')
    return
  }

  if (!description.value) {
    alert('Description Required')
    return
  }

  
  const filesData = [];

  filesData.push({
      title: title.value,
      description: description.value,

    });

    if(videoId){
      filesData.push({ videoSrc: videoSrc.value });
    }


 // Create an array for inside files
  const pic = [];
  for (const file of insideFiles.value) {
    pic.push(await toBase64(file));
  }

  // Push the inside files array to filesData
  filesData.push({
    pictures: pic
  });

  
    const response = await axios.post('/a/media/upload', JSON.stringify(filesData), {
      headers: {
        'Content-Type': 'application/json',
      },
    }).then(response => {
    // Handle the response data
    const responseData = response.data.message;

    // Display the JSON in a readable format
    alert(JSON.stringify(responseData, null, 2)); 
    insideUrls.value = null;
    insideFiles.value = null;
    title.value = null;
    description.value = null;
    videoId.value = null;
    videoSrc = ref(`https://www.youtube.com/embed/${videoId.value}`); 
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
