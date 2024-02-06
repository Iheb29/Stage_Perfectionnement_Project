<template>
    <div>
        <div class="m-5" >
            <div class="row mt-5 py-5  justify-content-center">
               <div class="col-md-4 mb-2" v-for="(service,index) in services" :key="service.id">
                    <div class="box  text-center" :class="service.color">
                             <p class="icon">
                                <i  class="material-icons mx-2"> {{ service.icon }}</i>
                                </p>
                             <h3  class="titre_box">{{service.name}}</h3>
                             <p class="description">{{service.desc}}</p>
                    </div>
               </div>
             </div>
          </div>
    </div>
</template>

<script>
export default{
    name:"service",
    data(){
        return{
            services:[
                {id:1,icon:'local_shipping',name:'LIVRAISON GRATUITE',desc:'Dés 7000 TND',color:"blue"},
                {id:2,icon:'payments',name:'CASH À LA LIVRAISON',desc:'',color:"red"},
                {id:3,icon:'phone',name:'25 674 437',desc:'8h-20h',color:"orange"}
            ]
        }
    },
    methods:{

    },
    computed:{
        
    }
}
</script>

<style scoped>
#service{
  height: 100%;
  position: relative;
}

.titre_service h2{
  color: #081828 !important;
}

.box_certificat{
  box-shadow: 0px 0 30px rgba(1, 41, 112, 0.08);
  height: 100%;
  padding: 60px 30px;
  text-align: center;
  border-radius: 5px;
  cursor: pointer;
  transition: 0.85s;
  font-size: 20px;
}

.box{
  box-shadow: 0px 0 30px rgba(1, 41, 112, 0.08);
  height: 100%;
  padding: 60px 30px;
  text-align: center;
  border-radius: 5px;
  cursor: pointer;
  transition: 0.85s;
  font-size: 20px;
}

.box.blue{
  border-bottom:3px solid #2db6fa;
  color:#2db6fa;
}

.box.blue:hover{
  background-color: #2db6fa; 
}

.box.orange{
  border-bottom:3px solid #f68c09;
  color:#f68c09;
}

.box.orange:hover{
  background-color: #f68c09;
}

.box.green{
  border-bottom:3px solid #08da4e;
  color:#08da4e;
}

.box.green:hover{
  background-color: #08da4e;
}


.box.red{
  border-bottom:3px solid #e9222c;
  color:#e9222c;
}

.box.red:hover{
  background-color: #e9222c;
}

.box.purpel{
  border-bottom:3px solid #b50edf;
  color:#b50edf;
}

.box.purpel:hover{
  background-color: #b50edf;
}

.box h3{
  font-size: 18px;
}

.box .description{
  font-size: 15px;
  font-weight: 400;
}

 .box:hover  {
  color: #fff!important;
}
</style>