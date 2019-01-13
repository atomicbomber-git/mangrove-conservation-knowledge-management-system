<template>
    <form @submit="formSubmitted">
        <div class='form-group'>
            <label for='title'> Judul: </label>
            <input
                v-model='title'
                class='form-control'
                :class="{'is-invalid': get(this.error_data, 'errors.title[0]', false)}"
                type='text' id='title' placeholder='Judul'>
            <div class='invalid-feedback'>{{ get(this.error_data, 'errors.title[0]', false) }}</div>
        </div>

        <div class="form-group">
            <label for="content"> Isi: </label>
            <vue-editor v-model="content"></vue-editor>
        </div>

        <div class="form-group">
            <button class="btn btn-primary">
                Ubah Data
                <i class="fa fa-check"></i>
            </button>
        </div>
    </form>
</template>

<script>
export default {
    data() {
        return {
            error_data: null,
            title: window.records.title,
            content: window.records.content,
        }
    },

    methods: {
        formSubmitted(e) {
            e.preventDefault()

            axios.post(`/mangrove/update`, {title: this.title, content:this.content })
                .then(response => {
                    window.location.reload(true)
                })
                .catch(error => {
                    this.error_data = error.response.data
                })
        },

        get: _.get
    }
}
</script>

<style>

</style>
