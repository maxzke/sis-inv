<template>
  <metronic-layout>
      <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <span>Contenido aqui</span>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
  </metronic-layout>
</template>
<script>
import MetronicLayout from '@/Layouts/MetronicLayout'
    export default {
        layout: MetronicLayout,
        props:{
            name_props:Object
        },
    }
</script>
<style>

</style>