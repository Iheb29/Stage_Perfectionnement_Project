<template>
    <div>
        <div class="ma-5 pa-5 " >
            <v-container >
                <div class="row">
                    <div  class="col-lg-4" v-for="(service,index) in services" :key="service.id" data-aos="fade-right" :data-aos-delay="index*20">
                 <v-card
                    elevation="2"
                    >
                    <div class="text-center">
                        <i  class="material-icons mx-2"> {{ service.icon }}</i>
                     <p class="font-weight-bold py-2">{{service.name}}</p>
                     <p v-if="service.id!=2 " class="py-2">{{service.desc}}</p>
                     <p v-else class="py-2" style="visibility: hidden;">{{service.desc}}</p>
                </div>
                </v-card>
                 </div>
            </div>
            </v-container>
          </div>
    </div>
</template>

<script>
export default{
    name:"service",
    data(){
        return{
            services:[
                {id:1,icon:'local_shipping',name:'LIVRAISON GRATUITE',desc:'Dés 7000 TND'},
                {id:2,icon:'payments',name:'CASH À LA LIVRAISON',desc:'d'},
                {id:3,icon:'phone',name:'29 036 027',desc:'8h-20h'}
            ]
        }
    },
    methods:{

    },
    computed:{
        
    }
}
</script>

<style>

</style>