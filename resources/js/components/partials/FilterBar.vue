<template>
    <div>
        <div class="flex pt-5">
          <input type="text" v-model="filterText" class="input inline-block w-full md:w-1/3 lg:w-1/3 xl:w-1/3 mr-2" @keyup.enter="doFilter" placeholder="Search...">
          <button class="btn btn-info mb-3 mr-2" @click="doFilter">Go</button>
          <button class="btn btn-light mb-3" @click="resetFilter">Reset</button>
        </div>
    </div>
</template>
<script>
export default {
  data() {
    return {
      filterText: ''
    }
  },
  methods: {
    doFilter () {
      this.$emit('filter-table', this.filterText);
    },
    resetFilter () {
      this.filterText = ''  
      this.$emit('filter-reset', this.filterText);
    }
  }
}
</script>