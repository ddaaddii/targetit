@extends('adminlte.app')

@section('content')

<div class="content-wrapper pb-3">
    <!-- Content Header (Page header) -->
 <div class="content-header">
     <div class="container-fluid">
         <div class="row mb-2">
             <div class="col-sm-6">
                 <h1 class="m-0">Vue</h1>
             </div><!-- /.col -->
             <div class="col-sm-6">
         
             </div><!-- /.col -->
         </div><!-- /.row -->
     </div><!-- /.container-fluid -->
 </div>
<!-- /.content-header -->

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    @if ($message = Session::get('danger'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="card mx-3 mt-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-3">
                    Estudo Vue
                </div>
 
            </div> 
        </div>


            <div class="pl-3 ml-3 mt-3 mr-3 bg-secondary text-white">
                Filtros
            </div>

            <div class="border pt-3 pl-3 pr-3 ml-3 mr-3 mb-3 bg-light ">
                    <div class="form-group row pd-3 ">
                        
                            <div class="col-md-3" id="app">
                                @{{ message }}
                                
                            </div>
                                  
                            <div class="col-md-3" id="app2">
                              <span v-bind:title ="message"> Para o mouse sobre mim e veja a dica iterligada dinamicamente!</span>
                            </div>
                            
                          
                        <div class="col-md-3" id="app-3">
                          <p v-if="seen">Agora você me viu</p>
                        </div>  
                        
                        <div class="col-md-3" id="app-4">
                          <ol>
                            <li v-for="todo in todos">
                              @{{ todo.text }}
                            </li>
                          </ol>
                        </div> 
                  </div>

                  <div class="form-group row pd-3 ">
                        
                        <div class="col-md-3" id="app-5">
                           <p> @{{ message }}</p>
                           <button v-on:click="reverseMessage">Iverter Menagem</button>
                            
                        </div>
                        <div class="col-md-3" >
                          <input v-bind:value="message" type="number" id="idade" name="idade"  step="1">
                           
                       </div>

                       <div class="col-md-3" id="app-6">
                        <v-app>
                          <v-main>
                            <v-container>Hello world</v-container>
                          </v-main>
                        </v-app>
                      </div>
                      <div class="col-md-3" id="app-7">
                       
                          <ol>
                            <!--
                              Agora provemos cada todo-item com o objeto todo que ele
                              representa, de forma que seu conteúdo possa ser dinâmico.
                              Também precisamos prover cada componente com uma "chave",
                              a qual será explicada posteriormente.
                            -->
                            <todo-item
                              v-for="item in groceryList"
                              v-bind:todo="item"
                              v-bind:key="item.id"
                            ></todo-item>
                          </ol>
                     
                      </div>
                  </div>
                  
                  <div class="form-group row pd-3 ">
                        
                    <div class="col-md-3" >
                             <v-autocomplete></v-autocomplete>
                    </div>
                  </div>
               
            </div>
            <div id="app-table">
              <v-app id="inspire">
                <v-data-table
                  :headers="headers"
                  :items="desserts"
                  :items-per-page="5"
                  class="elevation-1"
                ></v-data-table>
              </v-app>
            </div>
     
    </div>
</div>

   


<script>
    var app = new Vue({
    el: '#app',
    data: {
    message: 'Olá Vue!'
  }
})

    var app2 = new Vue ({
        el: '#app2',
        data: {
            message:'Você carregou esta página em '+ new Date().toLocaleString()
        }

    })

    var app3 = new Vue({
      el: '#app-3',
      data: {
        seen: true
  }
})

var app4 = new Vue({
  el: '#app-4',
  data: {
    todos: [
      { text: 'Aprender JavaScript' },
      { text: 'Aprender Vue' },
      { text: 'Criar algo incrível' }
    ]
  }
}) 

var app5 = new Vue({

  el: '#app-5',
  data:{

    message:'Olá Vue!',
  },
  methods:{
    reverseMessage: function(){
        this.message=this.message.split('').reverse().join(''),
        app.message ="oi"


        idade.message =idade.message +2
    }
  }


}) 
var idade = new Vue({
          el:'#idade',
          data:{
            message:'',
          }

        }) 
</script>




<script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
<script>
  new Vue({
    el: '#app-6',
    vuetify: new Vuetify(),
  })
</script>

<script>
  new Vue({
  el: '#app-table',
  vuetify: new Vuetify(),
  data () {
    return {
      headers: [
        {
          text: 'Dessert (100g serving)',
          align: 'start',
          sortable: false,
          value: 'name',
        },
        { text: 'Calories', value: 'calories' },
        { text: 'Fat (g)', value: 'fat' },
        { text: 'Carbs (g)', value: 'carbs' },
        { text: 'Protein (g)', value: 'protein' },
        { text: 'Iron (%)', value: 'iron' },
      ],
      desserts: [
        {
          name: 'Frozen Yogurt',
          calories: 159,
          fat: 6.0,
          carbs: 24,
          protein: 4.0,
          iron: '1%',
        },
        {
          name: 'Ice cream sandwich',
          calories: 237,
          fat: 9.0,
          carbs: 37,
          protein: 4.3,
          iron: '1%',
        },
        {
          name: 'Eclair',
          calories: 262,
          fat: 16.0,
          carbs: 23,
          protein: 6.0,
          iron: '7%',
        },
        {
          name: 'Cupcake',
          calories: 305,
          fat: 3.7,
          carbs: 67,
          protein: 4.3,
          iron: '8%',
        },
        {
          name: 'Gingerbread',
          calories: 356,
          fat: 16.0,
          carbs: 49,
          protein: 3.9,
          iron: '16%',
        },
        {
          name: 'Jelly bean',
          calories: 375,
          fat: 0.0,
          carbs: 94,
          protein: 0.0,
          iron: '0%',
        },
        {
          name: 'Lollipop',
          calories: 392,
          fat: 0.2,
          carbs: 98,
          protein: 0,
          iron: '2%',
        },
        {
          name: 'Honeycomb',
          calories: 408,
          fat: 3.2,
          carbs: 87,
          protein: 6.5,
          iron: '45%',
        },
        {
          name: 'Donut',
          calories: 452,
          fat: 25.0,
          carbs: 51,
          protein: 4.9,
          iron: '22%',
        },
        {
          name: 'KitKat',
          calories: 518,
          fat: 26.0,
          carbs: 65,
          protein: 7,
          iron: '6%',
        },
      ],
    }
  },
})
</script>

<script>
  Vue.component('todo-item', {
  props: ['todo'],
  template: '<li>@{{ todo.text }}</li>'
})

var app7 = new Vue({
  el: '#app-7',
  data: {
    groceryList: [
      { id: 0, text: 'Vegetais' },
      { id: 1, text: 'Queijo' },
      { id: 2, text: 'Qualquer outra coisa que humanos podem comer' }
    ]
  }
})
</script>
@endsection
