import axios from "axios";

const ROOT_API = process.env.MIX_PUSHER_APP_API;

async function login(data) {

    return await axios
        .post(`${ROOT_API}/users/login`, data)
        .then(response => response)
        .catch(e => e.response)

}

async function auth() {
    return await axios
        .get(`${ROOT_API}/admin/auth`)
        .then(response => response)
        .catch(e => e.response);
}

async function createAdmin(token, username, password) {
    let data = {
        token,
        username,
        password,
    };
    return await axios
        .post(`${ROOT_API}admin/create_admin`, data)
        .then((result) => {
            return result.data;
        });
}

async function getAdmins(token) {
    let data = {
        token,
    };
    return await axios
        .post(`${ROOT_API}admin/get_admins`, data)
        .then((result) => {
            return result.data;
        });
}

async function deleteAdmin(token, id) {
    let data = {
        token,
        id,
    };
    return await axios
        .post(`${ROOT_API}admin/delete_admin`, data)
        .then((result) => {
            return result.data;
        });
}

export { deleteAdmin, createAdmin, auth, getAdmins, login };