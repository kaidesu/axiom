<template>
    <div>
        <div v-if="isOpen">
            <form class="mb-4" @submit.prevent="addTask">
                <input
                    ref="input"
                    v-model="body"
                    type="text"
                    name="body"
                    id="body"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Add a new task"
                >
            </form>

            <div class="flex items-center">
                <button type="submit" @click.prevent="addTask" class="button button--primary mr-4">Add Task</button>
                <a href="#" class="no-underline text-grey hover:underline" @click.prevent="close">Cancel</a>
            </div>
        </div>

        <a href="#" class="no-underline text-grey-darker hover:text-purple" @click.prevent="open" v-else><span class="text-2xl text-purple mr-1">+</span> Add a task</a>
    </div>
</template>

<script>
    export default {
        name: 'add-task',

        props: ['project'],

        data() {
            return {
                body: '',
                isOpen: false,
            }
        },

        methods: {
            open() {
                this.isOpen = true

                this.$nextTick(() => {
                    this.$refs.input.focus()
                })
            },

            close() {
                this.isOpen = false
            },

            addTask() {
                window.axios.post('/api/project/' + this.project.id + '/tasks', {
                    'body': this.body,
                }).then((response) => {
                    window.location.reload()
                })
            }
        }
    }
</script>
