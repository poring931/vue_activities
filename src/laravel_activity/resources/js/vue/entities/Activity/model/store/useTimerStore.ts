import {defineStore} from 'pinia';
import axios from 'axios';
import {TimerState} from "@/entities/Activity/model/types/timer";

export const useTimerStore = defineStore('timers', {
    state: (): TimerState => ({
        data: {}
    }),
    actions: {
        async start(sectionId: number, activityId: number | null) {
            const timerId = activityId || sectionId;
            if (!this.data[timerId]) {
                this.data[timerId] = {
                    isActive: false,
                    startTime: 0,
                    elapsedTime: 0,
                    intervalId: null,
                    updateIntervalId: null,
                    activityId,
                    sectionId,
                };
            }

            const timer = this.data[timerId];
            if (!timer.isActive) {
                timer.isActive = true;
                timer.startTime = Date.now();

                if (!timer.activityId) {
                    try {
                        const response = await axios.post('/api/activities', {sectionId});
                        timer.activityId = response.data.id;
                    } catch (error) {
                        console.error('Failed to create activity:', error);
                    }
                }

                timer.intervalId = setInterval(() => {
                    timer.elapsedTime = Date.now() - timer.startTime;
                }, 1000);

                timer.updateIntervalId = setInterval(async () => {
                    if (timer.activityId) {
                        try {
                            await axios.put(`/api/activities/${timer.activityId}`, {duration: timer.elapsedTime});
                        } catch (error) {
                            console.error('Failed to update activity periodically:', error);
                        }
                    }
                }, 60000); // Update every 60 seconds
            }
        },
        async stop(sectionId: number, activityId: number | null) {
            const timerId = activityId || sectionId;
            const timer = this.data[timerId];
            if (timer && timer.isActive) {
                timer.isActive = false;
                clearInterval(timer.intervalId);
                clearInterval(timer.updateIntervalId);

                try {
                    if (timer.activityId) {
                        await axios.put(`/api/activities/${timer.activityId}`, {duration: timer.elapsedTime});
                    }
                } catch (error) {
                    console.error('Failed to update activity:', error);
                }

                timer.elapsedTime = 0;
                timer.activityId = null;
            }
        }
    },
});
