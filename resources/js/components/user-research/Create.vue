<template>
    <form @submit="onFormSubmit" ref="form">
        <div class='form-group'>
            <label for='title'> Judul: </label>
            <input
                v-model='title'
                class='form-control'
                :class="{'is-invalid': get(this.error_data, 'errors.title[0]', false)}"
                type='text' id='title' placeholder='Judul'>
            <div class='invalid-feedback'>{{ get(this.error_data, 'errors.title[0]', false) }}</div>
        </div>

        <div class='form-group'>
            <label for='year'> Tahun: </label>
            <input
                v-model='year'
                class='form-control'
                :class="{'is-invalid': get(this.error_data, 'errors.year[0]', false)}"
                type='number' id='year' placeholder='Tahun'>
            <div class='invalid-feedback'>{{ get(this.error_data, 'errors.year[0]', false) }}</div>
        </div>

        <div class="form-group">
            <label for='category_id'> Kategori: </label>
            <select v-model="category_id" class="form-control">
                <option v-for="category in categories" :value="category.id" :key="category.id">
                    {{ category.name }}
                </option>
            </select>
        </div>

        <div class='form-group'>
            <label for='description'> Deskripsi: </label>
            <textarea
                v-model='description'
                class='form-control'
                :class="{'is-invalid': get(this.error_data, 'errors.description[0]', false)}"
                type='text' id='description' placeholder='Deskripsi'></textarea>
            <div class='invalid-feedback'>{{ get(this.error_data, 'errors.description[0]', false) }}</div>
        </div>

        <div class="form-group">
            <label for="authors"> Penulis: </label>

            <div class="form-row" v-for="(author, i) in authors" :key="i">
                <div class="col-md-1">
                    {{ i + 1 }}.
                </div>
                <div class='form-group col-md-5'>
                    <input class="form-control" type="text" 
                        placeholder="Nama Depan"
                        :class="{'is-invalid': get(error_data, ['errors', `authors.${i}.first_name`, 0], false)}"
                        v-model="author.first_name">
                </div>
                <div class='form-group col-md-5'>
                    <input class="form-control" type="text"
                        placeholder="Nama Belakang"
                        :class="{'is-invalid': get(error_data, ['errors', `authors.${i}.last_name`, 0], false)}"
                        v-model="author.last_name">
                </div>
                <div class="col-md-1">
                    <button v-if="authors.length > 1" @click="onRemoveAuthorButtonClick(i)" class="btn btn-danger" type="button">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
            </div>

            <div class="text-right">
                <button @click="onAddAuthorButtonClick()" type="button" class="mt-2 btn btn-sm btn-secondary">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </div>

        <div class="form-group">
            <label for="document"> Dokumen: </label>
            <input
                :class="{'is-invalid': get(this.error_data, 'errors.document[0]', false)}"
                ref="document" type="file" class="form-control" name="document" accept="pdf">
            <div class='invalid-feedback'>{{ get(this.error_data, 'errors.document[0]', false) }}</div>
        </div>

        <div class="form-group mt-4">
            <button class="btn btn-secondary">
                Tambahkan Hasil Penelitian Baru
                <i class="fa fa-plus"></i>
            </button>
        </div>

    </form>
</template>

<script>
export default {
    data() {
        return {
            title: null,
            year: window.currentYear,
            category_id: window.categories[0].id,
            description: null,
            document: null,
            error_data: null,
            authors: [{ first_name: window.user.first_name, last_name: window.user.last_name}],

            categories: window.categories,
            get: _.get
        }
    },

    computed: {
        formData() {
            return {
                title: this.title,
                year: this.year,
                category_id: this.category_id,
                description: this.description,
            }
        }
    },

    methods: {
        onAddAuthorButtonClick() {
            this.authors.push({first_name: null, last_name: null})
        },

        onRemoveAuthorButtonClick(index) {
            this.authors.splice(index, 1)
        },

        onFormSubmit(e) {
            e.preventDefault();

            // Prepare data to be sent
            let preparedFormData = new FormData();
            
            Object.keys(this.formData).forEach(key => {
                if (this.formData[key] == null) { return; }
                preparedFormData.append(key, this.formData[key]);
            });

            this.authors.forEach((author, index) => {
                preparedFormData.append(`authors[${index}][first_name]`, author.first_name || '')
                preparedFormData.append(`authors[${index}][last_name]`, author.last_name || '')
            })

            preparedFormData.append('document', this.$refs.document.files[0])
            
            axios.post(`/user-research/store`, preparedFormData, {headers: { 'Content-Type': 'multipart/form-data' }})
                .then(response => { window.location.reload(true) })
                .catch(error => { this.error_data = error.response.data })
        }
    }
}
</script>

<style>

</style>
