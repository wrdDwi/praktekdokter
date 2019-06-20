<template>
  <div class="container">
    <div class="row">
      <div class="col-xs-8 col-md-8 col-lg-8"></div>
      <div class="col-xs-3 col-md-3 col-lg-3">
        <div class="actions">
          <a class="btn btn-default">
            <router-link :to="{path: '/add-product'}">
              <span class="glyphicon glyphicon-plus"></span>
              Add product
            </router-link>
          </a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-md-12 col-lg-12">
        <div class="table table-borderless" id="table">
          <table class="table table-borderless" id="table">
            <thead>
              <tr>
                <th class="text-center" style="width:72px;">No.</th>
                <th class="text-center" style="width:218px;">Nama</th>
                <th class="text-center" style="width:57px;">Jenis</th>
                <th class="text-center" style="width:137px;">Harga Jual</th>
                <th class="text-center" style="width:134px;">Harga Beli</th>
                <th class="text-center" style="width:104px;">Stok</th>
                <th class="text-center" style="width:195px;">Satuan</th>
                <th class="text-center" style="width:195px;">Tanggal Input</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="l of listObat" :key="l.id">
                <td></td>
                <td>{{l.nama}}</td>
                <td>{{l.jenisId}}</td>
                <td class="text-right">{{l.hargaJual|number:'.2-2'}}</td>
                <td class="text-right">{{l.hargaBeli|number:'.2-2'}}</td>
                <td class="text-right">{{l.stok|number}}</td>
                <td></td>
                <td>{{l.CreatedDate}}</td>
                <td>
                  <a class="btn btn-warning btn-xs">
                    <router-link :to="{name: 'product-edit', params: {id: l.id}}">
                      <span class="glyphicon glyphicon-pencil"></span>Edit
                    </router-link>
                  </a>
                  <a class="btn btn-danger btn-xs" @click.prevent="deleteObat(l.id)">
                    <span class="glyphicon glyphicon-trash"></span>Delete
                  </a>
                </td>
              </tr>
              <tr v-if="listObat.length === 0">
                <td colspan="9" align="center">Data not available</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
//import baseUrl from '../../variable.js'
export default {
  name: "obat",
  data() {
    return {
      listObat: []
    };
  },
  created() {
    let uri =  "obat";
     this.myApi.get(uri).then(response => {
      this.listObat = response.data.data;
    });
  },
  methods: {
    deleteObat(id) {
      let uri =  `obat/${id}`;
      this.myApi.delete(uri).then(response => {
        this.listObat.splice(this.listObat.indexOf(id), 1);
      });
    }
  }
};
</script>
