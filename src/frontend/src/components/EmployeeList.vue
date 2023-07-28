<template>
  <ul role="list" class="divide-y divide-gray-100">
    <li
      v-for="employee in employees"
      :key="employee.id"
      class="flex items-center justify-between gap-x-6 py-5"
    >
      <div class="min-w-0">
        <div class="flex items-start gap-x-3">
          <p class="text-sm font-semibold leading-6 text-gray-900">{{ employee.employee_name }}</p>
          <p
            class="'rounded-md whitespace-nowrap mt-0.5 px-1.5 py-0.5 text-xs font-medium ring-1 ring-inset'"
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
</template>

<script>
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { EllipsisVerticalIcon } from '@heroicons/vue/20/solid'

export default {
  name: 'EmployeeList',
  props: {
    employees: {
      type: Array,
      required: true
    }
  },
  components: {
    TailwindMenu: Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    EllipsisVerticalIcon
  }
}
</script>
