import { defineStore } from 'pinia';
import axios from 'axios';

export const useActivitiesStore = defineStore('activities', {
    state: () => ({
        data: [],
        isLoading: false,
        navigationSection: {},
        hasMore: {},
    }),
    actions: {
        async fetchActivities() {
            if (this.data.length > 0) {
                return this.data;
            }
            try {
                this.isLoading = true;
                const response = await axios.get('/api/activities');
                this.data = response.data;
                console.log(this.data);

                Object.values(this.data).forEach(item => {
                    const sectionId = item.section.id;

                    this.navigationSection[sectionId] = {
                        currentPage: 1,
                        lastPage: item.activities.last_page,
                        sectionId: sectionId,
                        total: item.activities.total,
                    };

                    this.hasMore[sectionId] = item.activities.next_page_url !== null;
                });
            } catch (error) {
                console.error('Error fetching activities:', error);
            } finally {
                this.isLoading = false;
            }
        },
        async loadMore(sectionId) {
            try {
                if (this.isLoading || !this.navigationSection[sectionId] || !this.navigationSection[sectionId].lastPage) {
                    return;
                }

                const nextPage = this.navigationSection[sectionId].currentPage + 1;

                if (nextPage > this.navigationSection[sectionId].lastPage) {
                    this.hasMore[sectionId] = false;
                    return;
                }

                this.isLoading = true;

                const response = await axios.get(`/api/activities?section_id=${sectionId}&page=${nextPage}`);
                const activitiesData = response.data[sectionId]?.activities?.data;

                if (!activitiesData || activitiesData.length === 0) {
                    console.error('No activities data found or data length is zero for section:', sectionId);
                    this.hasMore[sectionId] = false;
                } else {
                    Object.values(activitiesData).forEach(activity => {
                        this.data[sectionId].activities.data.push(activity);
                    });
                    this.navigationSection[sectionId].currentPage = response.data[sectionId].activities.current_page;
                    this.hasMore[sectionId] = response.data[sectionId].activities.next_page_url !== null;
                }
            } catch (error) {
                console.error('Error loading more activities:', error);
            } finally {
                this.isLoading = false;
            }
        }
    },
});
