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
                            <li><router-link to="/job-openings" class="text-blue-600 text-base">Candidates</router-link></li>
                            <li><span class="mx-2 text-gray-900 text-base">/</span></li>
                            <li><span class="text-gray-900 text-base">View</span></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="w-full px-4 py-4">
                <button class="btn btn-info"><i class="fa fas fa-download"></i> Resume</button>
                <button class="btn btn-primary"><i class="fa fas fa-download"></i> Cover Letter</button>
            </div>
        </div>
        <div class="wrapper">
            <form>
                <div class="w-full px-4 py-4">
                    <div class="card">
                        <div class="card__body">
                            <p class="card__title">Candidate Informations</p>
                            <p class="text-sm text-gray-900">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <div class="form mt-5">
                                <div class="form-group">
                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="label" for="grid-title">
                                          First Name 
                                        </label>
                                        <input class="input" id="grid-title" type="text" placeholder="Jane" disabled>
                                    </div>
                                    <div class="w-full md:w-1/3 px-3">
                                        <label class="label" for="grid-last-name">
                                          Last Name 
                                        </label>
                                        <input class="input" id="grid-last-name" type="text" placeholder="Doe" disabled>
                                    </div>
                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="label" for="grid-target-date">
                                          Current Job Title 
                                        </label>
                                        <input class="input" id="grid-target-date" type="text" placeholder="Accountant" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="label" for="grid-title">
                                          Email Address 
                                        </label>
                                        <input class="input" id="grid-title" type="email" placeholder="sample@email.com" disabled>
                                    </div>
                                    <div class="w-full md:w-1/3 px-3">
                                        <label class="label" for="grid-last-name">
                                          Phone Number 
                                        </label>
                                        <input class="input" id="grid-last-name" type="text" placeholder="" disabled>
                                    </div>
                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="label" for="grid-target-date">
                                          Mobile Number
                                        </label>
                                        <input class="input" id="grid-target-date" type="text" placeholder="+63912356789" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="w-full md:w-1/3 px-3">
                                        <label class="label" for="grid-client">
                                          Country 
                                        </label>
                                        <select class="input" id="grid-client" disabled>
                                            <option>Philippines</option>
                                            <option>Lesshall</option>
                                        </select>
                                    </div>
                                    <div class="w-full md:w-1/3 px-3">
                                        <label class="label" for="grid-job-type">
                                          Province 
                                        </label>
                                        <select class="input" id="grid-job-type" disabled>
                                            <option>Metro Manila</option>
                                            <option>Part Time</option>
                                        </select>
                                    </div>
                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="label" for="grid-target-date">
                                          Skills
                                        </label>
                                        <input class="input" id="grid-target-date" type="text" placeholder="" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="wrapper px-4">
            <div class="flex -mx-4">
                <div class="w-1/2 pl-8 pr-4">
                    <div class="card">
                        <div class="card__body">
                            <p class="card__title">Experience</p>
                            <p class="text-sm text-gray-900">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <ul class="list-group">
                                <li class="list-item">
                                    <p class="list-title">Accountant</p>
                                    <p class="list-sub-content">Lorem ipsum dolor </p>
                                    <p class="list-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </li>
                                <li class="list-item">
                                    <p class="list-title">Accountant</p>
                                    <p class="list-sub-content">Lorem ipsum dolor </p>
                                    <p class="list-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </li>
                                <li class="list-item">
                                    <p class="list-title">Accountant</p>
                                    <p class="list-sub-content">Lorem ipsum dolor </p>
                                    <p class="list-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </li>
                                <li class="list-item">
                                    <p class="list-title">Accountant</p>
                                    <p class="list-sub-content">Lorem ipsum dolor </p>
                                    <p class="list-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="w-1/2 pr-8 pl-4">
                    <div class="card">
                        <div class="card__body">
                            <p class="card__title">Applied Jobs</p>
                            <p class="text-sm text-gray-900">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <ul class="list-group">
                                <li class="list-item">
                                    <p class="list-title">Accountant</p>
                                    <p class="list-sub-content">Applied Date : September 20, 2019</p>
                                    <p class="list-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </li>
                                <li class="list-item">
                                    <p class="list-title">Accountant</p>
                                    <p class="list-sub-content">Applied Date : September 20, 2019</p>
                                    <p class="list-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </li>
                                <li class="list-item">
                                    <p class="list-title">Accountant</p>
                                    <p class="list-sub-content">Applied Date : September 20, 2019</p>
                                    <p class="list-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </li>
                                <li class="list-item">
                                    <p class="list-title">Accountant</p>
                                    <p class="list-sub-content">Applied Date : September 20, 2019</p>
                                    <p class="list-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import auth from '../../../../auth.js';
export default {
  created() {
    this.$Progress.start();
    this.fecthApplicant();
    this.$Progress.finish();
  },
  data() {
    return {
      skills: '',
      candidate_id: window.location.pathname.split('/')[2],
      token: auth.token()
    }
  },
  methods: {
    fecthApplicant() {
      axios({
        method: 'GET',
        url: `/api/applicants/${this.candidate_id}`,
        headers: {
          Authorization: `Bearer ${this.token}`
        }
      })
      .then( response => {
        console.log('applicant', response);
      })
      .catch( error => {
        console.log('error', error);
      })
    }
  },
}
</script>