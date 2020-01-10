import { Antd, Calendar } from 'ant-design-vue';
Nova.booting((Vue, router, store) => {
    Vue.component('Calendar', require('./components/Card'));
    Vue.component(Calendar.name, Calendar);
})
