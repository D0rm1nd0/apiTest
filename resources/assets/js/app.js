require("./bootstrap");
window.axios.defaults.headers.common = {
    "X-Requested-With": "XMLHttpRequest"
};
window.Vue = require("vue");

Vue.component("get-token", require("./components/GetToken.vue"));
Vue.component("showdata", require("./components/ShowData.vue"));
const app = new Vue({
    el: "#app"
});
