<template>
    <div>
        <navbar>
        </navbar>
        <div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">

        <div v-if="$page.props.flash.success" class="alert">
           {{ toast_success() }}
         </div>
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">

                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Rank.
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Team
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Main
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Menang
                            </th>
                             <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Seri
                            </th>
                             <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Kalah
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Pts.
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Delete
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Update
                            </th>

                        </tr>
                    </thead>
                    <tbody v-for="(klub, rank) in klasemen">
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-center text-gray-900 whitespace-no-wrap font-extrabold">{{ ++rank }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap text-center font-extrabold">{{klub.nama_klub}}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap text-center">{{klub.main}}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap text-center">
                                    {{klub.menang}}
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap text-center">
                                    {{klub.seri}}
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap text-center">
                                    {{klub.kalah}}
                                </p>
                            </td>
                             <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap text-center">
                                    {{klub.jumlah_point}}
                                </p>
                            </td>

                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <button @click.prevent="deleteData(klub.id)" class="text-red-500 whitespace-no-wrap text-center font-extrabold">
                                    Delete
                                </button>
                            </td>

                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <a href="#" class="text-blue-500 whitespace-no-wrap text-center font-extrabold">
                                    Update
                                </a>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        </div>

    </div>

</template>

<style>

</style>

<script>

import Navbar from '../layouts/navbar.vue'

export default {
    components: {
        'navbar': Navbar
    },
    props: {
        'klasemen': Array,
    },
    methods: {
            toast_success() {
                this.$toast.success('Data Berhasil Di Tambah.', {
                position: 'top-right'
                })
            },
            toast_danger() {
                this.$toast.error('Data Berhasil Di Hapus.', {
                position: 'top-right'
                })
            },

            deleteData(data) {
                console.log(data);
                this.$inertia.delete('/admin/delete/' + data)
                this.toast_danger();
            }
    }
}
</script>
