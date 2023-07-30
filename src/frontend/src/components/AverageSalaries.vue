<template>
  <div>
    <h2 className="text-lg font-semibold">Average Salaries</h2>
    <ul role="list" class="divide-y divide-gray-100 p-2">
      <li v-if="averageSalaries.length === 0" class="text-sm">No data available</li>
      <li
        v-for="averageSalary in averageSalaries"
        :key="averageSalary.average_salary"
        class="flex items-center justify-between gap-x-6 py-5"
      >
        <div class="min-w-0">
          <div class="flex items-start gap-x-3">
            <p class="text-sm font-semibold leading-6 text-gray-900">
              {{ averageSalary.company_name }}
            </p>
            <p
              class="'rounded-md whitespace-nowrap mt-0.5 px-1.5 py-0.5 text-xs font-medium bg-green-100 text-green-800'"
            >
              ${{ averageSalary.average_salary }}
            </p>
          </div>
        </div>
      </li>
    </ul>
  </div>
</template>

<script lang="ts">
import axios from 'axios'

export type AverageSalary = {
  company_name: string
  average_salary: number
}
export default {
  name: 'AverageSalaries',
  created() {
    this.fetchAverageSalaries()
  },
  data() {
    return {
      averageSalaries: [] as AverageSalary[]
    }
  },
  methods: {
    async fetchAverageSalaries() {
      const result = await axios.get('http://127.0.0.1/api/average_salary.php')
      this.averageSalaries = result.data
    }
  }
}
</script>
