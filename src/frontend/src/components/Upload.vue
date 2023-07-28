<template>
  <form @submit="onSubmit">
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Upload CSV</h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">
          The content inside the file will be uploaded and saved in the database.
        </p>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="col-span-full">
            <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900"
              >Company Employees</label
            >
            <div
              class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10"
            >
              <div class="text-center">
                <PhotoIcon class="mx-auto h-12 w-12 text-gray-300" aria-hidden="true" />
                <div class="mt-4 flex text-sm leading-6 text-gray-600">
                  <label
                    for="file"
                    class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500"
                  >
                    <span>Upload a file</span>
                    <input id="file" name="file" type="file" class="sr-only" />
                  </label>
                  <p class="pl-1">or drag and drop</p>
                </div>
                <p class="text-xs leading-5 text-gray-600">CSV</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <button
        :disabled="loading"
        type="submit"
        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
      >
        {{ loading ? 'Uploading...' : 'Upload' }}
      </button>
    </div>
  </form>
</template>

<script lang="ts">
import { PhotoIcon } from '@heroicons/vue/24/solid'
import axios from 'axios'
export default {
  data() {
    return {
      loading: false
    }
  },
  components: {
    PhotoIcon
  },
  methods: {
    async onSubmit(e: Event) {
      e.preventDefault()
      this.loading = true
      const formData = new FormData(e.target as HTMLFormElement)
      await axios.post('http://127.0.0.1/api/upload.php', formData)
      this.loading = false
    }
  }
}
</script>
