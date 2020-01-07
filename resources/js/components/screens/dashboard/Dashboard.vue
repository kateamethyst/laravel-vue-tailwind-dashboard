<template>
    <div>
      <vue-progress-bar></vue-progress-bar>
        <div class="wrapper p-8">
            <div class="page__title px-4">
                <p class="text-lg font-semibold text-gray-900">Dashboard</p>
            </div>
        </div>
        <div class="wrapper">
            <div class="flex flex-wrap">
                <div class="w-full xl:w-1/2 lg:w-1/2 md:w-1/2 sm:w-full px-4 py-4">
                    <div class="card">
                        <div class="card__body">
                            <p class="card__title">Applications</p>
                            <p class="text-sm text-gray-900">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <div class="overflow-x-scroll xl:overflow-x-hidden lg:overflow-x-hidden">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="w-1/8">#</th>
                                            <th class="w-1/2">Job Name</th>
                                            <th class="w-1/4">Applied Date</th>
                                            <th class="w-1/8">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>67756734</td>
                                            <td>Software Engineer</td>
                                            <td>09 Feb, 2019 8:00 AM</td>
                                            <td>Hired</td>
                                        </tr>
                                        <tr>
                                            <td>67756734</td>
                                            <td>Software Engineer</td>
                                            <td>09 Feb, 2019 8:00 AM</td>
                                            <td>Hired</td>
                                        </tr>
                                        <tr>
                                            <td>67756734</td>
                                            <td>Software Engineer</td>
                                            <td>09 Feb, 2019 8:00 AM</td>
                                            <td>Hired</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full xl:w-1/2 lg:w-1/2 md:w-1/2 sm:w-full px-4 py-4">
                    <div class="card">
                        <div class="card__body">
                            <p class="card__title">Interviews</p>
                            <p class="text-sm text-gray-900">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <div class="overflow-x-scroll xl:overflow-x-hidden lg:overflow-x-hidden">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="w-1/8">#</th>
                                            <th class="w-1/2">Job Name</th>
                                            <th class="w-1/4">Schedule</th>
                                            <th class="w-1/8">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>67756734</td>
                                            <td>Software Engineer</td>
                                            <td>09 Feb, 2019 8:00 AM</td>
                                            <td>Pending</td>
                                        </tr>
                                        <tr>
                                            <td>67756734</td>
                                            <td>Software Engineer</td>
                                            <td>09 Feb, 2019 8:00 AM</td>
                                            <td>Pending</td>
                                        </tr>
                                        <tr>
                                            <td>67756734</td>
                                            <td>Software Engineer</td>
                                            <td>09 Feb, 2019 8:00 AM</td>
                                            <td>Pending</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full xl:w-1/2 lg:w-1/2 md:w-1/2 sm:w-full px-4 py-4">
                    <div class="card">
                        <div class="card__body">
                            <p class="card__title">New Posted Jobs</p>
                            <p class="text-sm text-gray-900">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <div class="overflow-x-scroll xl:overflow-x-hidden lg:overflow-x-hidden">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="w-full">Job Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span class="text-left inline-block">Software Engineer</span> <span class="w-1/2 inline-block text-xs text-right">1 hour ago</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-left inline-block">Software Engineer</span> <span class="w-1/2 inline-block text-xs text-right">1 hour ago</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-left inline-block">Software Engineer</span> <span class="w-1/2 inline-block text-xs text-right">1 hour ago</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
  created() {
    this.fetchUsers();
  },
  methods: {
    fetchUsers() {
      this.$Progress.start()
      let vm = this;
      axios({
        method: 'get',
        url: 'https://jsonplaceholder.typicode.com/photos',
      })
      .then(function (response) {
          vm.$Progress.finish()
      })
      .catch(function (error) {
        vm.$Progress.fail()
      });
    }
  },
}
</script>