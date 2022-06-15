new Vue ({
    el: '#app',
    data: {
        items: [],
        name: "",
        brand: "",
        price: "",
        description: "",
        type: "",
        pet_type: "",
        animal_year: "",
        weight: "",
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
            params.append('type', this.type);
            params.append('pet_type', this.pet_type);
            params.append('animal_year', this.animal_year);
            params.append('weight', this.weight);

            axios.post('write.php', params).then((response) => {
                this.items = response.data;
                this.name = '';
                this.brand = '';
                this.price = '';
                this.description = '';
                this.type = '';
                this.pet_type =  '';
                this.animal_year = '';
                this.weight = '';
            });

        },

    }
})