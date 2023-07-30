<template>
  <div>
    <h2 className="text-lg font-semibold">Employees</h2>

    <ul role="list" class="divide-y divide-gray-100 p-2">
      <UpdateEmailModal
        @close="closeModal"
        @editEmail="onUpdateEmail"
        :open="modalOpen"
        :email="email"
      />
      <li v-if="employees.length === 0" class="text-sm">No data available</li>
      <li
        v-for="employee in employees"
        :key="employee.id"
        class="flex items-center justify-between gap-x-6 py-5"
      >
        <div class="min-w-0">
          <div class="flex items-start gap-x-3">
            <p class="text-sm font-semibold leading-6 text-gray-900">
              {{ employee.employee_name }}
            </p>
            <p
              class="'rounded-md whitespace-nowrap mt-0.5 px-1.5 py-0.5 text-xs font-medium bg-green-100 text-green-500'"
            >
              {{ employee.employee_email }}
            </p>
          </div>
        </div>
        <div class="flex flex-none items-center gap-x-4">
          <TailwindMenu as="div" class="relative flex-none">
            <MenuButton class="-m-2.5 block p-2.5 text-gray-500 hover:text-gray-900">
              <span class="sr-only">Open options</span>
              <EllipsisVerticalIcon class="h-5 w-5" aria-hidden="true" />
            </MenuButton>
            <transition
              enter-active-class="transition ease-out duration-100"
              enter-from-class="transform opacity-0 scale-95"
              enter-to-class="transform opacity-100 scale-100"
              leave-active-class="transition ease-in duration-75"
              leave-from-class="transform opacity-100 scale-100"
              leave-to-class="transform opacity-0 scale-95"
            >
              <MenuItems
                class="absolute right-0 z-10 mt-2 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none"
              >
                <MenuItem v-slot="{ active }">
                  <p
                    :class="[
                      active ? 'bg-gray-50' : '',
                      'block px-3 py-1 text-sm leading-6 text-gray-900'
                    ]"
                    @click="editEmail(employee.id)"
                  >
                    Update email<span class="sr-only">, {{ employee.employee_name }}</span>
                  </p>
                </MenuItem>
              </MenuItems>
            </transition>
          </TailwindMenu>
        </div>
      </li>
    </ul>
  </div>
</template>

<script lang="ts">
import type { Employee } from '@/App.vue'
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { EllipsisVerticalIcon } from '@heroicons/vue/20/solid'
import UpdateEmailModal from './UpdateEmailModal.vue'
import axios from 'axios'

export default {
  name: 'EmployeeList',
  data() {
    return {
      modalOpen: false,
      userId: 0,
      email: ''
    }
  },
  props: {
    employees: {
      type: Array<Employee>,
      required: true
    }
  },
  methods: {
    openModal() {
      this.modalOpen = true
    },
    closeModal() {
      this.modalOpen = false
    },
    editEmail(id: number) {
      this.userId = id
      this.email = this.employees.find((employee) => employee.id === id)?.employee_email || ''
      this.openModal()
    },
    onUpdateEmail(email: string) {
      this.closeModal()
      axios.put('http://127.0.0.1/api/update_email.php', {
        user_id: this.userId,
        email: email
      })
    }
  },
  components: {
    TailwindMenu: Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    EllipsisVerticalIcon,
    UpdateEmailModal
  }
}
</script>
