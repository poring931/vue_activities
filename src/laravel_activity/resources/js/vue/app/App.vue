<template>
  <v-app>


    <Header/>


    <main>
      <router-view></router-view>
    </main>

    <Footer/>


  </v-app>
</template>

<script setup lang="ts">

import Footer from "@/widgets/Footer";
import Header from "@/widgets/Header";
</script>

<style>
@import 'normalize-scss/sass/normalize/_import-now.scss';
@import 'index.scss';
</style>
