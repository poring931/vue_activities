import { defineStore } from 'pinia';

export const useActivitiesStore = defineStore('activities', {
    state: () => ({
        data: [],
        isLoading: false,
    }),
    actions: {
        async fetchActivities() {
            console.log(this.data);
            if (this.data[0]) {
                return this.data;
            }
            try {
                this.isLoading = true;
                const response = await axios.get('/api/activities');
                this.data = response.data;
            } catch (error) {
                console.error('Error fetching activities:', error);
            } finally {
                this.isLoading = false;
            }
        },
    },
});
