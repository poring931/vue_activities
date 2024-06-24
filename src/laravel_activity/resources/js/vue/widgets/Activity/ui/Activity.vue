<template>
  <hr>
  <div>
    <Loader v-if="isLoading"/>
    <div v-else>
      <div v-for="item in data" :key="item.section.id" class="mt-16">
        <div class="d-flex justify-center ga-4 align-center">
          <h2 class="text-center">{{ item.section.name }}</h2>
          <Timer :sectionId="item.section.id"/>

        </div>
        <Table :data="item.activities.data" :sectionId="item.section.id"/>
      </div>
    </div>
  </div>
  <hr>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { useActivitiesStore } from '@/entities/Activity';
import {Loader} from "@/shared/ui/Loader/";
import {Table} from "@/shared/ui/Table/";
import {Timer} from "@/widgets/Timer/";

const store = useActivitiesStore();
const isLoading = ref(false);
const data = ref([]);

onMounted(async () => {
  isLoading.value = true;
  await store.fetchActivities();
  isLoading.value = false;
  data.value = store.data;
});
</script>
