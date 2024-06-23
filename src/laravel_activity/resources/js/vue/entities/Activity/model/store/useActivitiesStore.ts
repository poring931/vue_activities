import { defineStore } from 'pinia';
import axios from 'axios';

export const useActivitiesStore = defineStore('activities', {
    state: () => ({
        data: [],
        isLoading: false,
        sectionNavigation: {},
        sectionHasMoreElements: {},
        sectionLoading: {},
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
                    this.sectionLoading[sectionId] = false;
                    this.sectionNavigation[sectionId] = {
                        currentPage: 1,
                        lastPage: item.activities.last_page,
                        sectionId: sectionId,
                        total: item.activities.total,
                    };

                    this.sectionHasMoreElements[sectionId] = item.activities.next_page_url !== null;
                });

            } catch (error) {
                console.error('Error fetching activities:', error);
            } finally {
                this.isLoading = false;
            }
        },
        async loadMore(sectionId) {
            try {
                if (this.isLoading || !this.sectionNavigation[sectionId] || !this.sectionNavigation[sectionId].lastPage) {
                    return;
                }

                const nextPage = this.sectionNavigation[sectionId].currentPage + 1;

                if (nextPage > this.sectionNavigation[sectionId].lastPage) {
                    this.sectionHasMoreElements[sectionId] = false;
                    return;
                }

                this.sectionLoading[sectionId] = true;

                const response = await axios.get(`/api/activities?section_id=${sectionId}&page=${nextPage}`);
                const activitiesData = response.data[sectionId]?.activities?.data;

                if (!activitiesData || activitiesData.length === 0) {
                    console.error('No activities data found or data length is zero for section:', sectionId);
                    this.sectionHasMoreElements[sectionId] = false;
                } else {
                    Object.values(activitiesData).forEach(activity => {
                        this.data[sectionId].activities.data.push(activity);
                    });
                    this.sectionNavigation[sectionId].currentPage = response.data[sectionId].activities.current_page;
                    this.sectionHasMoreElements[sectionId] = response.data[sectionId].activities.next_page_url !== null;
                }
            } catch (error) {
                console.error('Error loading more activities:', error);
            }  finally {
                this.sectionLoading[sectionId] = false;
            }
        }
    },
});
