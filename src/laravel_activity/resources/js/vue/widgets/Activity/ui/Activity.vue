<template>
    <hr />
    <div>
        <Loader v-if="isLoading" />
        <div v-else>
            <div v-for="item in data" :key="item.section.id" class="mt-16">
                <div class="d-flex justify-center ga-4 align-center">
                    <h2 class="text-center">{{ item.section.name }}</h2>
                    <Timer :section-id="item.section.id" />
                </div>
                <ActivityTable
                    :data="item.activities.data"
                    :section-id="item.section.id"
                />
            </div>
        </div>
    </div>
    <hr />
</template>

<script setup lang="ts">
import { onMounted, ref } from 'vue';
import { useActivitiesStore } from '@/entities/Activity';
import { Loader } from '@/shared/ui/Loader/';
import { Timer } from '@/widgets/Timer/';
import { ActivityTable } from '@/shared/ui/ActivityTable';

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
