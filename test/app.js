new Vue ({
    el: '#app',
    data: {
        items: [],
        name: "",
        brand: "",
        price: "",
        description: "",
    },
    mounted() {
        axios.get('read.php').then((response) => {
            this.items = response.data;
        });
    },
    methods: {

        saveProduct() {

            const params = new URLSearchParams();

            params.append('name', this.name);
            params.append('brand', this.brand);
            params.append('price', this.price);
            params.append('description', this.description);

            axios.post('write.php', params).then((response) => {
                this.items = response.data;
                this.name = '';
                this.brand = '';
                this.price = '';
                this.description = '';
            });

        },

    }
})