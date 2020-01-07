import Axios from "axios";

export default {
  logout() {
    localStorage.removeItem('token');
    localStorage.removeItem('role');
    location.href = '/signin';
  },
  token() {
    if (localStorage.getItem('token') !== null) {
      let token = localStorage.getItem('token');
      axios({
        method: 'get',
        url: '/api/me',
        headers: {
          Authorization: `Bearer ${token}`
        }
      })
      .then(response => {
        localStorage.setItem('role', response.data.data.role[0]);
        return localStorage.getItem('token');
      })
      .catch( error => {
        localStorage.removeItem('token');
        localStorage.removeItem('role');
        location.href = '/signin';
      });

      return localStorage.getItem('token'); 
    } else {
      localStorage.removeItem('token');
      localStorage.removeItem('role');
      location.href = '/signin';
    }
  }
}