<template>
    <div>
        <div id="app" >
            <sidebar ref="sidebar"></sidebar>
            <div class="content lg:ml-64 xl:ml-64 md:ml-16 sm:ml-0 ml-0 min-h-full">
                <nav-header ref="nav"></nav-header>
                <router-view class="view"></router-view>
            </div>
        </div>
    </div>
</template>
<script>
import Sidebar from '../../partials/Sidebar';
import NavHeader from '../../partials/NavHeader';
export default {
  components: {
    Sidebar,
    NavHeader
  },
  computed: {
    pageTitle: function() {
      return this.$route.meta.title;
    }
  },
  created () {
    document.title = this.$route.meta.title;
  },
  watch: {
    $route(to, from) {
      document.title = to.meta.title || 'SendItOut International Outsourcing Inc.';
    },
  }
}
</script>