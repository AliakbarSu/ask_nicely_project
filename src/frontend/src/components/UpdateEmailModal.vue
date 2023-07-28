<template>
  <TransitionRoot as="template" :show="open">
    <DialogTailwind as="div" class="relative z-10" @close="close">
      <TransitionChild
        as="template"
        enter="ease-out duration-300"
        enter-from="opacity-0"
        enter-to="opacity-100"
        leave="ease-in duration-200"
        leave-from="opacity-100"
        leave-to="opacity-0"
      >
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
      </TransitionChild>

      <div class="fixed inset-0 z-10 overflow-y-auto">
        <div
          class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0"
        >
          <TransitionChild
            as="template"
            enter="ease-out duration-300"
            enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            enter-to="opacity-100 translate-y-0 sm:scale-100"
            leave="ease-in duration-200"
            leave-from="opacity-100 translate-y-0 sm:scale-100"
            leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          >
            <DialogPanel
              class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6"
            >
              <div>
                <form @submit.prevent="editEmail" id="user_email">
                  <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900"
                      >Email</label
                    >
                    <div class="mt-2">
                      <input
                        type="email"
                        name="email"
                        id="email"
                        v-model="newEmail"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        :placeholder="email"
                      />
                    </div>
                  </div>
                </form>
              </div>
              <div class="mt-5 sm:mt-6">
                <button
                  form="user_email"
                  type="submit"
                  class="inline-flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                >
                  Update Email
                </button>
              </div>
            </DialogPanel>
          </TransitionChild>
        </div>
      </div>
    </DialogTailwind>
  </TransitionRoot>
</template>

<script lang="ts">
import { Dialog, DialogPanel, TransitionChild, TransitionRoot } from '@headlessui/vue'

export default {
  props: {
    email: {
      type: String
    },
    open: {
      type: Boolean
    }
  },
  data() {
    return {
      newEmail: ''
    }
  },
  methods: {
    editEmail() {
      this.$emit('editEmail', this.newEmail)
    },
    close() {
      this.$emit('close')
    }
  },
  components: {
    DialogTailwind: Dialog,
    DialogPanel,
    TransitionChild,
    TransitionRoot
  }
}
</script>
