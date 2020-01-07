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
                            <li><span class="text-gray-900 text-base">Clients</span></li>
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
                            <p class="card__title">Clients</p>
                            <p class="text-sm text-gray-900">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <filter-bar @filter-reset="resetFilter" @filter-table="filterTable"></filter-bar>
                            <div class="overflow-x-scroll xl:overflow-x-hidden lg:overflow-x-hidden md:overflow-x-hidden">
                                <vuetable ref="vuetable" 
                                    :api-url="api_url" 
                                    :show-sort-icons="true" 
                                    :fields="fields"
                                    :css="css.table" 
                                    :http-options="options"
                                    data-path="data" 
                                    pagination-path="" 
                                    :multi-sort="true"
                                    multi-sort-key="ctrl"
                                    :append-params="moreParams"
                                    @vuetable:pagination-data="onPaginationData"
                                    @vuetable:load-error="onPropagationError"
                                    @vuetable:loading="onLoadingData"
                                    @vuetable:load-success="onPropagationSuccess">
                                    <div slot="Status" slot-scope="props">
                                      <span class="badge badge-success">Active</span>
                                    </div>
                                    <div slot="Actions" slot-scope="props">
                                      <button :data-id="props.rowData.id" @click="viewClient(props.rowData)" class="inline-block btn btn-info" title="View Details"><i class="fa far fa-eye"></i></button>
                                      <button :data-id="props.rowData.id" @click="deactivateClient(props.rowData.id)" class="btn btn-danger" title="Deactivate"><i class="fa fas fa-user-times"></i></button>
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
            <p slot="modal-title" class="modal-title">Deactivate Client</p>
            <div slot="modal-body">
              <p class="text-gray-900 text-sm">Are you sure you want to deactivate this client?</p>
            </div>
            <div slot="modal-footer">
                <button class="btn btn-light" @click="modal.delete = false">No</button>
                <button class="btn btn-danger">Yes</button>
            </div>
        </modal>
        <modal v-if="modal.edit" @close="modal.edit = false">
            <p slot="modal-title" class="modal-title">{{client.name}}</p>
            <div slot="modal-body">
              <p class="text-gray-900 text-sm">{{client.about}}</p>
              <div class="form mt-5">
                  <div class="form-group">
                      <div class="w-full px-3">
                          <label class="label" for="grid-last-name">
                            Contact Number
                          </label>
                          <input class="input" id="grid-last-name" type="text" v-model="client.contact_number" disabled>
                      </div>
                      <div class="w-full px-3">
                          <label class="label" for="grid-last-name">
                            Fax
                          </label>
                          <input class="input" id="grid-last-name" type="text" v-model="client.fax" disabled>
                      </div>
                      <div class="w-full px-3">
                          <label class="label" for="grid-last-name">
                            Website
                          </label>
                          <input class="input" id="grid-last-name" type="text" v-model="client.website" disabled>
                      </div>
                  </div>
              </div>
            </div>
            <div slot="modal-footer">
                <button class="btn btn-light" @click="modal.edit = false">Close</button>
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
import auth from '../../../../auth.js';

export default {
  created() {
    this.$Progress.start();
  },
  data() {
    return {
      api_url: '/api/clients',
      moreParams: {},
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
      modal: {
        delete: false,
        edit: false
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
          name: 'website', 
          sortField: 'website',
          title: 'Website',
          titleClass: 'text-left',
          dataClass: 'text-left'
        },
        {
          name: 'contact_number', 
          sortField: 'contact_number',
          title: 'Contact Number',
          titleClass: 'text-left',
          dataClass: 'text-left'
        },
        {
          name: 'fax', 
          sortField: 'fax',
          title: 'Fax',
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
        about: '',
        contact_number: '',
        fax: '',
        name: '',
        website: ''
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
    viewClient(client) {
      this.client = client;
      this.modal.edit = true;
    },
    deactivateClient(id) {
      this.client_id = id;
      this.modal.delete = true;
    }
  },
}
</script>