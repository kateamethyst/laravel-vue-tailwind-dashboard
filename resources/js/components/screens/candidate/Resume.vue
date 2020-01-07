<template>
    <div>
        <vue-progress-bar></vue-progress-bar>
        <div class="wrapper p-8">
            <div class="page__title px-4">
                <p class="text-lg font-semibold text-gray-900">Profile</p>
            </div>
        </div>
        <div class="wrapper px-8">
            <div class="card mx-4 card-bg-blue-600">
                <div class="card__body p-8 m-4">
                    <div class="flex flex-wrap">
                        <div class="xl:w-4/5 lg:w-4/5 w-full">
                            <div class="flex flex-wrap">
                                <div class="xl:w-1/5 lg:w-1/5 md:w-1/5 w-full"><img class="rounded-full border-8 border-white" src="https://placekitten.com/130/130"></div>
                                <div class="xl:w-4/5 lg:w-4/5 md:w-4/5 w-full">
                                    <p class="font-semibold text-white text-lg">{{ `${candidate.first_name} ${candidate.last_name}`}}</p>
                                    <p class="text-white text-sm text-blue-100">{{ candidate.resume.current_job_title }}</p>
                                    <p class="text-white text-sm text-blue-100">{{ candidate.resume.current_employer }}</p>
                                    <ul class="pt-8">
                                        <li class="inline-block pr-4">
                                            <p class="text-white font-semibold text-sm">1,000</p>
                                            <p class="text-blue-100 text-sm">Number of Applied Jobs</p>
                                        </li>
                                        <li class="inline-block">
                                            <p class="text-white font-semibold text-sm">568</p>
                                            <p class="text-blue-100 text-sm">Number of Interview</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="xl:w-1/5 lg:w-1/5 w-full xl:text-right lg:text-right xl:mt-0 lg:mt-0 mt-5">
                            <button class="btn btn-light" @click="modal.add = true">Edit Profile</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper p-8">
            <div class="flex flex-wrap">
                <div class="xl:w-2/6 lg:w-2/6 w-full px-4 mb-5">
                    <div class="card mb-5">
                        <div class="card__body">
                            <p class="card__title">My Information</p>
                            <p class="text-sm text-gray-900">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td><span class="text-left text-sm font-semibold text-gray-900 inline-block">Full Name</span> </td>
                                        <td><span class="w-1/2 inline-block text-sm">{{ `${candidate.first_name} ${candidate.last_name}`}}</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="text-left text-sm font-semibold text-gray-900 inline-block">Email</span></td>
                                        <td><span class="w-1/2 inline-block text-sm">{{ candidate.email }}</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="text-left text-sm font-semibold text-gray-900 inline-block">Phone</span></td>
                                        <td><span class="w-1/2 inline-block text-sm">(028) 3456578</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="text-left text-sm font-semibold text-gray-900 inline-block">Skype Id</span></td>
                                        <td><span class="w-1/2 inline-block text-sm">janedoe</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card mb-5 card-bg-blue-600">
                        <div class="card__body">
                            <div class="py-4">
                                <p class="text-white inline-block w-1/2 font-semibold">Get Hired</p>
                                <a href="" class="btn btn-primary inline-block float-right">Apply Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-5">
                        <div class="card__body">
                            <p class="card__title w-100">
                                <span class="inline-block">Skills</span>
                                <a @click="modal.skills.edit = !modal.skills.edit" title="Update Skills" class="cursor-pointer inline-block text-right float-right ">
                                    <i class="text-blue fa fa-pencil"></i>
                                </a>
                            </p>
                            <div v-if="!modal.skills.edit">
                                <p class="text-sm text-gray-900 mb-5">{{ candidate.resume.skill_set }}</p>
                            </div>
                            <div v-else>
                                <textarea v-model="candidate.resume.skill_set" class="input resize-none h-24" placeholder="Type here...">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</textarea>
                                <button @click="saveSkills" class="btn btn-dark block">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="xl:w-4/6 lg:w-4/6 w-full px-4 mb-5">
                    <div class="flex flex-wrap mb-5">
                        <div class="w-1/2 px-2">
                            <div class="card">
                                <div class="card__body">
                                    <p class="card__title w-100">
                                        <span class="inline-block">Resume</span>
                                        <a @click="modal.resume.edit = !modal.resume.edit" title="Update Resume" class="cursor-pointer inline-block text-right float-right ">
                                            <i class="text-blue fa fa-pencil"></i>
                                        </a>
                                    </p>
                                    <div v-if="!modal.resume.edit">
                                        <p class="text-sm text-gray-900 mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                        <button class="btn btn-success block">Download Resume</button>
                                    </div>
                                    <div v-else>
                                        <p class="text-sm text-gray-900 mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                        <input type="file" class="input" ref="resume" accept="application/pdf" @change="handleResumeUpload">
                                        <button v-if="button.resume.display == true" :disabled="button.resume.disabled" @click="uploadResume" class="btn btn-dark block" >{{button.resume.text}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-1/2 px-2">
                            <div class="card">
                                <div class="card__body">
                                    <p class="card__title w-100">
                                        <span class="inline-block">Cover Letter</span>
                                        <a @click="modal.coverletter.edit = !modal.coverletter.edit" title="Update Cover Letter" class="cursor-pointer inline-block text-right float-right ">
                                            <i class="text-blue fa fa-pencil"></i>
                                        </a>
                                    </p>
                                    <div v-if="!modal.coverletter.edit">
                                        <p class="text-sm text-gray-900 mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                        <button class="btn btn-success block">Download Cover Letter</button>
                                    </div>
                                    <div v-else>
                                        <p class="text-sm text-gray-900 mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                        <input type="file" class="input" ref="coverletter" accept="application/pdf" @change="handleCoverLetterUpload">
                                        <button v-if="button.coverletter.display == true" :disabled="button.coverletter.disabled" @click="uploadCoverLetter" class="btn btn-dark block" >{{button.coverletter.text}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-5">
                        <div class="card__body">
                            <p class="card__title w-100">
                                <span class="inline-block">Experience</span>
                                <a @click="modal.experience.add = !modal.experience.add" title="Add New Experience" class="cursor-pointer inline-block text-right float-right ">
                                    <i class="text-blue fa fa-plus"></i>
                                </a>
                            </p>
                            <p class="text-sm text-gray-900">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <ul v-if="!modal.experience.add" class="list-group">
                                <li class="list-item" v-for="(exp, index) in experiences">
                                    <p class="list-title">
                                        <span class="inline-block">{{ exp.position }} <span class="font-normal text-gray-900 normal-case"> | {{`${exp.from}  to ${exp.to}`}}</span> </span>
                                        <a @click="modal.experience.delete = !modal.experience.delete; modal.experience.delete_id = index;" title="Update Experience" class="cursor-pointer inline-block text-right float-right mx-2">
                                            <i class="text-base text-red-600 fa fa-trash"></i>
                                        </a>
                                        <a  @click="editExperience(exp, index)" title="Delete Experience" class="cursor-pointer inline-block text-right float-right ">
                                            <i class="text-base text-green-600 fa fa-pencil"></i>
                                        </a>
                                    </p>
                                    <p class="list-sub-content">{{ exp.company }}</p>
                                    <p class="list-content">{{exp.job_description}}</p>
                                </li>
                            </ul>
                            <div v-else>
                                <form class="form pt-8">
                                    <div class="form-group">
                                        <div class="w-full md:w-1/2 px-3">
                                            <label class="label" for="grid-start-time">
                                              Position <span class="text-red-600">*</span>
                                            </label>
                                            <input class="input" id="grid-start-time" v-model="experience.position" type="text" placeholder="Accounting">
                                        </div>
                                        <div class="w-full md:w-1/2 px-3">
                                          <label class="label" for="grid-to">
                                            Company <span class="text-red-600">*</span>
                                          </label>
                                          <input class="input" id="grid-to" v-model="experience.company" type="text" placeholder="Doe">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="w-full md:w-1/2 px-3">
                                          <label class="label" for="grid-password">
                                            From <span class="text-red-600">*</span>
                                          </label>
                                          <input class="input" v-model="experience.from" type="date">
                                        </div>
                                        <div class="w-full md:w-1/2 px-3">
                                          <label class="label" for="grid-password">
                                            To <span class="text-red-600">*</span>
                                          </label>
                                          <input class="input" v-model="experience.to" type="date">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="w-full px-3 mb-6 md:mb-0">
                                            <label class="label" for="grid-date" >
                                              Job <span class="text-red-600">*</span>
                                            </label>
                                            <textarea class="input resize-none h-24" v-model="experience.job_description" placeholder="Type here..."></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="w-full px-3 mb-6 md:mb-0 text-right">
                                            <button class="btn btn-light" type="button" @click="modal.experience.add = false">Cancel</button>
                                            <button class="btn btn-dark" type="button" @click="saveExperience">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <modal v-if="modal.add" @close="modal.add = false">
            <p slot="modal-title" class="modal-title">{{modal.title}}</p>
            <div slot="modal-body">
                <ValidationObserver ref="observer">
                    <form slot-scope="{validate }" @submit.prevent="validate().then(onSaveProfile)" class="form">
                        <div class="form-group">
                            <div class="w-full md:w-1/2 px-3">
                                <label class="label" for="grid-start-time">
                                  First Name <span class="text-red-600">*</span>
                                </label>
                                <ValidationProvider name="first name" rules="required" v-slot="{ errors }">
                                    <input class="input"  v-model="candidate.first_name" type="text" placeholder="Jane">
                                    <span class="text-red-600 text-xs">{{ errors[0] }}</span>
                                </ValidationProvider>
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                              <label class="label" for="grid-to">
                                Last Name <span class="text-red-600">*</span>
                              </label>
                                <ValidationProvider name="last name" rules="required" v-slot="{ errors }">
                                    <input class="input"  v-model="candidate.last_name" type="text" placeholder="Doe">
                                    <span class="text-red-600 text-xs">{{ errors[0] }}</span>
                                </ValidationProvider>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="w-full md:w-1/2 px-3">
                                <label class="label" for="grid-start-time">
                                  State <span class="text-red-600">*</span>
                                </label>
                                <ValidationProvider name="state" rules="required" v-slot="{ errors }">
                                    <input class="input"  v-model="candidate.resume.state" type="text" placeholder="Metro Manila">
                                    <span class="text-red-600 text-xs">{{ errors[0] }}</span>
                                </ValidationProvider>
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                              <label class="label" for="grid-to">
                                Country <span class="text-red-600">*</span>
                              </label>
                                <ValidationProvider name="last name" rules="required" v-slot="{ errors }">
                                    <input class="input"  v-model="candidate.resume.country" type="text" placeholder="Philippines">
                                    <span class="text-red-600 text-xs">{{ errors[0] }}</span>
                                </ValidationProvider>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="w-full md:w-1/2 px-3">
                                <label class="label" for="grid-start-time">
                                  Current Job
                                </label>
                                <input class="input" v-model="candidate.resume.current_job_title" type="text" placeholder="Accountant">
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                              <label class="label" for="grid-to">
                                Current Employer
                              </label>
                              <input class="input"  v-model="candidate.resume.current_employer" type="text" placeholder="Doe Company">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="w-full px-3 mb-6 md:mb-0">
                                <label class="label" for="grid-date" >
                                  Email Address <span class="text-red-600">*</span>
                                </label>
                                <ValidationProvider name="email" rules="required|email" v-slot="{ errors }">
                                    <input class="input"  v-model="candidate.email" type="email" placeholder="janedoe@email.com">
                                    <span class="text-red-600 text-xs">{{ errors[0] }}</span>
                                </ValidationProvider>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="w-full px-3">
                              <label class="label" for="grid-password">
                                Telephone 
                              </label>
                              <input class="input" v-model="candidate.resume.phone" type="text" placeholder="(02) 8 565 7464">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="w-full px-3">
                              <label class="label" for="grid-password">
                                Website 
                              </label>
                              <input class="input" v-model="candidate.resume.website" type="text" placeholder="www.sample.com">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="w-full px-3">
                              <label class="label" for="grid-password">
                                Mobile Number <span class="text-red-600">*</span>
                              </label>
                              <ValidationProvider name="mobile number" rules="required" v-slot="{ errors }">
                                  <input class="input" v-model="candidate.resume.mobile" type="text" placeholder="+639 890 9000">
                                  <span class="text-red-600 text-xs">{{ errors[0] }}</span>
                              </ValidationProvider>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="w-full px-3">
                              <label class="label" for="grid-password">
                                Skype Id <span class="text-red-600">*</span>
                              </label>
                              <ValidationProvider name="skype id" rules="required" v-slot="{ errors }">
                                  <input class="input" v-model="candidate.resume.skype" type="text" placeholder="janedoe29">
                                  <span class="text-red-600 text-xs">{{ errors[0] }}</span>
                              </ValidationProvider>
                            </div>
                        </div><div class="form-group">
                            <div class="w-full md:w-1/2 px-3">
                                <label class="label" for="grid-start-time">
                                  Current Salary
                                </label>
                                <input class="input" v-model="candidate.resume.current_salary" type="number" placeholder="0">
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                              <label class="label" for="grid-to">
                                Expected Salary
                              </label>
                              <input class="input" v-model="candidate.resume.expected_salary" type="number" placeholder="0">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="w-full px-3 text-right">
                                <button @click="modal.add = false" type="button" class="btn btn-light inline-block">Cancel</button>
                                <input type="submit" class="btn btn-success" :class="" :value="button.profile.text" :disabled="button.profile.loading">
                            </div>
                        </div>
                    </form>
                </ValidationObserver>
            </div>
        </modal>
        <modal v-if="modal.experience.delete" @close="modal.experience.delete = false">
            <p slot="modal-title" class="modal-title">Delete Experience</p>
            <div slot="modal-body">
              <p class="text-gray-900 text-sm">Are you sure you want to delete this experience?</p>
            </div>
            <div slot="modal-footer">
                <button class="btn btn-light" @click="modal.experience.delete = false; modal.experience.delete_id = null;">No</button>
                <button class="btn btn-danger" @click="deleteExperience">Yes</button>
            </div>
        </modal>
    </div>
</template>

<script>
import { ValidationProvider, ValidationObserver } from 'vee-validate/dist/vee-validate.full';
import Modal from '../../partials/Modal';
import auth from '../../../auth.js';

export default {
  components: {
    ValidationObserver,
    ValidationProvider,
    Modal
  },
  data() {
    return {
      headers: {
        Authorization: `Bearer ${auth.token()}`
      },
      resume: '',
      experiences: new Array(),
      experience: {
        from: '',
        to: '',
        job_description: '',
        position: '',
        company: ''
      },
      input: {
        resume: '',
        coverletter: '',
      },
      modal: {
        add: false,
        title: 'Update Information',
        resume: {
          edit: false
        },
        coverletter: {
          edit: false
        },
        skills: {
          edit: false
        },
        experience: {
          add: false,
          delete: false,
          action: 'add',
          id: null,
          delete_id: null
        }
      },
      button: {
        profile: {
          text: 'Save',
          loading: false
        },
        resume: {
          display: false,
          text: 'Upload Resume',
          disabled: false
        },
        coverletter: {
          display: false,
          text: 'Upload Cover Letter',
          disabled: false
        }
      },
      candidate: {
        first_name: '',
        last_name: '',
        email: '',
        avatar: '',
        resume: {
          phone : '',
          mobile : '',
          website : '',
          skype : '',
          state : '',
          country : '',
          current_employer : '',
          current_job_title : '',
          current_salary : 0,
          expected_salary : 0,
          educational_background : '',
          experience : new Array(),
          skill_set : '',
          resume_url : '',
          cover_letter_url : ''
        }
      }
    }
  },
  created() {
    let vm = this;
    this.$Progress.start();
    axios({
      method: 'GET',
      url: '/api/me?includes[]=resume',
      headers: vm.headers,
    })
    .then(response => {
      vm.candidate = response.data.data;
      if (response.data.data.resume) {
        vm.experiences = JSON.parse(response.data.data.resume.experience);
      } else {
        vm.candidate.resume = {
          phone : '',
          mobile : '',
          website : '',
          skype : '',
          state : '',
          country : '',
          current_employer : '',
          current_job_title : '',
          current_salary : 0,
          expected_salary : 0,
          educational_background : '',
          experience : new Array(),
          skill_set : '',
          resume_url : '',
          cover_letter_url : ''
        };
      }
      vm.$Progress.finish();
    })
    .catch( error => {
    });
  },
  methods: {
    async onSaveProfile () {
      this.$Progress.start();
      const isValid = await this.$refs.observer.validate();
      if (!isValid) {
        this.button.profile.text = 'Submit';
        this.button.profile.loading = false;
      } else {
        this.button.profile.text = 'Loading...';
        this.button.profile.loading = true;
        this.saveProfile();
      }
    },
    saveProfile() {
      let vm = this;
      axios({
        method: 'POST',
        url: '/api/candidate/resume',
        headers: vm.headers,
        data: {
          phone: vm.candidate.resume.phone,
          mobile: vm.candidate.resume.mobile,
          website: vm.candidate.resume.website,
          skype: vm.candidate.resume.skype,
          state: vm.candidate.resume.state,
          country: vm.candidate.resume.country,
          current_employer: vm.candidate.resume.current_employer,
          current_job_title: vm.candidate.resume.current_job_title,
          current_salary: vm.candidate.resume.current_salary,
          expected_salary: vm.candidate.resume.expected_salary,
        }
      })
      .then(response => {
        vm.button.profile.text = 'Save';
        vm.button.profile.loading = false;
        vm.modal.add = false;
        vm.$Progress.finish();
      })
      .catch(error => {
        vm.button.profile.text = 'Save';
        vm.button.profile.loading = false;
        vm.$Progress.finish();
      })
    },
    saveSkills() {
      this.$Progress.start();
      let vm = this;
      axios({
        method: 'POST',
        url: '/api/candidate/resume',
        headers: vm.headers,
        data: {
          skill_set: vm.candidate.resume.skill_set,
        }
      })
      .then(response => {
        vm.modal.skills.edit = false;
        vm.$Progress.finish();
      })
      .catch(error => {
        vm.modal.skills.edit = true;
        vm.$Progress.finish();
      })
    },
    editExperience(exp, index) {
      this.modal.experience.add = !this.modal.experience.add; 
      this.experience = exp;
      this.modal.experience.action = 'edit';
      this.modal.experience.id = index;
    },
    saveExperience() {
      this.$Progress.start();
      
      if (this.modal.experience.action == 'add') {
        this.experiences.push(this.experience);
      } else {
        this.experiences[this.modal.experience.id] = this.experience;
      }

      let vm = this;
      axios({
        method: 'POST',
        url: '/api/candidate/resume',
        headers: vm.headers,
        data: {
          experience: JSON.stringify(vm.experiences),
        }
      })
      .then(response => {
        vm.modal.experience.add = false;
        vm.$Progress.finish();
        vm.modal.experience.action = 'add';
        vm.experience = {
          from: '',
          to: '',
          job_description: '',
          position: '',
          company: ''
        };
      })
      .catch(error => {
        vm.modal.experience.add = true;
        vm.$Progress.finish();
      })
    },
    deleteExperience() {
      this.$Progress.start();
      
      this.experiences.splice(this.modal.experience.delete_id, 1);
      
      let vm = this;
      axios({
        method: 'POST',
        url: '/api/candidate/resume',
        headers: vm.headers,
        data: {
          experience: JSON.stringify(vm.experiences),
        }
      })
      .then(response => {
        vm.modal.experience.delete = false;
        vm.$Progress.finish();
        vm.modal.experience.action = 'add';
      })
      .catch(error => {
        vm.modal.experience.delete = true;
        vm.$Progress.finish();
      })
    },
    handleResumeUpload() {
      if (this.$refs.resume.files[0]) {
        if (this.$refs.resume.files[0].size > 5242880 || this.$refs.resume.files[0].type != 'application/pdf') {
          this.button.resume.display = false;
          alert('Maximum file size must not be greater then 5MB and file type must be pdf.');
        } else {
          this.input.resume = this.$refs.resume.files[0];
          this.button.resume.display = true;
        }
      }
    },
    uploadResume() {
      let documents = new FormData();
      this.button.resume.disabled = true;
      this.button.resume.text = 'Uploading..';
      documents.append('resume', this.input.resume);
      let vm = this;
      axios({
        method: 'POST',
        url: '/api/candidate/resume',
        headers: vm.headers,
        data: documents
      })
      .then(response => {
        vm.button.resume.disabled = false;
        vm.button.resume.text = 'Upload Resume';
        vm.modal.resume.edit = false;
      })
      .catch(error => {
        vm.button.resume.disabled = false;
        vm.button.resume.text = 'Upload Resume';
      });
    },
    handleCoverLetterUpload() {
      if (this.$refs.coverletter.files[0]) {
        if (this.$refs.coverletter.files[0].size > 5242880 || this.$refs.coverletter.files[0].type != 'application/pdf') {
          this.button.coverletter.display = false;
          alert('Maximum file size must not be greater then 5MB and file type must be pdf.');
        } else {
          this.input.coverletter = this.$refs.coverletter.files[0];
          this.button.coverletter.display = true;
        }
      }
    },
    uploadCoverLetter() {
      let documents = new FormData();
      this.button.coverletter.disabled = true;
      this.button.coverletter.text = 'Uploading..';
      documents.append('coverletter', this.input.coverletter);
      let vm = this;
      axios({
        method: 'POST',
        url: '/api/candidate/resume',
        headers: vm.headers,
        data: documents
      })
      .then(response => {
        vm.button.coverletter.disabled = false;
        vm.button.coverletter.text = 'Upload Cover Letter';
        vm.modal.coverletter.edit = false;
      })
      .catch(error => {
        vm.button.coverletter.disabled = false;
        vm.button.coverletter.text = 'Upload Cover Letter';
      });
    }
  },
}
</script>