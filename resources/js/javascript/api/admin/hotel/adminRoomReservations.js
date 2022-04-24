import axios from "axios";

const ROOT_API = process.env.MIX_PUSHER_APP_API;
const API_POINT = "hotels/rooms/reservations";



async function get(id) {
    return await axios
        .get(`${ROOT_API}/hotels/rooms/reservations/${id}`)
        .then(response => response)
        .catch(e => e.response);
}



export {get, };