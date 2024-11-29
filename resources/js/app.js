import { createApp, h } from 'vue';
import { App, plugin as inertiaPlugin } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import concurrently from 'concurrently';

const el = document.getElementById('app');

createApp({
    render: () => h(App, {
        initialPage: JSON.parse(el.dataset.page),
        resolveComponent: name => import(`./Pages/${name}.vue`).then(module => module.default),
    })
}).use(inertiaPlugin)
    .mount(el);

InertiaProgress.init();
