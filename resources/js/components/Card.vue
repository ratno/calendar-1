<template>
    <card class="h-auto p-4">
        <a-calendar @panelChange="onPanelChange" @select="onSelect" @change="onChange">
            <ul class="" slot="dateCellRender" slot-scope="value">
                <li v-for="event in getDayEvents(value)" :key="event.id">
                    {{ event.name }}
                </li>
            </ul>
            <ul class="" slot="monthCellRender" slot-scope="value">
                <li v-for="event in onPanelChange(value)" :key="event.id">
                    {{ event.name }}
                </li>
            </ul>
        </a-calendar>
    </card>
</template>

<script>
import { Antd, Calendar } from 'ant-design-vue';

export default {
    methods: {
        onPanelChange(value, mode) {
            console.log("onPanelChange()", value.format(), mode);
            let monthEvents = []
            if (this.events) {
                this.events.forEach((event) => {
                    let appointment_at = moment(event.appointment_at)
                    console.log(moment(appointment_at).isSame(value, 'month'));
                    if (moment(appointment_at).isSame(value, 'month')) {
                        monthEvents.push(event)
                    }
                })
            }
            return monthEvents
        },
        onSelect(value) {
            console.log("onSelect()", value.format());
        },
        onChange(value) {
            console.log("onChange()", value.format());
        },
        getDayEvents(calendar_date) {
            console.log("getEvents()");
            let dayEvents = []
            if (this.events) {
                this.events.forEach((event) => {
                    let appointment_at = moment(event.appointment_at)
                    if (moment(appointment_at).isSame(calendar_date, 'day')) {
                        dayEvents.push(event)
                    }
                })
            }
            return dayEvents
        },
        fetchEvents() {
            this.loading = true
            Nova.request().get('/nova-vendor/calendar/appointments').then((response) => {
                this.loading = false
                this.events = response.data
                setTimeout(this.fetchEvents, 60 * 1000)
            })
        },
    },
    props: ['card'],
    components: {
        Calendar,
    },
    mounted() {
        console.log('mounted()')
        this.fetchEvents()
    },
    data() {
        console.log('data()')
        return {
            debug: null,
            events: null
        }
    }
}
</script>

<style>
@import '~ant-design-vue/dist/antd.css';
</style>
