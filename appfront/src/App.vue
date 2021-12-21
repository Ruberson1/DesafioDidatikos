<template>
  <div id="app">

    <nav>
      <div class="nav-wrapper blue darken-1">
        <a href="#" class="brand-logo center">Produtos Didatikos</a>
      </div>
    </nav>

    <div class="container">

      
      <form @submit.prevent="updateProduto">
      <button @click="updateProduto()" class="waves-effect waves-light btn-small">Atualizar <i class="material-icons left"></i></button>
      </form>

      <form @submit.prevent="storeProduto" >
        

          <label>Nome</label>
          <input type="text" placeholder="Nome" v-model="produto.nomeProduto" >
          <label>Código</label>
          <input type="number" placeholder="Código" v-model="produto.codProduto" >
          <label>Valor</label>
          <input type="text" placeholder="Valor" v-model="produto.valorProduto" >
          <label>Estoque</label>
          <input type="number" placeholder="Quantidade" v-model="produto.estoque" >

          <label>Cidade</label>

          <select v-model="produto.cidade_id" >
            <option value="0" selected>Selecione uma cidade</option>
            <option v-for="item in cidades" :key="item.id" v-bind:value="item.id">{{item.cidade}}</option>
          </select>

          <button class="waves-effect waves-light btn-small">Salvar<i class="material-icons left">save</i></button>
          
        
      </form>
      
      
    
      <table>

        <thead>

          <tr>
            <th>NOME</th>
            <th>CODIGO</th>
            <th>VALOR</th>
            <th>ESTOQUE</th>
            <th>CIDADE</th>
          </tr>

        </thead>

        <tbody>

          <tr v-for="produto of produtos" :key="produto.id">

            <td>{{ produto.nomeProduto }}</td>
            <td>{{ produto.codProduto }}</td>
            <td>{{ produto.valorProduto }}</td>
            <td>{{ produto.estoque }}</td>
            <td>{{ produto.cidade.cidade }}</td>
            <td>
              <button @click="editar(produto)" class="waves-effect btn-small blue darken-1"><i class="material-icons">create</i></button>
              <button @click="remove(produto)" class="waves-effect btn-small red darken-1"><i class="material-icons">delete_sweep</i></button>
            </td>

          </tr>

        </tbody>
      
      </table>

      <div>
        <nav>
      <div class="nav-wrapper blue darken-1">
        <a href="#" class="brand-logo center">Cidades cadastradas</a>
      </div>
    </nav>
      <table>

        <thead>

          <tr>
            <th>#</th>
            <th>CIDADE</th>
          </tr>

        </thead>

        <tbody>

          <tr v-for="cidade of cidades" :key="cidade.id">

            <td>{{ cidade.id }}</td>
            <td>{{ cidade.cidade }}</td>

          </tr>

        </tbody>
      
      </table>
    </div>

    </div>
    

  </div>
  
</template>

<script>


import axios from "axios";

export default {
  

  name: "App",
  data() {
    
    return { 
      cidade:{
        id:'',
        cidade:''
      },

      produto:{
        id: '',
        nomeProduto: '',
        codProduto: '',
        valorProduto: '',
        estoque:'',
        cidade_id:'0'
       },
    produtos:[],
    cidades:[]
    }
  },
   mounted(){
    this.getProdutos()
    this.getCidades()
  },
  methods: {

    async getCidades() {
      try {
        const cidades = await axios.get(
          "http://localhost/apiProdutos/public/api/cidades"
        );

        this.cidades = cidades.data.data;
      } catch (e) {
        console.log(e);
      }
    

    },

    remove: function(produto) {
      let x = window.confirm("Tem certeza que deseja excluir o produto?");
      if (x) {
        axios.delete("http://localhost/apiProdutos/public/api/products/" + produto.id)
        .then(produto => {
          let indice = this.produtos.indexOf(produto)
          this.produtos.splice(indice,1)
          
        })
      
      }
      alert("Produto deletado");
      location.reload()


    },
    
    async getProdutos() {
      try {
        const produtos = await axios.get(
          "http://localhost/apiProdutos/public/api/products"
        );
        
        this.produtos = produtos.data.data;
      } catch (e) {
        console.log(e);
      }
    

    },
    async storeProduto() {
      
  try {
    const produto = await axios.post(
      "http://localhost/apiProdutos/public/api/products", 
      {
        nomeProduto: this.produto.nomeProduto,
        codProduto : this.produto.codProduto,
        valorProduto: this.produto.valorProduto,
        estoque: this.produto.estoque,
        cidade_id: this.produto.cidade_id

        
      }
      
      
    );
        
        alert('Salvo com sucesso')
        location.reload()
        this.getProdutos()
        console.log(produto)
      } catch(e) {
        console.log(e);
      }
    },

    editar(produto){
      console.log(produto)
      this.produto = produto
    },

  async updateProduto() { 

  try {
    const produtos = await axios.put(
      "http://localhost/apiProdutos/public/api/products/" + this.produto.id,
      {
        nomeProduto: this.produto.nomeProduto,
        codProduto : this.produto.codProduto,
        valorProduto: this.produto.valorProduto,
        estoque: this.produto.estoque,
        cidade_id: this.produto.cidade_id
      }

    
    );
        
        console.log(produtos.data.data);
        alert("Produto atualizado com sucesso");
        location.reload()
      } catch (e) {
        console.log(e);
      }
      
    },
      
    


},

};
</script>



<style>
  select {
    display: block !important;
  }
</style>
