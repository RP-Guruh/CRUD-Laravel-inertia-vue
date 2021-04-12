<template>
    <div>
        <navbar>
        </navbar>

        <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">

  <div class="relative py-3 sm:max-w-xl sm:mx-auto">
    <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
         <p class="font-bold mb-4" v-text="pesan"></p>
      <div class="max-w-md mx-auto">
        <div class="flex items-center space-x-5">
          <div class="h-14 w-14 bg-yellow-200 rounded-full flex flex-shrink-0 justify-center items-center text-yellow-500 text-2xl font-mono">i</div>
          <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
            <h2 class="leading-relaxed">Klasemen Klub</h2>
            <p class="text-sm text-gray-500 font-normal leading-relaxed">Liga Inggris 2020/2021</p>
          </div>
        </div>
        <div class="divide-y divide-gray-200">

        <form v-on:submit="checkValidation" novalidate="true">
            <p class="mt-4" v-if="errors.length">
               <ul>
                    <hr>
                <li v-for="error in errors" :key="error.id">{{ error }}</li>
                </ul>
            </p>

          <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
            <div class="flex flex-col">
              <label class="leading-loose">Nama Klub</label>
              <input type="text" v-model="form.nama_klub" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Nama Klub">
            </div>

            <div class="flex flex-col">
              <label class="leading-loose">Total Main</label>
              <input type="number" v-model="form.main" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Total Main">
            </div>
            <div class="flex items-center space-x-4">
              <div class="flex flex-col">
                <label class="leading-loose">Jumlah Menang</label>
                <div class="relative focus-within:text-gray-600 text-gray-400">
                  <input type="number" v-model="form.menang" name="menang" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" >

                </div>
              </div>
              <div class="flex flex-col">
                <label class="leading-loose">Jumlah Kalah</label>
                <div class="relative focus-within:text-gray-600 text-gray-400">
                  <input type="number" v-model="form.kalah" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">

                </div>
              </div>
            </div>

             <div class="flex items-center space-x-4">
              <div class="flex flex-col">
                <label class="leading-loose">Jumlah Seri</label>
                <div class="relative focus-within:text-gray-600 text-gray-400">
                  <input type="number" v-model="form.seri" name="seri" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">

                </div>
              </div>
              <div class="flex flex-col">
                <label class="leading-loose">Jumlah Point</label>
                <div class="relative focus-within:text-gray-600 text-gray-400">
                  <input type="text" readonly="readonly" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" v-bind:value="total   ">

                </div>
              </div>

            </div>
          </div>
          <div class="pt-4 flex items-center space-x-4">
              <inertia-link href="admin/dashboard" class="flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Kembali
              </inertia-link>
              <button type="submit" class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Create</button>
          </div>
             </form>

        </div>
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
    props: ['pesan'],

    data() {
        return {
            errors: [],
            form: {
                nama_klub: '',
                main: '',
                menang: '',
                kalah: '',
                seri: ''
            }
        }
    },
    computed: {
        total() {
            return (Number(this.form.menang * 3)) + Number(this.form.seri);
        }
    },
    methods: {
        submit() {
            this.$inertia.post('/admin/form/add', this.form)
        },
        checkValidation:
            function (e) {

            if (this.form.nama_klub && this.form.main && this.form.menang && this.form.kalah && this.form.seri) {
                  this.submit();
            }
            this.errors = [];

            if(this.form.nama_klub.length <= 2) {
                    this.errors.push('Jumlah karakter harus lebih dari 2');
            }
            if(!this.form.nama_klub) {
               this.errors.push('Nama klub harus di isi !!');
            }

            if(!this.form.main) {
                this.errors.push('Jumlah main harus di isi !!');
            }
            if(!this.form.menang) {
                this.errors.push('Jumlah kemenangan harus di isi !!');
            }
            if(!this.form.kalah) {
                this.errors.push('Jumlah kekalahan harus di isi !!');
            }
            if(!this.form.seri) {
                this.errors.push('Jumlah seri harus di isi !!');
            }
            e.preventDefault();

        },


    },
}
</script>
