<template>
  <div>
    <v-table>
      <thead>
      <tr>
        <th class="text-left">Duration</th>
        <th class="text-left">Description</th>
        <th class="text-left">Starts At</th>
        <th class="text-left">End At</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="activity in data" :key="activity.id">
        <td class="font-weight-bold text-h6">{{ activity.duration }}</td>
        <td>{{ activity.description }}</td>
        <td>{{ activity.start_date }}</td>
        <td>{{ activity.end_date }}</td>
      </tr>
      </tbody>
    </v-table>
    <v-row
        align="center"
        justify="center"
        class="mt-3"
    >
      <v-btn
          v-if="store.sectionHasMoreElements[sectionId]"
          variant="outlined"
          size="x-large"
          rounded="lg"
          @click="loadMore"
          :loading="store.isLoading"
          :disabled="store.sectionLoading[sectionId]"
      >
        Button
        <template v-if="store.sectionLoading[sectionId]" v-slot:append>
          <Loader/>
        </template>
      </v-btn>
    </v-row>
  </div>
</template>

<script setup lang="ts">
import {VBtn, VTable, VRow} from 'vuetify/components';
import {useActivitiesStore} from '@/entities/Activity';
import {PropType} from 'vue';
import Loader from "@/shared/ui/Loader/ui/Loader.vue";

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
