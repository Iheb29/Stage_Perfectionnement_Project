<template>
    <div class="p-5" style="width: 100% !important">
        <div class="d-flex justify-content-center">
            <div>
                <p class="titre text-center">List Commandes </p>
            </div>
        </div>
      <div >
       <table class="table table-striped  table-hover">
          <thead>
             <tr>
                <th>#</th>
                <th>nom</th>
                <th>Code Commande</th>
                <th>PrixTotal</th>
                <th>NbrProduit</th>
                <th>Opertaion</th>
             </tr>
          </thead>
          <tbody v-if="commandes==''">
            <tr>
                <td colspan="7" class="text-center">No Commandes Yet</td>
            </tr>
          </tbody>
          <tbody v-else>
            <tr :class=" commande.status === 1 ? 'table-success ' : commande.status === 2 ? 'table-danger ' : 'table-warning ' " v-for="commande in commandes" :key="commande.id" :style="{ backgroundColor: commande.status === 1 ? 'green !important' : commande.status === 2 ? 'red !important' : 'yellow !important' }">
                <td>{{ commande.id }}</td>
                 <td>{{ commande.nom }}</td>
                 <td>{{ commande.code_commande }}</td>
                 <td>{{ commande.prix_total }} TDN</td>
                 <td>{{ commande.lignecommande.length  }}</td>
                <td>
                    <button class="btn btn-danger mx-2" @click="deleteCommande(commande.id)">Delete</button>
                    <button v-if="commande.status==1" class="btn btn-success" @click="DownloadPdf(commande)">Download Pdf</button>
                </td>
            </tr>
          </tbody>
       </table>
      </div>
    </div>
  </template>
  <script>
  import jsPDF from 'jspdf'
import autoTable from 'jspdf-autotable'
  import {AuthStore} from "../../store/index.js"
  import CommandeService from "../../service/Commande_service/CommandeService.js";
  export default {
    name: "Reject_Accepte",
    setup(){
        const store=AuthStore();
        return {store}
    },
    created() {
        this.getCommandes();
    },
    mounted(){
        this.getCommandes();
    },
    data() {
      return {
        commandes: [],
      };
    },
    methods: {
      getCommandes() {
        CommandeService.getMyCommandes(this.store.user['id']).then((res) => {
          this.commandes = res.data.data;
          console.log(this.commandes);
        });
      },
      deleteCommande(id) {
        CommandeService.DeletCommande(id).then((res) => {
          this.getCommandes();
        });
      },
      DownloadPdf(commande){
        const doc = new jsPDF();
          doc.addImage(require('../../assets/cimenterie.jpg'),'jpg', 2, 2, 20, 20);
          doc.setFontSize(12);
          doc.setFont("times", "bold");
          doc.text('Date :',158,10);
          doc.text('Code Commande :',158,20);
          doc.setFont("times", "normal");
          doc.text(commande.created_at.substr(0,10),170,10);
          doc.text((commande.code_commande).toString(),192,20);
          doc.setFontSize(25);
          doc.setFont("times", "bold");
          doc.setTextColor(0, 0, 0);
          doc.text(45,40, 'BON DE COMMANDE');
          doc.setFontSize(12);
          doc.setFont("times", "bold");
          doc.text('Nom :',12,60);
          doc.text('Prénom :',12,67);
          doc.text('Email :',12,74);
          doc.text('Ville :',150,60);
          doc.setFont("times", "normal");
          doc.text(commande.nom,24,60);
          doc.text(commande.prenom,30,67);
          doc.text(commande.adresse_mail,26,74);
          doc.text(commande.ville,163,60);
          const header = ["ProductId", "Prix", "Quantity"];
      const body = commande.lignecommande.map((product) => [
        product.produit_id,
        product.prix_ligne_commande,
        product.quantite,
      ]);
      doc.setFont("times", "bold");
      doc.setFontSize(15);
      autoTable(doc, {
        theme: "striped",
        bodyStyles: { fontStyle: "bold", halign: "center" },
        margin: { top: 100 },
        head: [header],
        body: body,
      });
      
         let finalY = doc.lastAutoTable.finalY
         doc.autoTable({
             theme:'plain',
              startY: finalY+2,
              tableWidth:55,
              margin:{left:79},
              headerStyles:{halign:'center'},
              bodyStyles:{halign:'center',fontStyle:'bold'},
              head: [['Total']],
              body: [ [commande.prix_total]],
        });
        finalY = doc.lastAutoTable.finalY
        var writtenNumber = require('written-number');
        let total=(writtenNumber(commande.prix_total, {lang: 'fr'})).toUpperCase();
        doc.setFont("times", "bold");
        doc.autoTable({
              theme:'plain',
              startY: finalY+2,
              bodyStyles:{halign:'center',fontStyle:'bold'},
              body: [ [total+' DINARS']],
        });
        doc.text('Nous apprecions votre clinetele',110,doc.internal.pageSize.height - 30,'center');
        doc.text('si vous-avez des questions sur cette facture,n hesitez pas a nous contacter' ,110, doc.internal.pageSize.height - 20,'center');
          var pageCount = doc.internal.getNumberOfPages();
          for(let i = 0; i < pageCount; i++) { 
            doc.setPage(i); 
            let pageCurrent = doc.internal.getCurrentPageInfo().pageNumber; 
            doc.setFontSize(12);
            doc.text('Page: ' + pageCurrent + '/' + pageCount,110, doc.internal.pageSize.height - 10,'center');
          }
        doc.save(`Cimenterie${commande.code_commande}.pdf`);    
      }
    },
  };
  </script>
  