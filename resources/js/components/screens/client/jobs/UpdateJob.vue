<template>
    <div>
        <vue-progress-bar></vue-progress-bar>
        <div class="wrapper">
            <div class="flex flex-wrap px-4 py-4">
                <div class="page__title w-1/2">
                </div>
                <div class="page__title w-1/2">
                    <nav class="p-2 rounded font-sans w-full ">
                        <ol class="list-reset flex justify-end">
                            <li><router-link to="/client/dashboard" class="text-blue-600 text-base">Dashboard</router-link></li>
                            <li><span class="mx-2 text-gray-900 text-base">/</span></li>
                            <li><router-link to="/client/job-openings" class="text-blue-600 text-base">Job Openings</router-link></li>
                            <li><span class="mx-2 text-gray-900 text-base">/</span></li>
                            <li><span class="text-gray-900 text-base">Edit Job: PHP Developer</span></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <ValidationObserver ref="observer">
                <form name="job-openings-create" slot-scope="{validate }" @submit.prevent="validate().then(onSubmit)">
                    <div class="w-full px-4 py-4">
                        <div class="card">
                            <div class="card__body">
                                <p class="card__title">Job Informations: PHP Developer</p>
                                <p class="text-sm text-gray-900">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <div class="form mt-5">
                                    <div class="form-group">
                                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                            <label class="label" for="grid-title">
                                              Post Title <span class="text-red-900">*</span>
                                            </label>
                                            <ValidationProvider name="post title" rules="required" v-slot="{ errors }">
                                                <input class="input" id="grid-title" type="text" placeholder="Accountant" v-model="job.title">
                                                <span class="text-red-600 text-xs">{{ errors[0] }}</span>
                                            </ValidationProvider>
                                        </div>
                                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                            <label class="label" for="grid-title">
                                              Status <span class="text-red-900">*</span>
                                            </label>
                                            <input class="input" id="grid-title" type="text" placeholder="Status" v-model="job.status" disabled>
                                        </div>
                                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                            <label class="label" for="grid-title">
                                              Company <span class="text-red-900">*</span>
                                            </label>
                                            <input class="input" id="grid-title" type="text" placeholder="Status" v-model="job.client" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-4 py-4">
                        <div class="card">
                            <div class="card__body">
                                <p class="card__title">Job Descriptions</p>
                                <p class="text-sm text-gray-900">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <div class="form mt-5">
                                    <div class="form-group">
                                        <div class="w-full px-3 mb-6 md:mb-0">
                                            <label class="label" for="grid-descriptions">
                                              Descriptions <span class="text-red-900">*</span>
                                            </label>
                                            <ValidationProvider name="description" rules="required" v-slot="{ errors }">
                                                <wysiwyg v-model="descriptions" name="description" required />
                                                <span class="text-red-600 text-xs">{{ errors[0] }}</span>
                                            </ValidationProvider>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-4 py-4 mb-5">
                        <div class="card">
                            <div class="card__body">
                                <p class="card__title">Job Requirements</p>
                                <p class="text-sm text-gray-900">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <div class="form mt-5">
                                    <div class="form-group">
                                        <div class="w-full px-3 mb-6 md:mb-0">
                                            <label class="label" for="grid-requirements">
                                              Requirements <span class="text-red-900">*</span>
                                            </label>
                                            <ValidationProvider name="requirements" rules="required" v-slot="{ errors }">
                                                <wysiwyg v-model="requirements" required />
                                                <span class="text-red-600 text-xs">{{ errors[0] }}</span>
                                            </ValidationProvider>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-4 py-4 mb-5 text-right">
                        <a href="/client/job-opening" class="btn btn-light inline-block"><i class="fa fas fa-angle-left"></i> Cancel</a>
                        <button type="submit" class="btn btn-success"><i class="fa fas fa-save"></i> Save</button>
                    </div>
                </form>
            </ValidationObserver>
        </div>
    </div>
</template>
<script>
import { ValidationProvider, ValidationObserver } from 'vee-validate/dist/vee-validate.full';

export default {
  components: {
    ValidationObserver,
    ValidationProvider
  },
  created() {
    this.$Progress.start();
    this.$Progress.finish();
  },
  data() {
    return {
      descriptions: '',
      requirements: '',
      job: {
        title: '',
        status: 'Waiting for Approval',
        no_position: 0,
        target_date: '201-01-01',
        state: '',
        country: '',
        client: 'BeeStripe LLC',
        job_type: '',
        work_experience: '',
        industry: '',
        salary: ''
      }
    }
  },
  methods: {
    async  onSubmit () {
      const isValid = await this.$refs.observer.validate();
      if (!isValid) {
        alert('failed');
      } else {
        alert('success');
      }
    },
  },
}
</script>