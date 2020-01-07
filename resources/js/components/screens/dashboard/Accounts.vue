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
                            <li><span class="text-gray-900 text-base">Accounts Settings</span></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="wrapper p-8">
            <div class="card">
                <div class="card__body"> 
                     <nav class="flex flex-col sm:flex-row">
                        <button @click="tabs.password = true" class="text-gray-900 p-4 block uppercase hover:text-blue-600 focus:outline-none text-xs" :class="(tabs.password == true) ? `text-blue-600 font-semibold border-b-2 border-blue-600` : ``">Change Password</button>
                    </nav>
                    <div v-if="tabs.password == true" class="py-4 px-6">
                        <ValidationObserver ref="observer">
                            <form slot-scope="{validate }" @submit.prevent="validate().then(onSubmit)" name="change-password" class="form">
                                <div class="form-group">
                                    <div class="w-full">
                                        <label class="label" for="grid-first-name">
                                          Old Password <span class="text-red-600">*</span>
                                        </label>
                                        <ValidationProvider name="old password" rules="required" v-slot="{ errors }">
                                            <input class="input" type="password" placeholder="********">
                                            <span class="block text-red-600 text-xs mb-5">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </div>
                                    <div class="w-full">
                                        <label class="label" for="grid-last-name">
                                          New Password <span class="text-red-600">*</span>
                                        </label>
                                        <ValidationProvider name="new password" rules="required" v-slot="{ errors }">
                                            <input class="input" type="password" placeholder="********">
                                            <span class="block text-red-600 text-xs mb-5">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </div>
                                    <div class="w-full">
                                        <label class="label" for="grid-last-name">
                                          Confirm Password <span class="text-red-600">*</span>
                                        </label>
                                        <ValidationProvider name="confirm password" rules="required" v-slot="{ errors }">
                                            <input class="input" type="password" placeholder="********">
                                            <span class="block text-red-600 text-xs mb-5">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </div>
                                    <div class="w-full px-4 py-4 mb-5 text-right">
                                        <button type="submit" class="btn btn-success"><i class="fa fas fa-save"></i> Save</button>
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
import Modal from '../../partials/Modal';
import { ValidationProvider, ValidationObserver } from 'vee-validate/dist/vee-validate.full';

export default {
  data() {
    return {
      tabs: {
        password: true
      }
    }
  },
  components: {
    ValidationObserver,
    ValidationProvider,
    Modal
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