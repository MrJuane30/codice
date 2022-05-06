<template>
<vue-page-transition name="fade-in-left">
      <router-view></router-view>
</vue-page-transition>
</template>

<script>
import store from '../store/index';
export default {
      store,
     
  
}
</script>