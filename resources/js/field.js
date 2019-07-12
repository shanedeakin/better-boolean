Nova.booting((Vue, router, store) => {
    Vue.component('index-better-boolean', require('./components/IndexField'))
    Vue.component('detail-better-boolean', require('./components/DetailField'))
    Vue.component('form-better-boolean', require('./components/FormField'))
})
