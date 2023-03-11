import { createApp, h } from 'vue'
import {createInertiaApp, Head} from '@inertiajs/vue3'
import Layout from "./Shared/Layouts/Dashboard.vue";

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        let page = pages[`./Pages/${name}.vue`]
        page.default.layout = page.default.layout || Layout
        return page
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component('Head',Head)
            .mount(el)
    },
    title: (title) => title ? `${title} - MyApp` : 'MyApp',
})
