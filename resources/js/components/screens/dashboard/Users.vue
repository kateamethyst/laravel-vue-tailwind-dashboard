<template>
    <div>
        <vue-progress-bar></vue-progress-bar>
        <div class="wrapper">
            <div class="flex flex-wrap px-4 py-4">
                <div class="page__title w-1/2">
                    <button class="btn btn-success" v-if="role == 'SuperAdmin'" @click="createUser"><i class="fa fas fa-user-plus"></i> Add User</button>
                </div>
                <div class="page__title w-1/2">
                    <nav class="p-2 rounded font-sans w-full ">
                        <ol class="list-reset flex justify-end">
                            <li><router-link to="/dashboard" class="text-blue-600 text-base">Dashboard</router-link></li>
                            <li><span class="mx-2 text-gray-900 text-base">/</span></li>
                            <li><span class="text-gray-900 text-base">Users</span></li>
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
                            <p class="card__title">Users</p>
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
                                    :sort-params="getSortParam"
                                    multi-sort-key="ctrl"
                                    :append-params="moreParams"
                                    @vuetable:pagination-data="onPaginationData"
                                    @vuetable:load-error="onPropagationError"
                                    @vuetable:loading="onLoadingData"
                                    @vuetable:load-success="onPropagationSuccess">
                                    <div slot="Actions" slot-scope="props">
                                      <button :data-id="props.rowData.id" @click="editUser(props.rowData)" class="btn btn-success" title="Edit"><i class="fa fa-pencil"></i></button>
                                      <button :data-id="props.rowData.id" @click="deleteUser(props.rowData.id)" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></button>
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
                <ValidationObserver ref="observer">
                    <form slot-scope="{validate }" @submit.prevent="validate().then(onSubmit)" class="form">
                        <div class="form-group">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="label" for="grid-first-name">
                                  First Name <span class="text-red-600">*</span>
                                </label>
                                <ValidationProvider name="first name" rules="required" v-slot="{ errors }">
                                    <input class="input" id="grid-first-name" v-model="user.first_name" type="text" placeholder="Jane">
                                    <span class="text-red-600 text-xs">{{ errors[0] }}</span>
                                </ValidationProvider>
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="label" for="grid-last-name">
                                  Last Name <span class="text-red-600">*</span>
                                </label>
                                <ValidationProvider name="last name" rules="required" v-slot="{ errors }">
                                    <input class="input" id="grid-last-name" v-model="user.last_name" type="text" placeholder="Doe">
                                    <span class="text-red-600 text-xs">{{ errors[0] }}</span>
                                </ValidationProvider>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="w-full px-3">
                              <label class="label" for="grid-email">
                                Email <span class="text-red-600">*</span>
                              </label>
                                <ValidationProvider name="email" rules="required|email" v-slot="{ errors }">
                                    <input class="input" id="grid-email" v-model="user.email" type="email" placeholder="jane@doe.com">
                                    <span class="text-red-600 text-xs">{{ errors[0] }}</span>
                                </ValidationProvider>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="w-full px-3">
                              <label class="label" for="grid-email">
                                Role <span class="text-red-600">*</span>
                              </label>
                              <select class="input" v-model="user.type">
                                  <option value="admin">Staff</option>
                                  <option value="superadmin">Super Administrator</option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group" v-if="modal.title != 'Edit User'">
                            <div class="w-full px-3">
                              <label class="label" for="grid-password">
                                Password <span class="text-red-600">*</span>
                              </label>
                              <input class="input" id="grid-password" v-model="user.password" type="text" placeholder="******************">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="w-full px-3">
                                <button @click="modal.add = false" type="button" class="btn btn-light inline-block">Cancel</button>
                                <input type="submit" class="btn btn-success" :class="" :value="btnText" :disabled="btnDisabled">
                            </div>
                        </div>
                    </form>
                </ValidationObserver>
            </div>
        </modal>
        <modal v-if="modal.delete" @close="modal.delete = false">
            <p slot="modal-title" class="modal-title">Delete User</p>
            <div slot="modal-body">
              <p class="text-gray-900 text-sm">Are you sure you want to delete this user?</p>
            </div>
            <div slot="modal-footer">
                <button class="btn btn-light" @click="modal.delete = false">No</button>
                <button class="btn btn-danger" @click="removeUser">Yes</button>
            </div>
        </modal>
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
import { ValidationProvider, ValidationObserver } from 'vee-validate/dist/vee-validate.full';
import auth from '../../../auth.js';

export default {
  created() {
    this.$Progress.start();
  },
  components: {
    Vuetable,
    VuetablePagination,
    VuetablePaginationInfo,
    Modal,
    FilterBar,
    ValidationProvider,
    ValidationObserver
  },
  data() {
    return {
      role: localStorage.getItem('role'),
      req_url: '/api/users',
      btnText: 'Save',
      btnDisabled: false,
      moreParams: {},
      user_id: '',
      edit: false,
      modal: {
        add: false,
        title: 'New User',
        delete: false,
        failed: false,
      },
      options: {
        headers: {
          'Authorization': 'Bearer ' + auth.token()
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
          name: 'id',
          sortField: 'id',
          title: 'Id',
          titleClass: 'text-left',
          dataClass: 'text-left'
        },
        {
          name: 'first_name', 
          sortField: 'first_name',
          title: 'First Name',
          titleClass: 'text-left',
          dataClass: 'text-left'
        },
        {
          name: 'last_name', 
          sortField: 'last_name',
          title: 'Last Name',
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
      ],
      user: {
        first_name: '',
        last_name: '',
        email: '',
        password: '',
        type: 'admin'
      }
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
    getSortParam(sortOrder) {
      sortOrder.map( (sort) => {
        console.log('sort', sort);
      });
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
    createUser() {
      this.user = {
        first_name: '',
        last_name: '',
        email: '',
        password: '',
        type: '',
        id: ''
      };
      this.modal.add = true;
      this.modal.title = 'New User';
      this.req_url= '/api/users';
      this.edit = false;
    },
    editUser(user) {
      this.user = {
        first_name: user.first_name,
        last_name: user.last_name,
        email: user.email,
        password: user.password,
        type: user.type,
        id: user.id
      };
      this.req_url= `/api/users/${user.id}`;
      this.modal.add = true;
      this.modal.title = 'Edit User';
      this.edit = true;
    },
    async onSubmit () {
      this.$Progress.start();
      const isValid = await this.$refs.observer.validate();
      if (!isValid) {
        this.btnText = 'Save';
        this.btnDisabled = false;
      } else {
        this.btnText = 'Loading...';
        this.btnDisabled = true;
        this.saveUser();
      }
    },
    saveUser() {
      let vm = this;
      if (this.edit == true) {
        this.user._method = 'PUT';
      }
      axios({
        method: 'POST',
        url: vm.req_url,
        headers: vm.options.headers,
        data: vm.user
      })
      .then(response => {
        console.log(response);
        vm.modal.add = false;
        vm.btnText = 'Save';
        vm.btnDisabled = false;
        vm.$refs.vuetable.refresh();
        vm.$Progress.finish();
      })
      .catch(error => {
        console.log(error);
        vm.btnText = 'Save';
        vm.btnDisabled = false;
        vm.$Progress.finish();
      })
    },
    deleteUser(id) {
      this.user_id = id;
      this.modal.delete = true;
    },
    removeUser() {
      let vm = this;
      axios({
        method: 'DELETE',
        url: `/api/users/${vm.user_id}`,
        headers: vm.options.headers
      })
      .then(response => {
        vm.user_id = '';
        vm.modal.delete = false;
        vm.$refs.vuetable.refresh();
        vm.$Progress.finish();
      })
      .catch(error => {
      });
    }
  },
}
</script>