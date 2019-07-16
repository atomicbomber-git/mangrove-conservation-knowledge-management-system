<template>
    <form @submit.prevent="onFormSubmit">
        <div class='form-group'>
            <label for='nama'> Nama: </label>
            <input
                v-model='nama'
                class='form-control'
                :class="{'is-invalid': get(this.error_data, 'errors.nama[0]', false)}"
                type='text' id='nama' placeholder='Nama'>
            <div class='invalid-feedback'>{{ get(this.error_data, 'errors.nama[0]', false) }}</div>
        </div>

        <div class="form-row">
            <div class="col-md">
                <div class='form-group'>
                    <label for='tanggal_mulai'> Tanggal Mulai: </label>
                    <input
                        v-model='tanggal_mulai'
                        class='form-control'
                        :class="{'is-invalid': get(this.error_data, 'errors.tanggal_mulai[0]', false)}"
                        type='date' id='tanggal_mulai' placeholder='Tanggal Mulai'>
                    <div class='invalid-feedback'>{{ get(this.error_data, 'errors.tanggal_mulai[0]', false) }}</div>
                </div>
            </div>
            <div class="col-md">
                <div class='form-group'>
                    <label for='tanggal_selesai'> Tanggal Selesai: </label>
                    <input
                        v-model='tanggal_selesai'
                        class='form-control'
                        :class="{'is-invalid': get(this.error_data, 'errors.tanggal_selesai[0]', false)}"
                        type='date' id='tanggal_selesai' placeholder='Tanggal Selesai'>
                    <div class='invalid-feedback'>{{ get(this.error_data, 'errors.tanggal_selesai[0]', false) }}</div>
                </div>
            </div>
        </div>

        <div class='form-group'>
            <label for='dana'> Dana: </label>
            <input
                v-model='dana'
                class='form-control'
                :class="{'is-invalid': get(this.error_data, 'errors.dana[0]', false)}"
                type='number' id='dana' placeholder='Dana'>
            <div class='invalid-feedback'>{{ get(this.error_data, 'errors.dana[0]', false) }}</div>
        </div>

        <div class='form-group'>
            <label for='penanggung_jawab'> Penanggung Jawab: </label>
            <input
                v-model='penanggung_jawab'
                class='form-control'
                :class="{'is-invalid': get(this.error_data, 'errors.penanggung_jawab[0]', false)}"
                type='text' id='penanggung_jawab' placeholder='Penanggung Jawab'>
            <div class='invalid-feedback'>{{ get(this.error_data, 'errors.penanggung_jawab[0]', false) }}</div>
        </div>

        <div class='form-group'>
            <label for='bibits'> Bibit: </label>

            <multiselect
                placeholder="Bibit"
                selectLabel=""
                deselectLabel=""
                track-by="id"
                label="nama"
                :options="bibit_options"
                v-model="bibit_option"
            ></multiselect>

            <table class="mt-3 table table-sm table-bordered table-striped">
                <thead class="thead thead-dark">
                    <tr>
                        <th> # </th>
                        <th> Nama </th>
                        <th> Jumlah </th>
                        <th class="text-center"> Tindakan </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(added_bibit, i) in added_bibits" :key="added_bibit.id">
                        <td> {{ i + 1 }} </td>
                        <td> {{ added_bibit.nama }} </td>
                        <td>
                            <input
                                v-model="added_bibit.jumlah"
                                class="form-control form-control-sm"
                                type="number">
                        </td>
                        <td class="text-center">
                            <button @click="onBibitRemoveButtonClick(added_bibit)" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

        <div>
            <button class="btn btn-primary">
                Tambahkan Program Pemerintah
            </button>
        </div>
    </form>
</template>

<script>

import { get } from 'lodash'

export default {
    props: [
        "original_bibits", "submit_url", "redirect_url",
    ],

    data() {
        return {
            nama: null,
            tanggal_mulai: null,
            tanggal_selesai: null,
            dana: null,
            penanggung_jawab: null,
            bibits: this.original_bibits.map(original_bibit => {
                return {
                    ...original_bibit,
                    jumlah: 0,
                    added: false,
                }
            }),

            error_data: null,
            bibit_option: null,
        }
    },

    watch: {
        bibit_option(new_option, old_option) {
            if (new_option !== null) {
                this.bibit_option.added = true
                this.bibit_option = null
            }
        }
    },

    computed: {
        form_data() {
            return {
                nama: this.nama,
                tanggal_mulai: this.tanggal_mulai,
                tanggal_selesai: this.tanggal_selesai,
                dana: this.dana,
                penanggung_jawab: this.penanggung_jawab,
                bibits: this.added_bibits.map(added_bibit => {
                    return {
                        id: added_bibit.id,
                        jumlah: added_bibit.jumlah,
                    }
                }),
            }
        },

        added_bibits() {
            return this.bibits.filter(bibit => bibit.added)
        },

        bibit_options() {
            return this.bibits.filter(bibit => !bibit.added)
        },
    },

    methods: {
        get,

        onBibitRemoveButtonClick(bibit) {
            bibit.added = false
            bibit.jumlah = 0
        },

        onFormSubmit() {
            axios.post(this.submit_url, this.form_data)
               .then(response => {
                    window.location.replace(this.redirect_url)
               })
               .catch(error => {
                   this.error_data = error.response.data
               })
        },
    }
}
</script>
