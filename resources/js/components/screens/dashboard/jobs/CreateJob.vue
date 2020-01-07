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
                            <li><router-link to="/dashboard" class="text-blue-600 text-base">Dashboard</router-link></li>
                            <li><span class="mx-2 text-gray-900 text-base">/</span></li>
                            <li><router-link to="/job-openings" class="text-blue-600 text-base">Job Openings</router-link></li>
                            <li><span class="mx-2 text-gray-900 text-base">/</span></li>
                            <li><span class="text-gray-900 text-base">Create Job</span></li>
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
                                <p class="card__title">Job Informations</p>
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
                                        <div class="w-full md:w-1/3 px-3">
                                            <label class="label" for="grid-last-name">
                                              Number of Positions <span class="text-red-900">*</span>
                                            </label>
                                            <ValidationProvider name="number of position" rules="required" v-slot="{ errors }">
                                                <input class="input" id="grid-last-name" type="number" placeholder="0" v-model="job.no_position">
                                                <span class="text-red-600 text-xs">{{ errors[0] }}</span>
                                            </ValidationProvider>
                                        </div>
                                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                            <label class="label" for="grid-target-date">
                                              Target Date <span class="text-red-900">*</span>
                                            </label>
                                            <ValidationProvider name="target date" rules="required" v-slot="{ errors }">
                                                <input class="input" id="grid-target-date" type="date" v-model="job.target_date">
                                                <span class="text-red-600 text-xs">{{ errors[0] }}</span>
                                            </ValidationProvider>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="w-full md:w-1/3 px-3">
                                            <label class="label" for="grid-status">
                                              Status <span class="text-red-900">*</span>
                                            </label>
                                            <ValidationProvider name="status" rules="required" v-slot="{ errors }">
                                                <select class="input" v-model="job.status">
                                                    <option>Approved</option>
                                                    <option>Declined</option>
                                                </select>
                                                <span class="text-red-600 text-xs">{{ errors[0] }}</span>
                                            </ValidationProvider>
                                        </div>
                                        <div class="w-full md:w-1/3 px-3">
                                            <label class="label" for="grid-state">
                                              State <span class="text-red-900">*</span>
                                            </label>
                                            <ValidationProvider name="state" rules="required" v-slot="{ errors }">
                                                <input class="input" id="grid-state" placeholder="Metro Manila" type="text" v-model="job.state">
                                                <span class="text-red-600 text-xs">{{ errors[0] }}</span>
                                            </ValidationProvider>
                                        </div>
                                        <div class="w-full md:w-1/3 px-3">
                                            <label class="label" for="grid-country">
                                              Country <span class="text-red-900">*</span>
                                            </label>
                                            <ValidationProvider name="country" rules="required" v-slot="{ errors }">
                                                <input class="input" id="grid-country" placeholder="Philippines" type="text" v-model="job.country">
                                                <span class="text-red-600 text-xs">{{ errors[0] }}</span>
                                            </ValidationProvider>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="w-full md:w-1/3 px-3">
                                            <label class="label" for="grid-client">
                                              Client <span class="text-red-900">*</span>
                                            </label>
                                            <ValidationProvider name="client" rules="required" v-slot="{ errors }">
                                                <select class="input" id="grid-client" v-model="job.client">
                                                    <option>Vitallogistics</option>
                                                    <option>Lesshall</option>
                                                </select>
                                                <span class="text-red-600 text-xs">{{ errors[0] }}</span>
                                            </ValidationProvider>
                                        </div>
                                        <div class="w-full md:w-1/3 px-3">
                                            <label class="label" for="grid-job-type">
                                              Job Type <span class="text-red-900">*</span>
                                            </label>
                                            <ValidationProvider name="job type" rules="required" v-slot="{ errors }">
                                                <select class="input" id="grid-job-type" v-model="job.job_type">
                                                    <option>Full Time</option>
                                                    <option>Part Time</option>
                                                </select>
                                                <span class="text-red-600 text-xs">{{ errors[0] }}</span>
                                            </ValidationProvider>
                                        </div>
                                        <div class="w-full md:w-1/3 px-3">
                                            <label class="label" for="grid-work-exp">
                                              Work Experience <span class="text-red-900">*</span>
                                            </label>
                                            <ValidationProvider name="work experience" rules="required" v-slot="{ errors }">
                                                <select class="input" id="grid-work-exp" v-model="job.work_experience">
                                                    <option>Fresh Graduate</option>
                                                    <option>1 - 3 years</option>
                                                </select>
                                                <span class="text-red-600 text-xs">{{ errors[0] }}</span>
                                            </ValidationProvider>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="w-full md:w-1/3 px-3">
                                            <label class="label" for="grid-industry">
                                              Industry <span class="text-red-900">*</span>
                                            </label>
                                            <ValidationProvider name="industry" rules="required" v-slot="{ errors }">
                                                <select class="input" id="grid-industry" v-model="job.industry">
                                                    <option>Vitallogistics</option>
                                                    <option>Lesshall</option>
                                                </select>
                                                <span class="text-red-600 text-xs">{{ errors[0] }}</span>
                                            </ValidationProvider>
                                        </div>
                                        <div class="w-full md:w-1/3 px-3">
                                            <label class="label" for="grid-salary">
                                              Salary <span class="text-red-900">*</span>
                                            </label>
                                            <ValidationProvider name="salary" rules="required" v-slot="{ errors }">
                                                <input class="input" id="grid-salary" type="text" placeholder="10, 000.00" v-model="job.salary">
                                                <span class="text-red-600 text-xs">{{ errors[0] }}</span>
                                            </ValidationProvider>
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
                        <button class="btn btn-light"><i class="fa fas fa-angle-left"></i> Cancel</button>
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
        status: '',
        no_position: 0,
        target_date: '201-01-01',
        state: '',
        country: '',
        client: '',
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