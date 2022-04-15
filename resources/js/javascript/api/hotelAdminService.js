import axios from "axios";

const ROOT_API = process.env.MIX_PUSHER_APP_API;


async function get() {
    return await axios
        .get(`${ROOT_API}/admin/hotels/get`)
        .then(response => response)
        .catch(e => e.response);
}

async function edit(data) {

    return await axios
        .post(`${ROOT_API}/admin/hotels/edit`, data)
        .then(response => response)
        .catch(e => e.response);
}



export {get, edit };