<template>
  <div>
    <v-table>
      <thead>
      <tr>
        <th class="text-left">Duration</th>
        <th class="text-left">Starts At</th>
        <th class="text-left">End At</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="activity in data" :key="activity.id">
        <td>{{ activity.duration }}</td>
        <td>{{ activity.start_date }}</td>
        <td>{{ activity.end_date }}</td>
      </tr>
      </tbody>
    </v-table>
    <button @click="loadMore" v-if="store.hasMore[sectionId]">Load More</button>
  </div>
</template>

<script setup lang="ts">
import { VTable } from 'vuetify/components';
import { useActivitiesStore } from '@/entities/Activity';
import { PropType } from 'vue';

const props = defineProps({
  data: {
    type: Array as PropType<Array<{ id: string, duration: string, start_date: string, end_date: string }>>,
    required: true,
  },
  sectionId: {
    type: Number,
    required: true,
  }
});

const store = useActivitiesStore();

const loadMore = async () => {
  await store.loadMore(props.sectionId);
};
</script>
