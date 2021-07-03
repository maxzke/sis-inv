<template>
      <div class="content d-flex flex-column flex-column-fluid" id="kt_content">    
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                <!-- Listado de Usuarios -->
                <div class="card card-custom card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 py-5">
                    <h3 class="card-title">Listado de Usuarios</h3>
                    <h3 class="card-title align-items-start flex-column">
                    <!--begin::Form-->
                    <input
                        type="text"
                        class="form-control form-control-sm"
                        placeholder="Buscar"
                        v-model="paramBusqueda"
                        @keyup.enter="getListUsuarios"
                    />
                    <!--end::Form-->
                    </h3>
                    <div class="card-toolbar">                        
                    <inertia-link :href="route('usuario.create')" 
                        class="btn btn-sm btn-light-primary
                        font-weight-bolder font-size-sm
                        mr-3">
                        Nuevo Usuario
                    </inertia-link>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div :class="(loading ? 'card-body pt-0 pb-3 overlay overlay-block':'card-body pt-0 pb-3')">                
                    <div class="tab-content">                  
                    <!--begin::Table-->
                    <div class="table-responsive">
                        <table
                        class="
                            table
                            table-hover
                            table-head-custom
                            table-head-bg
                            table-borderless
                            table-vertical-center
                        "
                        >
                        <thead>
                            <tr class="text-left text-uppercase">
                                <th style="min-width: 300px" class="pl-7">nombre</th>
                                <th style="min-width: 200px">correo</th>
                                <th style="min-width: 210px" class="pl-7">acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Listado de usuarios -->
                            <!-- <tr v-for="(item ,index) in listUsuarios" :key="index"> -->
                            <tr v-for="(item ,index) in listUsersPaginated" :key="index">                          
                            <td class="pl-0 py-1">
                                <div class="d-flex align-items-center">
                                <div class="symbol symbol-50 symbol-light mr-4">
                                    <span class="symbol-label">
                                    <img :src="item.profile_photo_url"
                                        class="h-75 align-self-end"
                                        alt=""
                                    />
                                    </span>
                                </div>
                                <div>
                                    <span
                                    v-text="item.name"
                                    class="
                                        text-dark-50
                                        font-weight-bolder
                                        text-hover-primary
                                        mb-1
                                        font-size-sm
                                        text-capitalize
                                    "
                                    >
                                    </span>
                                </div>
                                </div>
                            </td>
                            <td>
                                <span
                                v-text="item.email"
                                class="
                                    text-dark-50
                                    font-weight-bolder
                                    d-block
                                    font-size-sm
                                "
                                >
                                </span
                                >
                            </td>
                            <!-- ACCIONES -->
                            <td class="pr-0">                                
                                <!-- ACCION::EDITAR -->
                                <inertia-link :href="route('usuario.edit', item.id)"  
                                    class="btn btn-icon btn-light btn-hover-primary btn-sm mr-2">
                                    <span class="svg-icon svg-icon-md svg-icon-primary">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
                                    <i class="far fa-edit text-primary"></i>
                                    <!--end::Svg Icon-->
                                    </span>
                                </inertia-link>                                                      
                            </td>
                            <!-- ACCIONES END -->
                            </tr>
                            <!-- End Listado de usuarios -->                        
                        </tbody>
                        </table>
                    </div>
                    <!--end::Table-->                  
                    </div>
                    <div class="overlay-layer bg-dark-o-10 mt-15" v-if="loading">
                    <div class="spinner-grow"></div>
                    </div>
                </div>
                <!--end::Body-->
                <div class="card-footer">
                    <!-- Paginacion -->
                    <div class="row">
                    <div class="col-ms-12">
                        <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item" v-if="pageNumber > 0">
                            <a class="page-link" href="#" aria-label="Previous" @click.prevent="prevPage">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                            </li>
                            <li class="page-item" v-for="(page, index) in pagesList" :key="index"
                            :class="(page == pageNumber ? 'active' : '')">
                            <a class="page-link" href="#" @click.prevent="selectPage(page)"> {{ page + 1 }} </a>
                            </li>
                            <li class="page-item" v-if="pageNumber < pageCount -1">
                            <a class="page-link" href="#" aria-label="Next" @click.prevent="nextPage">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                            </li>
                        </ul>
                        </nav>
                    </div>
                    </div>
                    <!-- PAginacion ends -->
                </div>              
                </div>
                <!-- Listado de Usuarios end -->
            </div>
            </div>
        </div>
        <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
</template>

<script>
import MetronicLayout from '@/Layouts/MetronicLayout'

    export default {
         layout: MetronicLayout,
        props:{
            users:Object
        },
        data(){
            return{
            paramBusqueda:'',
            listUsuarios:[],
            //paginacion
            pageNumber:0,
            perPage:5,
            loading:true
            }
        },
        computed:{
            pageCount(){
            let a = this.listUsuarios.length;
            let b = this.perPage;
            return Math.ceil(a/b);      
            },
            listUsersPaginated(){
            let inicio = this.pageNumber * this.perPage;
            let fin = inicio + this.perPage;
            return this.listUsuarios.slice(inicio,fin);
            },
            pagesList(){
            let pageCount = this.pageCount;
            let count = 0;
            let pagesArray = [];
            while(count < pageCount){
                pagesArray.push(count);
                count++;
            }
            return pagesArray;
            }
        },
        mounted(){
            //this.getListUsuarios();
            this.listUsuarios = this.users;
            this.loading = false;
        },
        methods:{
            getListUsuarios(){
            //ruta que contendra la peticion
            let url = 'usuario/search';
            axios.get(url,{
                params:{
                'paramBuscar':this.paramBusqueda
                }
            }).then(response => {
                console.log(response);
                this.listUsuarios = response.data;
                this.loading = false;
            })
            },
            //Paginacion
            nextPage(){
            this.pageNumber++;
            },
            prevPage(){
            this.pageNumber--;
            },
            selectPage(page){
            this.pageNumber = page;
            }
        }
    }
</script>

<style>

</style>