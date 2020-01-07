<template>
    <div>
        <vue-progress-bar></vue-progress-bar>
        <div class="wrapper">
            <div class="flex flex-wrap px-4 py-4">
                <div class="page__title xl:w-1/2  lg:w-1/2  md:w-1/2">
                    <router-link to="/client/job-openings/create" class="btn btn-success inline-block"><i class="fa fas fa-plus"></i></i> Post a Job</router-link>
                </div>
                <div class="page__title xl:w-1/2  lg:w-1/2  md:w-1/2">
                    <nav class="p-2 rounded font-sans w-full ">
                        <ol class="list-reset flex justify-end">
                            <li><router-link to="/client/dashboard" class="text-blue-600 text-base">Dashboard</router-link></li>
                            <li><span class="mx-2 text-gray-900 text-base">/</span></li>
                            <li><span class="text-gray-900 text-base">Job Openings</span></li>
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
                            <p class="card__title">Job Openings</p>
                            <p class="text-sm text-gray-900">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <filter-bar @filter-reset="resetFilter" @filter-table="filterTable"></filter-bar>
                            <div class="overflow-x-scroll xl:overflow-x-hidden lg:overflow-x-hidden md:overflow-x-hidden">
                                <vuetable ref="vuetable" 
                                    :api-url="api_url" 
                                    :show-sort-icons="true" 
                                    :fields="fields"
                                    :css="css.table" 
                                    data-path="data"
                                    :append-params="moreParams"
                                    pagination-path="" 
                                    :multi-sort="true"
                                    multi-sort-key="ctrl"
                                    @vuetable:pagination-data="onPaginationData"
                                    @vuetable:load-error="onPropagationError"
                                    @vuetable:loading="onLoadingData"
                                    @vuetable:load-success="onPropagationSuccess">
                                    <div slot="Actions" slot-scope="props">
                                      <router-link :to="`/client/job-openings/${props.rowData.id}/applicants`" :data-id="props.rowData.id" class="inline-block btn btn-info" title="Applicants"><i class="fa fa-users"></i></router-link>
                                      <router-link  :to="`/client/job-openings/${props.rowData.id}/edit`" :data-id="props.rowData.id" class="inline-block btn btn-success" title="Edit"><i class="fa fa-pencil"></i></router-link>
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
        <modal v-if="modal.delete" @close="modal.delete = false">
            <p slot="modal-title" class="modal-title">Delete Job Post</p>
            <div slot="modal-body">
              <p class="text-gray-900 text-sm">Are you sure you want to delete this job post?</p>
            </div>
            <div slot="modal-footer">
                <button class="btn btn-light" @click="modal.delete = false">No</button>
                <button class="btn btn-danger" @click="removeJob">Yes</button>
            </div>
        </modal>
    </div>
</template>

<script>
import Modal from '../../../partials/Modal';
import Vuetable from "vuetable-2/src/components/Vuetable";
import VuetablePagination from '../../../partials/Pagination';
import VuetablePaginationInfo from "vuetable-2/src/components/VuetablePaginationInfo";
import FilterBar from '../../../partials/FilterBar';

export default {
  created() {
    this.$Progress.start();
  },
  data() {
    return {
      api_url: 'https://vuetable.ratiw.net/api/users',
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
      modal: {
        delete: false
      },
      moreParams: {},
      fields: [
        {
          name: 'id',
          sortField: 'id',
          title: 'Id',
          titleClass: 'text-left',
          dataClass: 'text-left'
        },
        {
          name: 'name', 
          sortField: 'name',
          title: 'Job Post',
          titleClass: 'text-left',
          dataClass: 'text-left'
        },
        {
          name: 'email', 
          sortField: 'email',
          title: 'Date Created',
          titleClass: 'text-left',
          dataClass: 'text-left'
        },
        {
          name: 'email', 
          sortField: 'email',
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
      job_id: '',
      job: {
        title: '',
        body: ''
      }
    }
  },
  components: {
    Vuetable,
    FilterBar,
    VuetablePagination,
    VuetablePaginationInfo,
    Modal,
  },
  methods: {
    onPaginationData(paginationData) {
      this.$refs.pagination.setPaginationData(paginationData);
      this.$refs.paginationInfo.setPaginationData(paginationData);
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
    deleteJob(id) {
      this.job_id = id;
      this.modal.delete = true;
    },
    removeJob() {
    }
  },
}
</script>