import axios from "axios";

const ROOT_API = process.env.MIX_PUSHER_APP_API;

async function login(email, password) {

    return await axios
        .post(`${ROOT_API}/admin/login`, {
            email,
            password,
        }, {
            // headers:{
            //   "Accept" : "application/json",
            //   "Content-Type" : "application/x-www-form-urlencoded",
            //   "X-Requested-With" : "XMLHttpRequest"
            // }
        })
        .then(response => response)
        .catch(e => e.response)

}

async function register(data) {

    return await axios
        .post(`${ROOT_API}/admin/cars/register`, data)
        .then(response => response)
        .catch(e => e.response)

}

async function auth() {
    return await axios
        .get(`${ROOT_API}/admin/auth`)
        .then(response => response)
        .catch(e => e.response);
}



export { auth, login, register };