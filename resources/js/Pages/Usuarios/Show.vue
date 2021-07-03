<template>
  <metronic-layout>
      <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                usuario listado
                <pre>{{ user }}</pre>
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
        layout: MetronicLayout
    }
</script>
<style>

</style>