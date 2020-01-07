<template>
    <div>
        <vue-progress-bar></vue-progress-bar><div class="wrapper">
        <div class="flex flex-wrap px-4 py-4">
                <div class="page__title w-1/2">
                </div>
                <div class="page__title w-1/2">
                    <nav class="p-2 rounded font-sans w-full ">
                        <ol class="list-reset flex justify-end">
                            <li><router-link to="/dashboard" class="text-blue-600 text-base">Dashboard</router-link></li>
                            <li><span class="mx-2 text-gray-900 text-base">/</span></li>
                            <li><span class="text-gray-900 text-base">Interviews</span></li>
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
                            <p class="card__title">Interviews</p>
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
                                    :multi-sort="true"
                                    multi-sort-key="ctrl"
                                    :append-params="moreParams"
                                    @vuetable:pagination-data="onPaginationData"
                                    @vuetable:load-error="onPropagationError"
                                    @vuetable:loading="onLoadingData"
                                    @vuetable:load-success="onPropagationSuccess">
                                    <div slot="Actions" slot-scope="props">
                                      <button :data-id="props.rowData.id" class="btn btn-success" @click="modal.add = true" title="Re-schedule"><i class="fa fas fa-undo"></i></button>
                                      <button :data-id="props.rowData.id" class="btn btn-danger" @click="modal.delete = true" title="Cancel Interview"><i class="fa fas fa-times-circle"></i></button>
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
        
        <modal v-if="modal.add" @close="modal.add = false">
            <p slot="modal-title" class="modal-title">{{modal.title}}</p>
            <div slot="modal-body">
                <form class="form">
                    <div class="form-group">
                        <div class="w-full px-3 mb-6 md:mb-0">
                            <label class="label" for="grid-date">
                              Date
                            </label>
                            <input class="input" id="grid-date" type="date">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="w-full md:w-1/2 px-3">
                            <label class="label" for="grid-start-time">
                              From
                            </label>
                            <input class="input" id="grid-start-time" type="time">
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                          <label class="label" for="grid-to">
                            To
                          </label>
                          <input class="input" id="grid-to" type="time">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="w-full px-3">
                          <label class="label" for="grid-password">
                            Interviewier
                          </label>
                          <input class="input" id="grid-password" type="text" placeholder="Jane Doe">
                        </div>
                    </div>
                </form>
            </div>
            <div slot="modal-footer">
                <button class="btn btn-success">Save</button>
            </div>
        </modal>
        
        <modal v-if="modal.delete" @close="modal.delete = false">
            <p slot="modal-title" class="modal-title">Cancel Interview</p>
            <div slot="modal-body">
              <p class="text-gray-900 text-sm">Are you sure you want to cancel this interview?</p>
            </div>
            <div slot="modal-footer">
                <button class="btn btn-light" @click="modal.delete = false">No</button>
                <button class="btn btn-danger">Yes</button>
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
    VuetablePagination,
    VuetablePaginationInfo,
    Modal,
    FilterBar
  },
    data() {
    return {
      moreParams: {},
      user_id: '',
      modal: {
        add: false,
        title: 'Reschedule',
        delete: false
      },
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
          title: 'Name',
          titleClass: 'text-left',
          dataClass: 'text-left'
        },
        {
          name: 'email',
          sortField: 'email' ,
          title: 'Email',
          titleClass: 'text-left',
          dataClass: 'text-left'
        },
        {
          name: 'Actions',
          title: 'Actions',
          titleClass: 'text-center',
          dataClass: 'text-center',
        }
      ]
    }
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
  },
}
</script>