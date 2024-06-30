<template>
  <div
class="timer d-flex justify-center ga-4 align-center pa-2 border-lg"
       :class="{
         'border-warning': isActive,
         'border-info': !isActive
       }"
  >
    <div class="text-h5">{{ formattedTime }}</div>
    <transition-group name="fade">
      <v-icon
          v-if="!isActive"
          :key="1"
          color="green darken-3"
          icon="mdi-play-circle-outline"
          size="x-large"
          class="timer__button-play"
          @click="startTimer"
      ></v-icon>

      <v-icon
          v-if="isActive"
          :key="2"
          color="red red-darken-4"
          icon="mdi-stop-circle-outline"
          size="x-large"
          class="timer__button-stop"
          @click="stopTimer"
      ></v-icon>
    </transition-group>
  </div>
</template>

<script setup lang="ts">
import { VIcon } from 'vuetify/components';
import { useTimerStore } from '@/entities/Activity/model/store/useTimerStore';
import { computed } from 'vue';
const props = defineProps({
    sectionId: {
        type: Number,
        required: true,
    },
    activityId: {
        type: Number,
        required: false,
    }
});
const store = useTimerStore();

const isActive = computed(() => {
    const timer = store.data[props.activityId || props.sectionId];

    return timer ? timer.isActive : false;
});

const startTimer = () => {
    store.start(props.sectionId, props.activityId);
};

const stopTimer = () => {
    store.stop(props.sectionId, props.activityId);
};

const formattedTime = computed(() => {
    const timer = store.data[props.activityId || props.sectionId];

    if (!timer) return '00:00:00';

    const hours = Math.floor(timer.elapsedTime / (1000 * 60 * 60));
    const minutes = Math.floor((timer.elapsedTime % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((timer.elapsedTime % (1000 * 60)) / 1000);

    return `${padZero(hours)}:${padZero(minutes)}:${padZero(seconds)}`;
});

const padZero = (num: number) => {
    return num < 10 ? `0${num}` : num.toString();
};

</script>

<style scoped>
.timer {
  &__button {
    transform: translateZ(0);
  }
}

.fade-move,
.fade-enter-active,
.fade-leave-active {
  transition: all 0.3s cubic-bezier(0.55, 0, 0.1, 1);
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
  transform: scaleY(0.01) translate(30px, 0);
}

.fade-leave-active {
  position: absolute;
}
</style>
