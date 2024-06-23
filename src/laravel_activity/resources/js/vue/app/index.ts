import App from './App.vue';
import {createApp} from 'vue';
import {createVuetify} from "vuetify";
import * as directives from "vuetify/directives";
import {VApp, VLayout, VNavigationDrawer} from 'vuetify/components'
import {router, store} from './providers'
import '@mdi/font/css/materialdesignicons.css'

import 'vuetify/styles'
import colors from 'vuetify/util/colors'

const vuetify = createVuetify({
    components: {
        VApp,
        VLayout, VNavigationDrawer
    },
    theme: {
        themes: {
            light: {
                dark: false,
                colors: {
                    primary: colors.red.darken1,
                    secondary: colors.red.lighten4,
                }
            },
        },
    },
    directives
})


export const app = createApp(App)
    .use(store)
    .use(vuetify)
    .use(router);
