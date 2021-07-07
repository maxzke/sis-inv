<template>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container-fluid">
                <div class="card card-custom card-stretch gutter-b">
                    <!--begin::Header-->
                    <div class="card-header border-0 py-5">
                        <h3 class="card-title">Listado de Partidas</h3>
                        <h3 class="card-title align-items-start flex-column">
                            <input type="search" class="form-control form-control-sm" placeholder="Buscar"
                                v-model="params.search" />
                        </h3>
                        <div class="card-toolbar">
                            <inertia-link :href="route('partidas.create')" class="
                                    btn btn-sm btn-light-primary
                                    font-weight-bolder font-size-sm
                                    mr-3
                                ">
                                Nueva Partida
                            </inertia-link>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="tab-content">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="
                                    table
                                    table-hover
                                    table-head-custom
                                    table-head-bg
                                    table-borderless
                                    table-vertical-center
                                ">
                                <thead>
                                    <tr class="text-left text-uppercase">
                                        <th style="min-width: 50px" class="pl-3">código</th>
                                        <th style="min-width: 380px">nombre</th>
                                        <th style="min-width: 380px" class="pl-3">detalle</th>
                                        <th style="min-width: 50px" class="pl-3">edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="partida in partidas.data" :key="partida.id">
                                        <td class="text-right text-uppercase py-1">
                                            <span v-text="partida.codigo" class="
                                                    text-dark-50
                                                    text-hover-primary
                                                    mb-1
                                                    font-size-sm
                                                    text-capitalize
                                                ">
                                            </span>
                                        </td>
                                        <td class="text-uppercase">
                                            <span v-text="partida.nombre" class="
                                                    text-dark-50
                                                    d-block
                                                    font-size-sm
                                                ">
                                            </span>
                                        </td>
                                        <td class="text-uppercase">
                                            <span v-text="partida.detalle" class="
                                                    text-dark-50
                                                    d-block
                                                    font-size-sm
                                                ">
                                            </span>
                                        </td>
                                        <!-- ACCIONES -->
                                        <td class="pr-0">
                                            <!-- ACCION::EDITAR -->
                                            <inertia-link :href="route('partidas.edit',partida.id)" class="
                                                    btn
                                                    btn-icon
                                                    btn-light
                                                    btn-hover-primary
                                                    btn-sm
                                                    mr-2
                                                ">
                                                <span class="
                                                        svg-icon
                                                        svg-icon-md
                                                        svg-icon-primary
                                                    ">
                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
                                                    <i class="
                                                            far
                                                            fa-edit
                                                            text-primary
                                                        "></i>
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
                    <!--end::Body-->
                    <div class="card-footer">
                        <!-- Paginacion -->
                        <div class="row">
                            <div class="col-ms-12">
                                <pagination class="mt-6" :links="partidas.links" />
                            </div>
                        </div>
                        <!-- PAginacion ends -->
                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
</template>
<script>
    import MetronicLayout from "@/Layouts/MetronicLayout";
    import Pagination from '@/Metronic/Pagination'
    export default {
        layout: MetronicLayout,
        components: {
            Pagination
        },
        props: {
            partidas: Object,
        },
        data() {
            return {
                params: {
                    search: null
                },
            };
        },
        watch: {
            params: {
                handler() {
                    this.$inertia.get(this.route('partidas'), this.params, {
                        replace: true,
                        preserveState: true
                    });
                },
                deep: true,
            }
        },
    };

</script>
<style>
</style>
