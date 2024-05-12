<template>
  <hr>
  <div>
    <Loader v-if="isLoading"/>
    <div v-else>
      <div v-for="item in data" :key="item.section.id">
        <h2>{{ item.section.name }}</h2>
        <ul>
          <li v-for="activity in item.activities.data" :key="activity.id">
            {{ activity.duration }} : {{ activity.start_date }}
          </li>
        </ul>
      </div>

    </div>
  </div>
  <hr>

  <hr>
  <Table
      v-if="!isLoading"
      :data="data"
  />
  <hr>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { useActivitiesStore } from '@/entities/Activity';
import Loader from "@/shared/ui/Loader/ui/Loader.vue";
import Table from "@/shared/ui/Table/ui/Table.vue";

const store = useActivitiesStore();
const isLoading = ref(false);
const data = ref([]);

onMounted(() => {
  isLoading.value = true;
  store.fetchActivities().then(() => {
    isLoading.value = false;
    data.value = store.data;
  });
  console.log(data.section)
});
</script>
