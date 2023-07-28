<script lang="ts">
import EmployeeList from './components/EmployeeList.vue'
import Upload from './components/Upload.vue'
import axios from 'axios'

export interface Employee {
  employee_id: number
  employee_name: string
  employee_email: string
  employee_photo: string
}

export default {
  name: 'App',
  created() {
    this.getEmployees()
  },
  data() {
    return {
      employees: [] as Employee[]
    }
  },
  components: {
    EmployeeList,
    Upload
  },
  methods: {
    async getEmployees() {
      const response = await axios.get('http://127.0.0.1/api/employees.php')
      this.employees = response.data
    }
  }
}
</script>

<template>
  <div className="w-full">
    <Upload />
    <EmployeeList :employees="employees" />
  </div>
</template>

<style scoped>
header {
  line-height: 1.5;
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}

@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  .logo {
    margin: 0 2rem 0 0;
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }
}
</style>
