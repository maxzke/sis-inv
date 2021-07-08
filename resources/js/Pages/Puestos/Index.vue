<template>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="card card-custom card-stretch gutter-b">
                    <!--begin::Header-->
                    <div class="card-header border-0 py-5">
                        <h3 class="card-title">Listado de puestos</h3>
                        <h3 class="card-title align-items-start flex-column">
                            <input type="search" class="form-control form-control-sm" placeholder="Buscar"
                                v-model="params.search" />
                        </h3>
                        <div class="card-toolbar">
                            <inertia-link :href="route('puestos.create')" class="
                                    btn btn-sm btn-light-primary
                                    font-weight-bolder font-size-sm
                                    mr-3
                                ">
                                Nueva puesto
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
                                        <th style="min-width: 200 pl-6">nombre</th>
                                        <th style="min-width: 50px" class="pl-3">edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="puesto in puestos.data" :key="puesto.id">
                                        <td class="text-uppercase">
                                            <span v-text="puesto.nombre" class="
                                                    text-dark-50
                                                    d-block
                                                    font-size-sm
                                                ">
                                            </span>
                                        </td>
                                        <!-- ACCIONES -->
                                        <td class="pr-0">
                                            <!-- ACCION::EDITAR -->
                                            <inertia-link :href="route('puestos.edit',puesto.id)" class="
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
                                <pagination class="mt-6" :links="puestos.links" />
                            </div>
                        </div>
                        <!-- PAginacion ends -->
                    </div>
                </div>
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
            puestos: Object,
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
                    this.$inertia.get(this.route('puestos'), this.params, {
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
