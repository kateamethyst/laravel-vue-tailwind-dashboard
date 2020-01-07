<template>
    <div>
        <div class="sidebar xl:w-64 lg:w-64 md:w-16 sm:w-64">
            <div class="sidebar__header p-4">
                <a href="" title="" class="sidebar__logo">
                    <img class="block md:hidden lg:block xl:block" src="/img/logo-white.png">
                    <img class="hidden md:block lg:hidden xl:hidden object-scale-down" src="/img/icon.png">
                </a>
            </div>
            <ul v-if="role == 'SuperAdmin' || role == 'Admin'" class="sidebar__list" >
                <li class="sidebar__item sidebar_title xl:block lg:block md:hidden sm:block">
                    Navigation
                </li>
                <li class="sidebar__item">
                    <router-link to="/dashboard" title="" class="sidebar__link xl:px-8 xl:py-4 lg:px-8 lg:py-4 md:px-4 md:py-4 xl:text-left lg:text-left md:text-center sm:text-left">
                        <i class="fa fas fa-columns"></i>
                        <span class="md:hidden xl:inline-block lg:inline-block sm:inline-block">Dashboard</span>
                    </router-link>
                </li>
                <li v-if="role == 'SuperAdmin'" class="sidebar__item">
                    <router-link to="/users" title="" class="sidebar__link xl:px-8 xl:py-4 lg:px-8 lg:py-4 md:px-4 md:py-4 xl:text-left lg:text-left md:text-center sm:text-left">
                        <i class="fa fas fa-users"></i>
                        <span class="md:hidden xl:inline-block lg:inline-block sm:inline-block">Users</span>
                    </router-link>
                </li>
                <li class="sidebar__item">
                    <router-link to="/job-openings" title="" class="sidebar__link xl:px-8 xl:py-4 lg:px-8 lg:py-4 md:px-4 md:py-4 xl:text-left lg:text-left md:text-center sm:text-left">
                        <i class="fa fas fa-list"></i>
                        <span class="md:hidden xl:inline-block lg:inline-block sm:inline-block">Job Openings</span>
                    </router-link>
                </li>
                <li class="sidebar__item">
                    <router-link to="/clients" title="" class="sidebar__link xl:px-8 xl:py-4 lg:px-8 lg:py-4 md:px-4 md:py-4 xl:text-left lg:text-left md:text-center sm:text-left">
                        <i class="fa fas fa-user"></i>
                        <span class="md:hidden xl:inline-block lg:inline-block sm:inline-block">Clients</span>
                    </router-link>
                </li>
                <li class="sidebar__item">
                    <router-link to="/candidates" title="" class="sidebar__link xl:px-8 xl:py-4 lg:px-8 lg:py-4 md:px-4 md:py-4 xl:text-left lg:text-left md:text-center sm:text-left">
                        <i class="fa fas fa-address-card"></i>
                        <span class="md:hidden xl:inline-block lg:inline-block sm:inline-block">Candidates</span>
                    </router-link>
                </li>
                <li class="sidebar__item">
                    <router-link to="/interviews" title="" class="sidebar__link xl:px-8 xl:py-4 lg:px-8 lg:py-4 md:px-4 md:py-4 xl:text-left lg:text-left md:text-center sm:text-left">
                        <i class="fa fas fa-calendar"></i>
                        <span class="md:hidden xl:inline-block lg:inline-block sm:inline-block">Interviews</span>
                    </router-link>
                </li>
            </ul>
            <ul class="sidebar__list" v-if="role == 'Candidate'">
                <li class="sidebar__item sidebar_title xl:block lg:block md:hidden sm:block">
                    Navigation
                </li>
                <li class="sidebar__item">
                    <router-link to="/candidate/profile" title="" class="sidebar__link xl:px-8 xl:py-4 lg:px-8 lg:py-4 md:px-4 md:py-4 xl:text-left lg:text-left md:text-center sm:text-left">
                        <i class="fa fas fa-id-card"></i>
                        <span class="md:hidden xl:inline-block lg:inline-block sm:inline-block">Profile</span>
                    </router-link>
                </li>
                <li class="sidebar__item">
                    <router-link to="/candidate/applications" title="" class="sidebar__link xl:px-8 xl:py-4 lg:px-8 lg:py-4 md:px-4 md:py-4 xl:text-left lg:text-left md:text-center sm:text-left">
                        <i class="fa fas fa-briefcase"></i>
                        <span class="md:hidden xl:inline-block lg:inline-block sm:inline-block">Applications</span>
                    </router-link>
                </li>
                <li class="sidebar__item">
                    <router-link to="/candidate/interviews" title="" class="sidebar__link xl:px-8 xl:py-4 lg:px-8 lg:py-4 md:px-4 md:py-4 xl:text-left lg:text-left md:text-center sm:text-left">
                        <i class="fa fas fa-calendar"></i>
                        <span class="md:hidden xl:inline-block lg:inline-block sm:inline-block">Interviews</span>
                    </router-link>
                </li>
            </ul>
            <ul class="sidebar__list" v-if="role == 'Client'">
                <li class="sidebar__item sidebar_title xl:block lg:block md:hidden sm:block">
                    Navigation
                </li>
                <li class="sidebar__item">
                    <router-link to="/client/dashboard" title="" class="sidebar__link xl:px-8 xl:py-4 lg:px-8 lg:py-4 md:px-4 md:py-4 xl:text-left lg:text-left md:text-center sm:text-left">
                        <i class="fa fas fa-columns"></i>
                        <span class="md:hidden xl:inline-block lg:inline-block sm:inline-block">Dashboard</span>
                    </router-link>
                </li>
                <li class="sidebar__item">
                    <router-link to="/client/job-opening" title="" class="sidebar__link xl:px-8 xl:py-4 lg:px-8 lg:py-4 md:px-4 md:py-4 xl:text-left lg:text-left md:text-center sm:text-left">
                        <i class="fa fas fa-list"></i>
                        <span class="md:hidden xl:inline-block lg:inline-block sm:inline-block">Job Openings</span>
                    </router-link>
                </li>
                <li class="sidebar__item">
                    <router-link to="/client/interviews" title="" class="sidebar__link xl:px-8 xl:py-4 lg:px-8 lg:py-4 md:px-4 md:py-4 xl:text-left lg:text-left md:text-center sm:text-left">
                        <i class="fa fas fa-calendar"></i>
                        <span class="md:hidden xl:inline-block lg:inline-block sm:inline-block">Interviews</span>
                    </router-link>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
  data() {
    return {
      role: localStorage.getItem('role')
    }
  },
}
</script>