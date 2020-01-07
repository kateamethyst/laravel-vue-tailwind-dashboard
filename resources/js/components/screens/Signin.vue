<template>
    <div>
        <div class="wrapper">
            <div class="flex justify-center">
                <div class="login w-11/12 lg:w-2/6 xl:w-2/6 md:w-3/6">
                    <div class="login__header">
                        <a href="" title="" class="sidebar__logo">
                            <img width="276" height="80" :src="'/img/logo.png'">
                        </a>
                        <p class="text-2xl py-10 font-semibold text-blue-600">Signin</p>
                    </div>
                    <div class="login__body">
                        <ValidationObserver ref="observer">
                            <form slot-scope="{validate }" @submit.prevent="validate().then(onSubmit)">
                                <div class="form-group">
                                    <div class="w-full px-3">
                                      <label class="label" for="grid-email">
                                        Email
                                      </label>
                                      <ValidationProvider name="email" rules="required|email" v-slot="{ errors }">
                                          <input class="input" id="grid-email" v-model="email" type="email" placeholder="jane@doe.com">
                                          <span class="text-red-600 text-xs">{{ errors[0] }}</span>
                                      </ValidationProvider>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="w-full px-3">
                                      <label class="label" for="grid-password">
                                        Password
                                      </label>
                                      <ValidationProvider name="password" rules="required" v-slot="{ errors }">
                                          <input class="input" id="grid-password" v-model="password" type="password" placeholder="******************">
                                          <span class="text-red-600 text-xs">{{ errors[0] }}</span>
                                      </ValidationProvider>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="w-1/2 px-3 text-left">
                                      <a href="/" class="text-sm text-blue-600 block">Forgot Password</a>
                                    </div>
                                    <div class="w-1/2 px-3 text-right">
                                      <input type="submit" class="btn btn-info" :class="" :value="button.text" :disabled="button.loading">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="w-full text-center">
                                        <a href="/candidate/signup" class="text-sm text-blue-600">Signup and get hired.</a>
                                        <span class="text-sm text-gray-900 mx-3"> | </span>
                                        <a href="/employer/signup" class="text-sm text-blue-600">Hire without hassle.</a>
                                    </div>
                                </div>
                            </form>
                        </ValidationObserver>
                    </div>
                </div>
            </div>
        </div>
        <modal v-if="modal.failed" @close="modal.failed = false">
            <p slot="modal-title" class="modal-title">Message</p>
            <div slot="modal-body">
              <p class="text-gray-900 text-sm">Failed to login. Please check your username or password.</p>
            </div>
            <div slot="modal-footer">
                <button class="btn btn-danger" @click="modal.failed = false">OK</button>
            </div>
        </modal>
    </div>
</template>
<script>
import { ValidationProvider, ValidationObserver } from 'vee-validate/dist/vee-validate.full';
import Modal from '../partials/Modal';
import auth from '../../auth.js';
export default {
  components: {
    ValidationObserver,
    ValidationProvider,
    Modal
  },
  data() {
    return {
      modal: {
        failed: false
      },
      email: 'admin@siocareer.com',
      password: 'admin123',
      button: {
        loading: false,
        text: 'Login'
      }
    }
  },
  created() {
    document.title = 'Signin | SendItOut International Outsourcing Inc.';
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
        this.authenticate();
      }
    },
    authenticate() {
      let vm = this;
      this.button.text = 'Loading...';
      this.button.loading = true;
      axios({
        method: 'POST',
        url: '/api/auth/authenticate',
        data: {
          email: vm.email,
          password: vm.password
        }
      })
      .then(function (response) {
        if (response.status == 200) {
          localStorage.token = response.data.token;
          auth.token();
          setTimeout(function() {
            let role = localStorage.getItem('role');

            if (role == 'Candidate') {
              location.href = '/candidate/profile';
            } else {
              location.href= "/dashboard";
            }
          }, 3000);
        }
      })
      .catch(function (error) {
        vm.modal.failed = true;
        vm.button.text = 'Login';
        vm.button.loading = false;
      });

    }
  },
}
</script>