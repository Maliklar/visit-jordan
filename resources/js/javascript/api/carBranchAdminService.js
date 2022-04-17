import axios from "axios";

const ROOT_API = process.env.MIX_PUSHER_APP_API;

async function add(data) {
    return await axios
        .post(`${ROOT_API}/admin/cars/branches/add`, data)
        .then(response => response)
        .catch(e => e.response);
}


export { add };