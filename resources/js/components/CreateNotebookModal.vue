<template>
    <p-modal name="create-notebook" title="Create Notebook">
        <form @submit="createNotebook">           
            <div class="row">
                <div class="col w-full">
                    <div class="mb-4">
                        <label class="block text-grey-darker text-sm font-bold mb-2" for="title">Title</label>
                        <input v-model="title" type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col w-full">
                    <div class="mb-4">
                        <label class="block text-grey-darker text-sm font-bold mb-2" for="description">Description</label>
                        <textarea v-model="description" type="text" name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" style="min-height: 150px;">
                        </textarea>
                    </div>
                </div>
            </div>
        </form>

        <div slot="footer">
            <button class="button mr-3" v-modal:create-notebook>Cancel</button>
            <button @click="createNotebook" class="button button--primary">Create</button>
        </div>
    </p-modal>
</template>

<script>
    export default {
        name: 'create-notebook-modal',

        data() {
            return {
                title: '',
                description: '',
            }
        },

        methods: {
            createNotebook() {
                window.axios.post('/api/notebook', {
                    'title': this.title,
                    'description': this.description,
                }).then((response) => {
                    window.location.reload()
                })
            },
        }
    }
</script>
