import { describe, it, expect, vitest } from 'vitest'
import { mount } from '@vue/test-utils'
import Upload from '../Upload.vue'
import axios from 'axios'
vitest.mock('axios')

describe('Upload', () => {
  it('renders properly', () => {
    const wrapper = mount(Upload)
    expect(wrapper.text()).toContain('Upload CSV')
  })

  it('should submit the form', async () => {
    const axiosSpy = vitest.spyOn(axios, 'post')
    const wrapper = mount(Upload)
    const button = wrapper.find('form')
    await button.trigger('submit')
    expect(axiosSpy).toHaveBeenCalled()
  })
})
