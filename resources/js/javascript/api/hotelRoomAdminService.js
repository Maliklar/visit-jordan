import axios from "axios";

const ROOT_API = process.env.MIX_PUSHER_APP_API;
const API_POINT = "admin/hotels/rooms"
async function add(data) {
    return await axios
        .post(`${ROOT_API}/${API_POINT}/add`, data)
        .then(response => response)
        .catch(e => e.response);
}






export {
    add,
};