<template>
    <div>
        <vue-progress-bar></vue-progress-bar>
        <div class="wrapper p-8">
            <div class="page__title px-4">
                <p class="text-lg font-semibold text-gray-900">Applications</p>
            </div>
        </div>
        <div class="wrapper">
            <div class="flex flex-wrap">
                <div class="w-full px-4 py-4">
                    <div class="card">
                        <div class="card__body">
                            <p class="card__title">Applications</p>
                            <p class="text-sm text-gray-900">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <filter-bar @filter-reset="resetFilter" @filter-table="filterTable"></filter-bar>
                            <div class="overflow-x-scroll xl:overflow-x-hidden lg:overflow-x-hidden md:overflow-x-hidden">
                                <vuetable ref="vuetable" 
                                    :api-url="api_url" 
                                    :show-sort-icons="true" 
                                    :fields="fields"
                                    :css="css.table" 
                                    data-path="data" 
                                    pagination-path=""
                                    :http-options="options"
                                    :multi-sort="true"
                                    multi-sort-key="ctrl"
                                    :append-params="moreParams"
                                    @vuetable:pagination-data="onPaginationData"
                                    @vuetable:load-error="onPropagationError"
                                    @vuetable:loading="onLoadingData"
                                    @vuetable:load-success="onPropagationSuccess">
                                    <div slot="Indicator" slot-scope="props">
                                      <div class="h-4 w-4 bg-blue-600 rounded-full"></div>
                                    </div>
                                    <div slot="Job" slot-scope="props">
                                      <a :href="`/job-opening/${props.rowData.id}`" target="_blank" class="text-blue-600">PHP Developer</a>
                                    </div>
                                </vuetable>
                                <div>
                                    <vuetable-pagination ref="pagination"
                                        class="pull-right"
                                        @vuetable-pagination:change-page="onChangePage"
                                    ></vuetable-pagination>
                                    <vuetable-pagination-info ref="paginationInfo"></vuetable-pagination-info>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <modal v-if="modal.failed" @close="modal.failed = false">
            <p slot="modal-title" class="modal-title">Message</p>
            <div slot="modal-body">
              <p class="text-gray-900 text-sm">Failed to load data.</p>
            </div>
            <div slot="modal-footer">
                <button class="btn btn-danger" @click="modal.failed = false">OK</button>
            </div>
        </modal>
    </div>
</template>

<script>
import Modal from '../../partials/Modal';
import Vuetable from "vuetable-2/src/components/Vuetable";
import VuetablePagination from '../../partials/Pagination';
import VuetablePaginationInfo from "vuetable-2/src/components/VuetablePaginationInfo";
import FilterBar from '../../partials/FilterBar';
export default {
  created() {
    this.$Progress.start();
  },
  components: {
    Vuetable,
    Modal,
    VuetablePagination,
    VuetablePaginationInfo,
    FilterBar
  },
  data() {
    return {
      modal: {
        failed: false
      },
      moreParams: {},
      options: {
        headers: {
          'Authorization': 'Bearer ' + localStorage.token
        }
      },
      api_url: '/api/users',
      css: {
        table: {
          tableWrapper: '',
          tableHeaderClass: 'mb-0',
          tableBodyClass: 'mb-0',
          tableClass: 'table table-bordered table-hover',
          loadingClass: 'loading',
          ascendingIcon: 'fa fa-chevron-up',
          descendingIcon: 'fa fa-chevron-down',
          ascendingClass: 'sorted-asc',
          descendingClass: 'sorted-desc',
          sortableIcon: 'fa fa-sort',
          detailRowClass: 'vuetable-detail-row',
          handleIcon: 'fa fa-bars text-secondary',
          renderIcon(classes, options) {
            return `<i class="${classes.join(' ')}"></span>`
          }
        },
      },
      fields: [
        {
          name: 'Indicator',
          sortField: 'Indicator',
          title: '',
          titleClass: 'text-left',
          dataClass: 'text-left'
        },
        {
          name: 'id',
          sortField: 'id',
          title: 'Id',
          titleClass: 'text-left',
          dataClass: 'text-left'
        },
        {
          name: 'Job', 
          sortField: 'Job',
          title: 'Job Post',
          titleClass: 'text-left',
          dataClass: 'text-left'
        },
        {
          name: 'date_applied',
          sortField: 'date_applied' ,
          title: 'Date Applied',
          titleClass: 'text-left',
          dataClass: 'text-left'
        },
        {
          name: 'status',
          sortField: 'status' ,
          title: 'Status',
          titleClass: 'text-left',
          dataClass: 'text-left'
        }
      ],
    }
  },
    methods: {
    onPaginationData(paginationData) {
      this.$refs.pagination.setPaginationData(paginationData.meta);
      this.$refs.paginationInfo.setPaginationData(paginationData.meta);
      this.$Progress.finish();
    },
    onChangePage(page) {
      this.$Progress.start();
      this.$refs.vuetable.changePage(page);
      this.$Progress.finish();
    },
    onLoadingData() {
      this.$Progress.start();
    },
    onPropagationSuccess() {
      this.$Progress.finish();
    },
    onPropagationError(response) {
      this.$Progress.finish();
      this.modal.failed = true;
    },
    resetFilter() {
      this.$Progress.start();
      this.moreParams = {};
      let vm = this ;
      setTimeout(function(){
        vm.$refs.vuetable.refresh();
        vm.$Progress.finish();
      }, 1000);
    },
    filterTable(e){
      this.$Progress.start();
      this.moreParams = {
        filter: e
      };
      let vm = this ;
      setTimeout(function(){
        vm.$refs.vuetable.refresh();
        vm.$Progress.finish();
      }, 1000);
    },
  }
}
</script>