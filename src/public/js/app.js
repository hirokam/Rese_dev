import Vue from 'vue';
import StarRating from 'vue-star-rating'
Vue.component('star-rating', StarRating);
new Vue({
    el: '#star',
    data: {
        rating: 0
    }
});