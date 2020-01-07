import VueRouter  from 'vue-router';

import Dashboard from './components/screens/dashboard/Dashboard.vue';
import Users from './components/screens/dashboard/Users.vue';
import JobOpenings from './components/screens/dashboard/jobs/JobOpenings.vue';
import CreateJob from './components/screens/dashboard/jobs/CreateJob.vue';
import UpdateJob from './components/screens/dashboard/jobs/UpdateJob.vue';
import Applicants from './components/screens/dashboard/jobs/Applicants.vue';
import Client from './components/screens/dashboard/clients/Client.vue';
import Candidate from './components/screens/dashboard/candidates/Candidate.vue';
import ViewCandidate from './components/screens/dashboard/candidates/ViewCandidate.vue';
import Interviews from './components/screens/dashboard/Interviews.vue';
import NotFound from './components/screens/dashboard/NotFound.vue';
import Accounts from './components/screens/dashboard/Accounts.vue';

import Resume from './components/screens/candidate/Resume.vue';
import Applications from './components/screens/candidate/Applications.vue';
import CandidateInterviews from './components/screens/candidate/Interviews.vue';

import ClientDashboard from './components/screens/client/Dashboard.vue';
import ClientInterviews from './components/screens/client/Interviews.vue';
import ClientJobOpening from './components/screens/client/jobs/JobOpening.vue';
import ClientCreateJob from './components/screens/client/jobs/CreateJob.vue';
import ClientUpdateJob from './components/screens/client/jobs/UpdateJob.vue';
import ClientApplicants from './components/screens/client/jobs/Applicants.vue';

export default new VueRouter({
    mode: 'history',
    base: __dirname,
    routes: [
        { 
          path: '/dashboard', 
          name: 'dashboard', 
          component: Dashboard,
          meta: {
            title: 'Dashboard | SendItOut International Outsourcing Inc.'
          }
        },
        { 
          path: '/account-settings', 
          name: 'account-settings', 
          component: Accounts,
          meta: {
            title: 'Accounts Settings | SendItOut International Outsourcing Inc.'
          }
        },
        { 
          path: '/users', 
          name: 'users', 
          component: Users,
          meta: {
            title: 'Users | SendItOut International Outsourcing Inc.'
          }
        },
        { 
          path: '/job-openings', 
          name: 'job-openings', 
          component: JobOpenings,
          meta: {
            title: 'Job Openings | SendItOut International Outsourcing Inc.'
          }
        },
        { 
          path: '/job-openings/create', 
          name: 'job-openings-create', 
          component: CreateJob,
          meta: {
            title: 'New Job Openings | SendItOut International Outsourcing Inc.'
          } 
        },
        { 
          path: '/job-openings/:id/edit', 
          name: 'job-openings-edit', 
          component: UpdateJob,
          meta: {
            title: 'Update Job Openings | SendItOut International Outsourcing Inc.'
          }
        },
        { 
          path: '/job-openings/:id/applicants', 
          name: 'job-openings-applicants', 
          component: Applicants,
          meta: {
            title: 'Applicant | SendItOut International Outsourcing Inc.'
          } 
        },
        { 
          path: '/clients', 
          name: 'clients', 
          component: Client,
          meta: {
            title: 'Clients | SendItOut International Outsourcing Inc.'
          }
        },
        { 
          path: '/candidates', 
          name: 'candidates', 
          component: Candidate,
          meta: {
            title: 'Candidates | SendItOut International Outsourcing Inc.'
          }
        },
        { 
          path: '/candidates/:id', 
          name: 'candidates-view', 
          component: ViewCandidate,
          meta: {
            title: 'View Candidates | SendItOut International Outsourcing Inc.'
          } 
        },
        { 
          path: '/interviews', 
          name: 'interviews', 
          component: Interviews,
          meta: {
            title: 'Interviews | SendItOut International Outsourcing Inc.'
          } 
        },
        { 
          path: '/candidate/profile', 
          name: 'candidates-resume', 
          component: Resume,
          meta: {
            title: 'Resume | SendItOut International Outsourcing Inc.'
          } 
        },
        { 
          path: '/candidate/applications', 
          name: 'candidates-applications', 
          component: Applications,
          meta: {
            title: 'Applications | SendItOut International Outsourcing Inc.'
          } 
        },
        { 
          path: '/candidate/interviews', 
          name: 'candidates-interviews', 
          component: CandidateInterviews,
          meta: {
            title: 'Interviews | SendItOut International Outsourcing Inc.'
          } 
        },
        { 
          path: '/client/dashboard', 
          name: 'client-dashboard', 
          component: ClientDashboard,
          meta: {
            title: 'Dashboard | SendItOut International Outsourcing Inc.'
          } 
        },
        { 
          path: '/client/interviews', 
          name: 'client-interviews', 
          component: ClientInterviews,
          meta: {
            title: 'Interviews | SendItOut International Outsourcing Inc.'
          } 
        },
        { 
          path: '/client/job-opening', 
          name: 'client-job-opening', 
          component: ClientJobOpening,
          meta: {
            title: 'Job Openings | SendItOut International Outsourcing Inc.'
          }
        },
        { 
          path: '/client/job-openings/create', 
          name: 'client-job-openings-create', 
          component: ClientCreateJob,
          meta: {
            title: 'New Job Openings | SendItOut International Outsourcing Inc.'
          } 
        },
        { 
          path: '/client/job-openings/:id/edit', 
          name: 'client-job-openings-edit', 
          component: ClientUpdateJob,
          meta: {
            title: 'Update Job Openings | SendItOut International Outsourcing Inc.'
          }
        },
        { 
          path: '/client/job-openings/:id/applicants', 
          name: 'client-job-openings-applicants', 
          component: ClientApplicants,
          meta: {
            title: 'Applicant | SendItOut International Outsourcing Inc.'
          } 
        },
    ]
});
