import { defineStore } from 'pinia';

export const useTimerStore = defineStore('timer', {
    state: () => ({
        isActive: false,
        startTime: 0,
        elapsedTime: 0,
        intervalId: null, // Добавляем поле для хранения идентификатора интервала
    }),
    actions: {
        start() {
            if (!this.isActive) {
                this.isActive = true;
                this.startTime = Date.now();
                this.intervalId = setInterval(() => {
                    this.elapsedTime = Date.now() - this.startTime;
                }, 1000);
            }
        },
        stop() {
            this.isActive = false;
            clearInterval(this.intervalId); // Очищаем конкретный интервал по его идентификатору
            this.elapsedTime = 0; // Сбрасываем время после остановки
        },
    },
});
