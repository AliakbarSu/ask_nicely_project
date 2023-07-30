import { describe, it, expect, vitest } from 'vitest'

import { mount } from '@vue/test-utils'
import EmployeeList from '../EmployeeList.vue'
import type { Employee } from '@/App.vue'

window.ResizeObserver =
  window.ResizeObserver ||
  vitest.fn().mockImplementation(() => ({
    disconnect: vitest.fn(),
    observe: vitest.fn(),
    unobserve: vitest.fn()
  }))

describe('EmployeeList', () => {
  const employees: Employee[] = [
    {
      id: 1,
      company_name: 'Company',
      employee_name: 'John Doe',
      employee_email: 'JohnDoe@email.com',
      salary: 1000
    }
  ]
  it('renders properly', () => {
    const wrapper = mount(EmployeeList, { props: { employees } })
    expect(wrapper.text()).toContain('John Doe')
  })

  it('should open edit modal when edit button is clicked', async () => {
    const wrapper = mount(EmployeeList, { props: { employees } })
    const editMenu = wrapper.find('#headlessui-menu-button-3')
    await editMenu.trigger('click')
    const editButton = wrapper.find('#headlessui-menu-items-4')
    expect(wrapper.vm.$data.modalOpen).toBeFalsy()
    await editButton.find('p').trigger('click')
    expect(wrapper.vm.$data.modalOpen).toBeTruthy()
  })
})
