<template>
  <div>
    <div class="wrapper">
            <div class="flex justify-center">
                <div class="login w-11/12 lg:w-2/6 xl:w-2/6 md:w-3/6">
                    <div class="login__header">
                        <a href="" title="" class="sidebar__logo">
                            <img width="276" height="80" :src="'/img/logo.png'">
                        </a>
                        <p class="text-2xl py-10 font-semibold text-blue-600">Signup</p>
                    </div>
                    <div class="login__body">
                        <ValidationObserver ref="observer">
                            <form slot-scope="{validate}" @submit.prevent="validate().then(onSubmit)">
                                <div class="form-group">
                                    <div class="w-full px-3">
                                      <label class="label" >
                                        Company <span class="text-red-600">*</span>
                                      </label>
                                      <ValidationProvider name="company" rules="required" v-slot="{ errors }">
                                          <input class="input" type="text" v-model="employer.company" placeholder="Jane Company" name="company">
                                          <span class="text-red-600 text-xs">{{ errors[0] }}</span>
                                      </ValidationProvider>   
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="w-1/2 px-3">
                                      <label class="label" >
                                        First Name <span class="text-red-600">*</span>
                                      </label>
                                      <ValidationProvider name="first name" rules="required" v-slot="{ errors }">
                                          <input class="input" type="text" placeholder="Jane" v-model="employer.first_name">
                                          <span class="text-red-600 text-xs">{{ errors[0] }}</span>
                                      </ValidationProvider>
                                    </div>
                                    <div class="w-1/2 px-3">
                                      <label class="label" >
                                        Last Name <span class="text-red-600">*</span>
                                      </label>
                                      <ValidationProvider name="last name" rules="required" v-slot="{ errors }">
                                          <input class="input" type="text" placeholder="Doe" v-model="employer.last_name">
                                          <span class="text-red-600 text-xs">{{ errors[0] }}</span>
                                      </ValidationProvider>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="w-full px-3">
                                      <label class="label" for="grid-email">
                                        Email <span class="text-red-600">*</span>
                                      </label>
                                      <ValidationProvider name="email" rules="required|email" v-slot="{ errors }">
                                          <input class="input" id="grid-email" type="email" placeholder="jane@doe.com" v-model="employer.email">
                                          <span class="text-red-600 text-xs">{{ errors[0] }}</span>
                                      </ValidationProvider>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="w-full px-3">
                                      <label class="label" for="grid-password">
                                        Password <span class="text-red-600">*</span>
                                      </label>
                                      <ValidationProvider name="password" rules="required|min:8" v-slot="{ errors }">
                                          <input class="input" id="grid-password" type="password" placeholder="******************" v-model="employer.password">
                                          <span class="text-red-600 text-xs">{{ errors[0] }}</span>
                                      </ValidationProvider>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="w-1/2 px-3 text-left">
                                          <input class="mr-2 leading-tight" type="checkbox" required>
                                          <span class="text-sm text-gray-900">
                                            I agree to SendItOut International Outsourcing Inc <a href="" class="hover:text-blue-600">Terms and Condition</a>, <a href="" class="hover:text-blue-600">Privacy Policy</a>, and <a href="" class="hover:text-blue-600">Cookie Policy</a>
                                          </span>
                                    </label>
                                    <div class="w-1/2 px-3 text-right">
                                      <input type="submit" class="btn btn-info" :value="button.text" :disabled="button.loading">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="w-full text-center">
                                        <a href="/signin" class="text-sm text-blue-600">Already have an account? Sigin here.</a>
                                    </div>
                                </div>
                            </form>
                        </ValidationObserver>
                    </div>
                </div>
            </div>
        </div>
  </div>
</template>
<script>
import { ValidationProvider, ValidationObserver } from 'vee-validate/dist/vee-validate.full';

export default {
  components : {
    ValidationObserver,
    ValidationProvider,
  },
  created() {
    document.title = 'Employer Signup | SendItOut International Outsourcing Inc.';
  },
  data() {
    return {
      employer: {
        company: '',
        first_name: '',
        last_name: '',
        email: '',
        password: ''
      },
      button: {
        loading: false,
        text: 'Submit'
      }
    }
  },
  methods: {
    async  onSubmit () {
      const isValid = await this.$refs.observer.validate();
      if (!isValid) {
        this.button.text = 'Submit';
        this.button.loading = false;
      } else {
        this.button.text = 'Loading...';
        this.button.loading = true;
      }
    },
  },
}
</script>