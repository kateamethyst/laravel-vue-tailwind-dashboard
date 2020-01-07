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
                            <li><span class="text-gray-900 text-base">Candidates</span></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="flex flex-wrap">
                <div class="w-full px-4 py-4">
                    <div class="card">
                        <div class="card__body">
                            <p class="card__title">Candidates</p>
                            <p class="text-sm text-gray-900">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <filter-bar @filter-reset="resetFilter" @filter-table="filterTable"></filter-bar>
                            <div class="overflow-x-scroll xl:overflow-x-hidden lg:overflow-x-hidden md:overflow-x-hidden">
                                <vuetable ref="vuetable" 
                                    :api-url="api_url" 
                                    :show-sort-icons="true" 
                                    :fields="fields"
                                    :css="css.table" 
                                    data-path="data" 
                                    :http-options="options"
                                    pagination-path="" 
                                    :multi-sort="true"
                                    :append-params="moreParams"
                                    multi-sort-key="ctrl"
                                    @vuetable:pagination-data="onPaginationData"
                                    @vuetable:load-error="onPropagationError"
                                    @vuetable:loading="onLoadingData"
                                    @vuetable:load-success="onPropagationSuccess">
                                    <div slot="Status" slot-scope="props">
                                      <span v-if="props.rowData.resume != null" class="badge badge-success text-xs">Active</span>
                                      <span v-else class="text-xs badge badge-danger">In Active</span>
                                    </div>
                                    <div slot="Actions" slot-scope="props">
                                      <div v-if="props.rowData.resume != null">
                                          <router-link :to="`/candidates/${props.rowData.id}`"  :data-id="props.rowData.id" class="inline-block btn btn-info" title="View Details"><i class="fa far fa-eye"></i></router-link>
                                          <button :data-id="props.rowData.id" class="inline-block btn btn-light" title="Download Resume"><i class="fa fas fa-download"></i></button>
                                          <button :data-id="props.rowData.id" class="inline-block btn btn-dark" title="Download Cover Letter"><i class="fa fas fa-download"></i></button>
                                      </div>
                                      <div v-else>
                                        <span class="text-gray-900 text-xs italic">No available information.</span>
                                      </div>
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
    </div>
</template>

<script>
import Modal from '../../../partials/Modal';
import Vuetable from "vuetable-2/src/components/Vuetable";
import VuetablePagination from '../../../partials/Pagination';
import VuetablePaginationInfo from "vuetable-2/src/components/VuetablePaginationInfo";
import FilterBar from '../../../partials/FilterBar';
import auth from '../../../../auth.js';

export default {
  created() {
    this.$Progress.start();
  },
  data() {
    return {
      api_url: '/api/candidates',
      options: {
        headers: {
          'Authorization': 'Bearer ' + auth.token()
        }
      },
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
      moreParams: {},
      modal: {
        edit: false
      },
      fields: [
        {
          name: 'id',
          title: 'Id',
          sortField: 'id',
          titleClass: 'text-left',
          dataClass: 'text-left'
        },
        {
          name: 'first_name', 
          sortField: 'first_name',
          title: 'Name',
          titleClass: 'text-left',
          dataClass: 'text-left'
        },
        {
          name: 'last_name', 
          sortField: 'last_name',
          title: 'Name',
          titleClass: 'text-left',
          dataClass: 'text-left'
        },
        {
          name: 'email', 
          sortField: 'email',
          title: 'Email',
          titleClass: 'text-left',
          dataClass: 'text-left'
        },
        {
          name: 'Status', 
          title: 'Status',
          titleClass: 'text-left',
          dataClass: 'text-left'
        },
        {
          name: 'Actions',
          title: 'Actions',
          titleClass: 'text-center',
          dataClass: 'text-center',
        }
      ],
      client_id: '',
      client: {
        title: '',
        body: ''
      }
    }
  },
  components: {
    Vuetable,
    VuetablePagination,
    VuetablePaginationInfo,
    Modal,
    FilterBar
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
      alert('Failed to load');
      console.log(response);
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
  },
}
</script>