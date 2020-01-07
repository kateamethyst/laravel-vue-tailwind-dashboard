<template>
    <div>
        <div class="navbar px-4">
            <div class="navbar-left relative">
                <div :class="`navbar__toggle  xl:hidden lg:hidden md:hidden {isActive ? 'active' : ''}`">
                    <input id="status" type="checkbox" class="hidden" @change="displaySidebar">
                    <label for="status" class=" block cursor-pointer">
                      <div class="line line1"></div>
                      <div class="line line2"></div>
                      <div class="line line3"></div>
                    </label>
                </div>
            </div>
            <div class="navbar-right float-right relative">
                <button class="relative z-10 block m-2 overflow-hidden focus:outline-none text-gray-900 text-sm pt-3" @click="isOpen = !isOpen">
                    Hi Angelica <i class="fa fas fa-sort-down"></i>
                </button>
                <button v-if="isOpen" @click="isOpen = false" tabindex="-1" class="fixed top-0 inset-0 h-full w-full bg-black opacity-0 cursor-default"></button>
                <div v-if="isOpen" class="absolute top-auto right-0 w-48 py-2 mt-2 rounded-lg border-gray-900 bg-white shadow-xl">
                     <router-link to="/account-settings" class="text-sm text-gray-900 hover:bg-blue-600 hover:text-white block px-4 py-2 cursor-pointer">Account Settings</router-link>
                    <a href="" class="text-sm text-gray-900 hover:bg-blue-600 hover:text-white block px-4 py-2 cursor-pointer">Support</a>
                    <a @click="logout" class="text-sm text-gray-900 hover:bg-blue-600 hover:text-white block px-4 py-2 cursor-pointer">Sign Out</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import auth from '../../auth.js';

export default {
  data() {
    return {
      isOpen: false,
      isActive : false
    }
  },
  methods: {
    displaySidebar() {
      this.isActive = !this.isActive;
      if (this.isActive == true) {
        $('.sidebar').addClass('active');
      } else {
        $('.sidebar').removeClass('active');
      }
    },
    logout() {
      auth.logout();
    }
  }
}
</script>