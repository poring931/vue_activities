<template>
    <div>
        <v-table>
            <thead>
                <tr>
                    <th class="text-left">Duration</th>
                    <th class="text-left">Description</th>
                    <th class="text-left">Starts At</th>
                    <th class="text-left">End At</th>
                    <th class="text-left"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="activity in data" :key="activity.id">
                    <td class="font-weight-bold text-h6">
                        {{ activity.duration }}
                    </td>
                    <td>{{ activity.description }}</td>
                    <td>{{ activity.start_date }}</td>
                    <td>{{ activity.end_date }}</td>
                    <td>
                        <Timer
                            :section-id="activity.activity_section_id"
                            :activity-id="activity.id"
                        />
                        {{ activity.id }}
                    </td>
                </tr>
            </tbody>
        </v-table>
        <v-row align="center" justify="center" class="mt-3">
            <v-btn
                v-if="store.sectionHasMoreElements[sectionId]"
                variant="outlined"
                size="x-large"
                rounded="lg"
                :loading="store.isLoading"
                :disabled="store.sectionLoading[sectionId]"
                @click="loadMore"
            >
                Загрузить еще
                <template v-if="store.sectionLoading[sectionId]" #append>
                    <Loader />
                </template>
            </v-btn>
        </v-row>
    </div>
</template>

<script setup lang="ts">
import { VBtn, VRow, VTable } from 'vuetify/components';
import { useActivitiesStore } from '@/entities/Activity';
import { PropType } from 'vue';
import Loader from '@/shared/ui/Loader/ui/Loader.vue';
import { Timer } from '@/widgets/Timer';

const props = defineProps({
    data: {
        type: Array as PropType<
            Array<{
                id: number;
                duration: string;
                start_date: string;
                activity_section_id: number;
                end_date: string;
            }>
        >,
        required: true,
    },
    sectionId: {
        type: Number,
        required: true,
    },
});

const store = useActivitiesStore();

const loadMore = async () => {
    await store.loadMore(props.sectionId);
};

</script>
