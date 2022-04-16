import { createRouter, createWebHistory } from "vue-router";
import Home from "../views/Home.vue";
const routes = [{
        path: "/",
        name: "Home",
        component: () =>
            import ( /* webpackChunkName: "about" */ "../views/Home.vue"),
    },
    {
        path: "/signup",
        name: "SignUp",
        component: () =>
            import ( /* webpackChunkName: "about" */ "../views/SignUp.vue"),
    },

    {
        path: "/signup/hotel",
        name: "SignUpHotel",
        component: () =>
            import ( /* webpackChunkName: "about" */ "../views/signup/SignUpHotel.vue"),
    },
    {
        path: "/signup/hotel/finish",
        name: "SignUpHotelFinish",
        component: () =>
            import ( /* webpackChunkName: "about" */ "../views/signup/SignUpHotelFinish.vue"),
    },

    {
        path: "/login",
        name: "Login",
        component: () =>
            import ( /* webpackChunkName: "about" */ "../views/login/Login.vue"),
    },

    {
        path: "/admin/hotel/dashboard",
        name: "Dashboard",
        children: [{
                path: "overview",
                name: "Overview",
                component: () =>
                    import ( /* webpackChunkName: "about" */ "../views/admin/hotel/Overview.vue"),
            },
            {
                path: "hotel_profile",
                name: "HotelProfile",
                component: () =>
                    import ( /* webpackChunkName: "about" */ "../views/admin/hotel/HotelProfile.vue"),
            },
            {
                path: "branches",
                name: "Branches",
                component: () =>
                    import ( /* webpackChunkName: "about" */ "../views/admin/hotel/Branches.vue"),
            },
            {
                path: "branches/add",
                name: "AddBranch",
                component: () =>
                    import ( /* webpackChunkName: "about" */ "../views/admin/hotel/AddBranch.vue"),
            },
            {
                path: "branches/details/:id",
                name: "BranchDetails",
                component: () =>
                    import ( /* webpackChunkName: "about" */ "../views/admin/hotel/BranchDetails.vue"),
            }
        ],
        component: () =>
            import ( /* webpackChunkName: "about" */ "../views/admin/hotel/Dashboard.vue"),
    },




];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
});

export default router;