<template>
    <div class="mb-2 pb-2 border-b-2 border-dashed text-sm">
        <div class="text-center">
            <a href="#" @click.prevent="createNote">Add Note</a>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['notebook'],

        methods: {
            createNote() {
                console.log('creating note...')
                
                window.axios.post('/api/notebook/' + this.notebook.id + '/notes', {
                    'title': 'Hello World',
                }).then((response) => {
                    window.location.reload()
                })
            }
        }
    }
</script>
