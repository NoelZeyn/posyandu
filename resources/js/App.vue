<template>
    <div id="app">
      <AnggotaPos /> <!-- Pastikan komponen AnggotaPos ada di dalam App.vue -->
    </div>
  </template>
  
  <script>
  import AnggotaPos from './components/AnggotaPos.vue';
  
  export default {
    name: 'App',
    components: {
      AnggotaPos
    }
  };
  </script>
  