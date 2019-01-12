<template>
    <p-modal name="create-reminder" title="Create Reminder">
        <form @submit="createReminder">
            <!-- @csrf -->
            
            <div class="row mb-10">
                <div class="col w-full">
                    <div class="mb-4">
                        <label class="block text-grey-darker text-sm font-bold mb-2" for="body">Remind me...</label>
                        <input v-model="body" type="text" name="body" id="body" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col w-full lg:w-1/2">
                    <div class="mb-4">
                        <label class="block text-grey-darker text-sm font-bold mb-2" for="frequency">Frequency</label>
                        <select v-model="frequency" name="frequency" id="frequency" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline">
                            <option v-for="(frequency, value) in frequencies" :key="value" :value="value">{{ frequency }}</option>
                        </select>
                    </div>
                </div>

                <div class="col w-full lg:w-1/2">
                    <div class="mb-4">
                        <label class="block text-grey-darker text-sm font-bold mb-2" for="day">Day</label>
                        <select v-model="day" name="day" id="day" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Choose...</option>
                            <option v-for="(day, value) in days" :key="value" :value="value">{{ day }}</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col w-full lg:w-1/2">
                    <div class="mb-4">
                        <label class="block text-grey-darker text-sm font-bold mb-2" for="date">Date</label>
                        <select v-model="date" name="date" id="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Choose...</option>
                            <option v-for="date in dates" :key="date" :value="date">{{ ordinal(date) }}</option>
                        </select>
                    </div>
                </div>

                 <div class="col w-full lg:w-1/2">
                    <div class="mb-4">
                        <label class="block text-grey-darker text-sm font-bold mb-2" for="time">Time</label>

                        <select v-model="time" name="time" id="time" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Choose...</option>

                            <option v-for="time in times" :key="time.military" :value="time.military">{{ time.regular }}</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col w-full">
                    <div class="mt-4">
                        <label class="block text-grey-darker text-sm font-bold mb-2" for="run_once">
                            <input type="checkbox" name="run_once" id="run_once" class="mr-1" v-model="runOnce"> Run only once
                        </label>
                    </div>
                </div>
            </div>
        </form>

        <div slot="footer">
            <button class="button mr-3" v-modal:create-reminder>Cancel</button>
            <button @click="createReminder" class="button button--primary">Create</button>
        </div>
    </p-modal>
</template>

<script>
    import _ from 'lodash'

    export default {
        name: 'create-reminder-modal',

        data() {
            return {
                body: '',
                frequency: 'everyMinute',
                day: '',
                date: '',
                time: '',
                runOnce: false,
            }
        },

        props: {
            frequencies: {
                required: true,
            },

            days: {
                required: true,
            },
        },

        computed: {
            dates() {
                return _.range(1, 31)
            },

            times() {
                const moment   = require('moment')
                const start    = moment().startOf('day');
                const segments = 24 * 4; // 24 hours * 15 mins in an hour
                let times      = []

                for (let i = 0; i < segments; i++) {
                    let time = moment(start)
                        .add(15 * i, 'minutes')

                    let military = time.format('HH:mm')
                    let regular  = time.format('hh:mm A')
                    
                    times.push({
                        military: military,
                        regular: regular
                    })
                }

                return times
            },
        },

        methods: {
            createReminder() {
                window.axios.post('/api/reminder', {
                    'body': this.body,
                    'frequency': this.frequency,
                    'day': this.day,
                    'date': this.date,
                    'time': this.time,
                    'run_once': this.runOnce,
                }).then((response) => {
                    window.location.reload()
                })
            },

            ordinal(value) {
                let ends = ['th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th']

                if (((value % 100) >= 11) && ((value % 100) <= 13)) {
                    return value + 'th'
                }

                return value + ends[value % 10];
            }
        }
    }
</script>
