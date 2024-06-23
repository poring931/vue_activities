<template>
  <v-app theme="light">


    <Header/>


    <main>
<!--      https://learnvue.co/articles/vue-router-transitions  что-то подобное потом прикрутить-->
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
