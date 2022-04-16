import axios from "axios";

const ROOT_API = process.env.MIX_PUSHER_APP_API;
const API_POINT = "branches"
async function add(data) {
    console.log(ROOT_API);
    return await axios
        .post(`${ROOT_API}/admin/${API_POINT}/add`, data)
        .then(response => response)
        .catch(e => e.response);
}




export { add };