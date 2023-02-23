<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Business List</div>
                <div class="card-body">
                <table>
                    <tr>
                        <th width="50%">Name</th>
                        <th width="50%">ID</th>
                    </tr>
                    <tr v-for="business in businesses" :key="business.id">
                        <td>{{ business.name }}</td>
                        <td>{{ business.id }}</td>
                    </tr>
                </table>

                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>

    export default {

        data(){
            return {
              businesses: {},
            }
        },
        methods: {
            getBusiness(){
                axios.get('/getBusinesses')
                     .then((response)=>{
                       this.businesses = response.data.businesses
                     })
            }
        },
        created(){
            this.getBusiness()
        }
    }
</script> 