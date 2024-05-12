import App from './App.vue';
import {createApp} from 'vue';
import {createVuetify} from "vuetify";
import * as directives from "vuetify/directives";
import {VApp, VLayout, VNavigationDrawer} from 'vuetify/components'
import {router, store} from './providers'

const vuetify = createVuetify({
    components: {
        VApp,
        VLayout, VNavigationDrawer
    },
    directives
})


export const app = createApp(App)
    .use(store)
    .use(vuetify)
    .use(router);
