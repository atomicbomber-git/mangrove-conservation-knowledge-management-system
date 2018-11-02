<template>
    <form @submit="formSubmitted">
        <div class="form-group">
            <label for='title'> Status: </label>
            <select
                class="form-control" v-model="article.original_status"
                :class="{'is-invalid': get(this.error_data, 'errors.status[0]', false)}">
                <option v-for="(status_name, status_key) in statuses" :key="status_key" :value="status_key">
                    {{ status_name }}
                </option>
            </select>
            <div class='invalid-feedback'>{{ get(this.error_data, 'errors.status[0]', false) }}</div>
        </div>

        <div class='form-group'>
            <label for='title'> Judul: </label>
            <input
                v-model='article.title'
                class='form-control'
                :class="{'is-invalid': get(this.error_data, 'errors.title[0]', false)}"
                type='text' id='title' placeholder='Judul'>
            <div class='invalid-feedback'>{{ get(this.error_data, 'errors.title[0]', false) }}</div>
        </div>

        <div class="form-group">
            <label for='category_id'> Kategori: </label>
            <select
                class="form-control" v-model="article.category_id"
                :class="{'is-invalid': get(this.error_data, 'errors.category_id[0]', false)}">
                <option v-for="category in categories" :key="category.id" :value="category.id">
                    {{ category.name }}
                </option>
            </select>
            <div class='invalid-feedback'>{{ get(this.error_data, 'errors.category_id[0]', false) }}</div>
        </div>

        <div class="form-group">
            <label for="content"> Isi: </label>
            <vue-editor v-model="article.content"></vue-editor>
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
    import { VueEditor } from "vue2-editor";

    export default {
        data() {
            return {
                article: window.article,
                error_data: null
            }
        },

        computed: {
            form_data() {
                return {
                    'title': this.article.title,
                    'content': this.article.content,
                    'status': this.article.original_status,
                    'category_id': this.article.category_id
                }
            },

            statuses() { return window.statuses },
            categories() { return window.categories }
        },

        methods: {
            get: _.get,
            formSubmitted: function(e) {
                e.preventDefault()

                axios.post(`/article/update/${this.article.id}`, this.form_data)
                    .then(response => {
                        window.location.reload(true)
                    })
                    .catch(error => {
                        this.error_data = error.response.data
                    })
            }
        }
    }
</script>
