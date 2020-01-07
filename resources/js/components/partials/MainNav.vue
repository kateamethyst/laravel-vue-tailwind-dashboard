<template>
    <div class="wrapper bg-white">
        <nav class="mainnav">
            <div class="container">
                <div class="mainnav__brand">
                    <a href="http://167.71.201.12/" rel="home">
                        <img :src="'/img/logo.png'" class="img-fluid" alt="SendItOut International">
                    </a>
                </div>
                <div class="mainnav__toggler xl:hidden lg:hidden">
                    <button class="hover:text-blue-600 hover:border-blue-600">
                        <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                    </button>
                </div>
                <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                    <div class="mainnav__list lg:flex-grow">
                        <a href="#responsive-header" class="mainnav__item lg:inline-block lg:mt-0 hover:text-blue-600 lg:px-2">
                          Home
                        </a>
                        <div class="relative lg:inline-block">
                            <a @click="dropdown.services = !dropdown.services" href="#responsive-header" class="mainnav__item z-10 lg:inline-block lg:mt-0 hover:text-blue-600 lg:px-2">
                                Services <i class="fa fas fa-sort-down"></i>
                            </a>
                            <button v-if="dropdown.services" @click="dropdown.services = false" tabindex="-1" class="fixed top-0 inset-0 h-full w-full bg-black opacity-0 cursor-default"></button>
                            <div v-if="dropdown.services" class="absolute top-auto right-0 w-48 py-2 mt-2 rounded-lg border-gray-900 bg-white shadow-xl">
                                <a href="" class="text-sm text-gray-900 hover:bg-blue-600 hover:text-white block px-4 py-2 cursor-pointer">Support</a>
                                <a  class="text-sm text-gray-900 hover:bg-blue-600 hover:text-white block px-4 py-2 cursor-pointer">Sign Out</a>
                            </div>
                        </div>
                        <div class="relative lg:inline-block">
                            <a @click="dropdown.about = !dropdown.about" href="#responsive-header" class="mainnav__item z-10 lg:inline-block lg:mt-0 hover:text-blue-600 lg:px-2">
                                About Us <i class="fa fas fa-sort-down"></i>
                            </a>
                            <button v-if="dropdown.about" @click="dropdown.about = false" tabindex="-1" class="fixed top-0 inset-0 h-full w-full bg-black opacity-0 cursor-default"></button>
                            <div v-if="dropdown.about" class="absolute top-auto right-0 w-48 py-2 mt-2 rounded-lg border-gray-900 bg-white shadow-xl">
                                <a href="" class="text-sm text-gray-900 hover:bg-blue-600 hover:text-white block px-4 py-2 cursor-pointer">Support</a>
                                <a  class="text-sm text-gray-900 hover:bg-blue-600 hover:text-white block px-4 py-2 cursor-pointer">Sign Out</a>
                            </div>
                        </div>
                        <a href="#responsive-header" class="mainnav__item lg:inline-block lg:mt-0 hover:text-blue-600 lg:px-2">
                          Contact Us
                        </a>
                        <a href="#" class="inline-block btn-pill btn-lg btn-primary px-5">Build Your Team</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
export default {
  data() {
    return {
      dropdown: {
        services: false,
        about: false
      }
    }
  },
}
</script>